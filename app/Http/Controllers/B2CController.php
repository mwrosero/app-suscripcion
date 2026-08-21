<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

use App\Models\Ism;

class B2CController extends Controller
{
    public function index() {
        $this->generarCredenciales();
        return view('verislife.b2c.index');
    }

    public function indexParaMi() {
        $this->generarCredenciales();
        return view('verislife.b2c.index_parami');
    }

    public function generarCredenciales(){
        Session::flush();
        $method = '/'.Ism::WAR_SEGURIDAD.'/v1/autenticacion/login';
        $user = Ism::USER_VERIS_GENERIC;
        $password = Ism::PASSWORD_VERIS_GENERIC;
        $res =  Http::withOptions([
                    'verify' => false, // Desactivar verificación de certificados
                ])->withHeaders([
                    'Application' => Ism::APPLICATION_GENERIC,
                    'Authorization' => 'Basic '.base64_encode(strtoupper($user) .":". $password),
                ])->post(Ism::BASE_URL.$method);
        $response = json_decode($res->body());
        //echo Ism::BASE_URL.$method;
        //dd($response);
        $secuenciaUsuario = $response->data->secuenciaUsuario;
        Session::put('userData', $response->data);
        Session::put('accessToken', $response->data->idToken);
        $method = '/'.Ism::WAR_EMPRESARIAL.'/v1/suscripcion/'.$secuenciaUsuario.'/informacion_inicial';
        // $response = Ism::call([
        //     'endpoint' => Ism::BASE_URL.$method,
        //     'token'    => Session::get('accessToken'),
        //     'application' => Ism::APPLICATION_GENERIC,
        //     'method'   => 'GET'
        // ]);
        // Session::put('infoCliente', $response->data);
        Session::put('infoCliente', '');
    }
}
