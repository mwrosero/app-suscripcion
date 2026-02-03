<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

use App\Models\Ism;

class SeguridadesController extends Controller
{
    /*Login*/
    public function login(){
        $info = Session::get('userData');
        return view('login.login');
    }

    public function autenticar(Request $request){
        // dd(0);
        //return view('verislife.suscripcion');
        $data = $request->all();
        $user = $data['user'];
        $password = $data['password'];

        $method = '/'.Ism::WAR_SEGURIDAD.'/v1/usuarios/verificacion_cuenta';
        $param = '?usuario='.urlencode(strtoupper($user));

        $response = Ism::call([
            'endpoint' => Ism::BASE_URL.$method.$param,
            //'token'    => Ism::getToken(),
            //'data'     => ['' => $var],
            'method'   => 'GET'
        ]);

        // echo Ism::BASE_URL.$method.$param;
        // dd($response);
        

        if($response->code == 200){
            $method = '/'.Ism::WAR_SEGURIDAD.'/v1/autenticacion/login';

            /*$response = Ism::call([
                'endpoint'  => Ism::BASE_URL.$method,
                'basic'     => base64_encode(strtoupper($user) .":". $password),
                'method'    => 'POST'
            ]);*/

            $res =  Http::withOptions([
                        'verify' => false, // Desactivar verificación de certificados
                    ])->withHeaders([
                        'Application' => Ism::APPLICATION,
                        'Authorization' => 'Basic '.base64_encode(strtoupper($user) .":". $password),
                    ])->post(Ism::BASE_URL.$method);
            $response = json_decode($res->body());

            // dd($response);
            /*$method = '/'.Ism::WAR_SEGURIDAD.'/v1/usuarios/'.$response->data->secuenciaUsuario;
            $response = Ism::call([
                'endpoint' => Ism::BASE_URL.$method.$param,
                'token'    => $response->data->idToken,
                'method'   => 'GET'
            ]);*/
            // dd($response);
            if($response->code == 200){
                $secuenciaUsuario = $response->data->secuenciaUsuario;
                switch($response->data->estadoUsuario) {
                    case 'CONFIRMED':
                        Session::put('userData', $response->data);
                        Session::put('accessToken', $response->data->idToken);
                        
                        $method = '/'.Ism::WAR_SEGURIDAD.'/v1/usuarios/'.$secuenciaUsuario.'/modulos_opciones_acceso';
                        $param = '?codigoSucursal='.Ism::CODIGOSUCURSAL;

                        $response = Ism::call([
                            'endpoint' => Ism::BASE_URL.$method.$param,
                            'token'    => $response->data->idToken,
                            'method'   => 'GET'
                        ]);
                        // echo Ism::BASE_URL.$method.$param;
                        // dump($response);
                        // dd(0);

                        Session::put('menu', $response->data);
                        // return redirect('/verislife/home');
                        $method = '/empresarial/v1/suscripcion/'.$secuenciaUsuario.'/informacion_inicial';
                        $response = Ism::call([
                            'endpoint' => Ism::BASE_URL.$method,
                            'token'    => Session::get('accessToken'),
                            'method'   => 'GET'
                        ]);
                        /*$res =  Http::withOptions([
                            'verify' => false, // Desactivar verificación de certificados
                        ])->withHeaders([
                            'Application' => Ism::APPLICATION,
                            'Authorization' => 'Bearer '.Session::get('accessToken'),
                            'Application' => Ism::APPLICATION,
                            //'IdOrganizacion' => Ism::IDORGANIZACION,
                        ])->post(Ism::BASE_URL.$method);
                        $response = json_decode($res->body());*/
                        // dump(Session::get('accessToken'));
                        // echo Ism::BASE_URL.$method;
                        // dd($response);
                        Session::put('infoCliente', $response->data);

                        return redirect('portal-fidelizacion/dashboard');
                    break;
                    case 'FORCE_CHANGE_PASSWORD':
                        $message = "Usuario nuevo que ingresa una clave temporal";
                        
                        Session::put('userTmp', $user);
                        Session::put('passwordTmp', $password);
                        return redirect('actualizar-clave-inicial');
                    break;
                    case 'CHANGE_PASSWORD':
                        $message = "Usuario debe cambiar su clave porque ha pasado 'x' tiempo desde el último cambio";
                        $method = '/'.Ism::WAR_SEGURIDAD.'/v1/usuarios/solicitud_recuperacion_clave';

                        $response = Ism::call([
                            'endpoint' => Ism::BASE_URL.$method,
                            //'token'    => Ism::getToken(),
                            'data'     => ['usuario' => strtoupper($user)],
                            'method'   => 'POST'
                        ]);

                        session()->flash('mensaje', $message);
                        return redirect('/actualizar-clave/'.base64_encode(strtoupper($user)));
                    break;
                    case 'RESET_REQUIRED':
                        $message = "Usuario importado debe seguir el flujo de recuperar contraseña";
                    break;
                }
            }else{
                $message = $response->message;
            }
        }else{
            $message = $response->message;
        }
        if(isset($message)){
            session()->flash('mensaje', $message);
            session()->flash('user', strtoupper($user));
            return redirect('/login');
        }
    }

    /*Formulario de Olvide clave*/
    public function olvideClave(){
        return view('login.olvide_clave');
    }

    public function actualizarClaveTemporal(){
        return view('login.actualizar_clave_temporal');
    }

    public function actualizarClaveTemporalAction(Request $request){
        $data = $request->all();
        $method = '/'.Ism::WAR_SEGURIDAD.'/v1/usuarios/activacion_cuenta';
        $response = Ism::call([
            'endpoint' => Ism::BASE_URL.$method,
            //'token'    => Ism::getToken(),
            'data'     => ['usuario' => Session::get('userTmp'), 'claveTemporal' => Session::get('passwordTmp'), 'claveNueva' => $data['nuevaClave'], 'codigoGrupoUsuario' => 3],
            'method'   => 'POST'
        ]);

        if($response->code != 200){
            session()->flash('mensaje', $response->message);
            return Redirect::route('actualizarClaveTemporal');
        }

        session()->flash('mensaje', "Contraseña actualizada exitosamente.");
        return redirect()->route('login');
    }

    /*Envio de petición para reestablecer clave*/
    public function recuperarClave(Request $request){
        $data = $request->all();
        $user = $data['user'];

        $method = '/'.Ism::WAR_SEGURIDAD.'/v1/usuarios/solicitud_recuperacion_clave';

        $response = Ism::call([
            'endpoint' => Ism::BASE_URL.$method,
            //'token'    => Ism::getToken(),
            'data'     => ['usuario' => $user],
            'method'   => 'POST'
        ]);
        
        // dump(Ism::BASE_URL.$method);
        // dump($response);
        // echo $response->message;
        // dd($user);

        session()->flash('mensaje', $response->message . ' user: '.$user);
        return view('login.olvide_clave');
    }

    /*Reestablecer clave*/
    public function reestablecerClave(){
        return view('login.reestablecer_clave');
    }

    public function formularioActualizarClave($usuario = null){
        if (!$usuario) {
            return redirect()->route('login');
        }
        
        return view('login.actualizar_clave')
            ->with('usuario', $usuario);
            // ->with('usuario',base64_decode($usuario));
    }

    public function actualizarClave(Request $request){
        $data = $request->all();
        $method = '/'.Ism::WAR_SEGURIDAD.'/v1/usuarios/recuperacion_clave';
        $response = Ism::call([
            'endpoint' => Ism::BASE_URL.$method,
            //'token'    => Ism::getToken(),
            'data'     => ['usuario' => $data['usuario'], 'codigoRecuperacion' => $data['codigo'], 'claveNueva' => $data['nuevaClave'], 'codigoGrupoUsuario' => 3],
            'method'   => 'POST'
        ]);

        if($response->code != 200){
            session()->flash('mensaje', $response->message);
            return Redirect::route('actualizar_clave.form', ['usuario' => $data['usuario']]);
        }

        session()->flash('mensaje', "Contraseña actualizada exitosamente.");
        return redirect()->route('login');
    }

    /*Refresh Token*/
    public function refreshToken(Request $request){
        $data = $request->all();
        $isGeneric = $data['generic'];
        $info = Session::get('userData');
        $method = '/'.Ism::WAR_SEGURIDAD.'/v1/autenticacion/refresh_token';
        if($isGeneric == "S"){
            $response = Ism::call([
                'endpoint'  => Ism::BASE_URL.$method,
                'data'      => ["refreshToken" => $info->refreshToken],
                'method'    => 'POST',
                'application' => Ism::APPLICATION_GENERIC,
            ]);
        }else{
            $response = Ism::call([
                'endpoint'  => Ism::BASE_URL.$method,
                'data'      => ["refreshToken" => $info->refreshToken],
                'method'    => 'POST',
            ]);
        }

        Session::put('accessToken', $response->data->idToken);

        $msg = [
            "code" => $response->code,
            "message" => $response->code
        ];

        if($response->code == 200){
            $msg["idToken"] = $response->data->idToken;
        }

        return response()->json($msg);
    }

    /*Logout*/
    public function logout(){
        //dd(0);
        // Session::forget('user');
        Session::flush();
        return redirect()->route('login');
    }
}
