<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

use App\Models\Ism;

class B2B2CController extends Controller
{
    public function login() {
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
        // $method = '/'.Ism::WAR_EMPRESARIAL.'/v1/suscripcion/'.$secuenciaUsuario.'/informacion_inicial';
        // $response = Ism::call([
        //     'endpoint' => Ism::BASE_URL.$method,
        //     'token'    => Session::get('accessToken'),
        //     'application' => Ism::APPLICATION_GENERIC,
        //     'method'   => 'GET'
        // ]);
        // Session::put('infoCliente', $response->data);
        Session::put('infoCliente', '');
        return view('verislife.b2b2c.login');    
    }
    
    public function empresa() {
        return view('verislife.b2b2c.selectorEmpresa');    
    }
    
    public function centroMedico() {
        return view('verislife.b2b2c.centroMedico');    
    }
    
    public function planVeris() {
        return view('verislife.b2b2c.planes.veris');    
    }
    
    public function planParami() {
        return view('verislife.b2b2c.planes.parami');    
    }
}
