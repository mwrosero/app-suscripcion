<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeguridadesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CotizadorController;
use App\Http\Controllers\B2B2CController;
use App\Http\Controllers\B2CController;

use App\Models\Ism;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('verislife/login', function () {
        return view('login.login');
    });

    Route::get('/login', [SeguridadesController::class, 'login'])->name('login')->withoutMiddleware(['loggedUser']);
    Route::post('/autenticar', [SeguridadesController::class, 'autenticar'])->name('autenticar')->withoutMiddleware(['loggedUser']);
    
    Route::get('/olvide-clave', [SeguridadesController::class, 'olvideClave'])->name('olvide_clave')->withoutMiddleware(['loggedUser']);

    Route::get('/actualizar-clave-inicial', [SeguridadesController::class, 'actualizarClaveTemporal'])->name('actualizarClaveTemporal')->withoutMiddleware(['loggedUser']);

    Route::post('/recuperar-clave', [SeguridadesController::class, 'recuperarClave'])->name('recuperar_clave')->withoutMiddleware(['loggedUser']);

    Route::get('/reestablecer-clave', [SeguridadesController::class, 'reestablecerClave'])->name('reestablecer_clave')->withoutMiddleware(['loggedUser']);
    
    Route::get('/actualizar-clave/{usuario?}', [SeguridadesController::class, 'formularioActualizarClave'])->name('actualizar_clave.form')->withoutMiddleware(['loggedUser']);
    
    Route::post('/actualizar-clave', [SeguridadesController::class, 'actualizarClave'])->name('actualizar_clave.update')->withoutMiddleware(['loggedUser']);
    
    Route::post('/actualizar-clave-temporal', [SeguridadesController::class, 'actualizarClaveTemporalAction'])->name('actualizarClaveTemporalAction')->withoutMiddleware(['loggedUser']);
    
    Route::get('/login/{usuario}', [SeguridadesController::class, 'formularioActualizarClave'])->name('actualizar_clave.form')->withoutMiddleware(['loggedUser']);

    // Route::get('/cotizacion', function () {
    //     return view('cotizador.cotizacion');
    // })->withoutMiddleware(['loggedUser']);

    /*Visualizar Prestaciones*/
    Route::get('/cliente/cotizacion/{idCotizacion}/aprobar', [CotizadorController::class, 'visualizarCotizacion'])->name('visualizar_cotizacion')->withoutMiddleware(['loggedUser']);
});

//Route::middleware('auth')->group(function () {
Route::group(['middleware' => ['loggedUser']], function () {
    // Route::get('/', [DashboardController::class, 'home'])->name('home')->withoutMiddleware(['guest']);

    Route::get('/logout', [SeguridadesController::class, 'logout'])->name('logout')->withoutMiddleware(['guest']);
    
    /*Cotizador*/
    Route::prefix('cotizador')->group(function () {
        Route::get('/registro-clientes', [CotizadorController::class, 'registroCliente'])->name('registro-clientes')->withoutMiddleware(['guest']);
        
        Route::get('/cotizador/{numeroIdentificacion?}', [CotizadorController::class, 'cotizador'])->name('cotizador')->withoutMiddleware(['guest']);
        
        Route::get('/cotizacion/edit/{idCotizacion}', [CotizadorController::class, 'obtenerCotizacion'])->name('obtener-cotizacion')->withoutMiddleware(['guest']);

        Route::get('/cotizacion/pdf/{idCotizacion}', [CotizadorController::class, 'pdfCotizacion'])->name('pdf-cotizacion')->withoutMiddleware(['guest']);

        // Route::get('/cotizacion/test/{idCotizacion}', [CotizadorController::class, 'testCotizacion'])->name('test-cotizacion')->withoutMiddleware(['guest']);

        Route::get('/consulta-clientes', [CotizadorController::class, 'clientes'])->name('consulta-clientes')->withoutMiddleware(['guest']);
        
        Route::get('/cliente/edit/{codigoCliente}', [CotizadorController::class, 'obtenerInfoCliente'])->name('consulta-info-cliente')->withoutMiddleware(['guest']);
        
        Route::get('/consulta-cotizaciones', [CotizadorController::class, 'cotizaciones'])->name('consulta-cotizaciones')->withoutMiddleware(['guest']);
        
        Route::get('/control-cotizaciones', [CotizadorController::class, 'cotizaciones'])->name('consulta-cotizaciones')->withoutMiddleware(['guest']);
        
        Route::post('/crear-cliente', [CotizadorController::class, 'crearCliente'])->name('crear-cliente')->withoutMiddleware(['guest']);
        
        Route::post('/actualizar-cliente', [CotizadorController::class, 'actualizarCliente'])->name('actualizar-cliente')->withoutMiddleware(['guest']);

    });

    Route::get('/refreshToken', [SeguridadesController::class, 'refreshToken'])->name('refreshToken')->withoutMiddleware(['guest']);

    Route::get('/', function(){
        // dd(Session::get('infoCliente'));
        if(Session::get('userData')->codigoUsuario == "BACKENDFIDELIZACION"){
            return view('login.login');
        }
        if(Session::get('infoCliente')->tipoFlujo == "E" && is_null(Session::get('infoCliente')->secuenciaAfiliado)){
            return view('verislife.inicio');
        // }else if(Session::get('infoCliente')->tipoFlujo == "E" && !is_null(Session::get('infoCliente')->secuenciaAfiliado)){
        }else{
            return view('verislife.dependiente.carga-dependiente');
        }
    })->withoutMiddleware(['guest']);
    
    Route::get('portal-fidelizacion/dashboard', function () {
        // dump(Session::get('userData'));
        // dd(Session::get('infoCliente'));
        if(Session::get('infoCliente')->tipoFlujo == "E" && is_null(Session::get('infoCliente')->secuenciaAfiliado)){
            return view('verislife.inicio');
        // }else if(Session::get('infoCliente')->tipoFlujo == "C" && !is_null(Session::get('infoCliente')->secuenciaAfiliado)){
        }else{
            return view('verislife.dependiente.carga-dependiente');
        }
    })->withoutMiddleware(['guest']);
    
    Route::get('portal-fidelizacion/verificacion-plan/{params}', function ($params) {
        // dd(Session::get('userData'));
        return view('verislife.verificacionPlan')->with('params', $params);
    })->withoutMiddleware(['guest']);

    Route::get('portal-fidelizacion/registro-plan/{params}', function ($params) {
        // dd(Session::get('userData'));
        return view('verislife.registro')->with('params', $params);
    })->withoutMiddleware(['guest']);

    Route::get('portal-fidelizacion/registrar-dependientes', function () {
        // dd(Session::get('userData'));
        return view('verislife.dependiente.registro');
    })->withoutMiddleware(['guest']);

    Route::get('portal-fidelizacion/editar-dependientes', function () {
        // dd(Session::get('userData'));
        return view('verislife.dependiente.registro');
    })->withoutMiddleware(['guest']);

    Route::get('portal-fidelizacion/registro-plan', function () {
        // dd(Session::get('userData'));
        return view('verislife.listado-planes-contratados');
    })->withoutMiddleware(['guest']);

    Route::get('portal-fidelizacion/editar-colaboradores', function () {
        // dd(Session::get('userData'));
        return view('verislife.listado-planes-contratados');
    })->withoutMiddleware(['guest']);

    Route::get('portal-fidelizacion/facturacion/{params}', function ($params) {
        // dd(Session::get('userData'));
        return view('verislife.datosFacturacion')->with('params', $params);
    })->withoutMiddleware(['guest']);

    Route::get('/portal-fidelizacion/confirmacion/{params}', function ($params) {
        // dd(Session::get('userData'));
        return view('verislife.confirmacion')->with('params', $params);
    })->withoutMiddleware(['guest']);

    Route::get('verislife/carga-dependiente', function () {
        return view('verislife.carga-dependiente.carga-dependiente');
    })->withoutMiddleware(['guest']);

    Route::get('verislife/carga-dependiente/registro', function () {
        return view('verislife.carga-dependiente.registro');
    })->withoutMiddleware(['guest']);

    Route::get('/portal-fidelizacion/documentacion', function () {
        return view('verislife.documentacion');
    })->withoutMiddleware(['guest']);

    Route::get('/portal-fidelizacion/cambiar-clave', function () {
        // dd(Session::get('userData')->secuenciaUsuario);
        return view('verislife.cambiar_clave_logueado');
    })->withoutMiddleware(['guest']);

});

# B2B2C
Route::get('/veris-care', [B2B2CController::class, 'login'])->name('b2b2c.login');
Route::get('/selecciona-empresa', [B2B2CController::class, 'empresa'])->name('b2b2c.empresa');
Route::get('/centro-medico', [B2B2CController::class, 'centroMedico'])->name('b2b2c.centroMedico');
Route::get('/plan-medico-veris', [B2B2CController::class, 'planVeris'])->name('b2b2c.planVeris');
Route::get('/plan-medico-parami', [B2B2CController::class, 'planParami'])->name('b2b2c.planParami');
Route::get('/facturacion-externa', function () {
    // dd(Session::get('userData'));
    // dd(Session::get('infoCliente'));

    return view('verislife.b2b2c.datosFacturacionExterno');
})->withoutMiddleware(['guest']);

Route::get('/facturacion-externa-b2c', function () {
    // dd(Session::get('userData'));
    // dd(Session::get('infoCliente'));

    return view('verislife.b2c.datosFacturacionExternoB2C');
})->withoutMiddleware(['guest']);

Route::get('/get-auth-token-nuvei', function () {
    $server_application_code = Ism::SERVER_CODE_NUVEI;
    $server_app_key = Ism::SERVER_KEY_NUVEI ;
    $date = new DateTime();
    $unix_timestamp = $date->getTimestamp();
    // $unix_timestamp = "1546543146";
    $uniq_token_string = $server_app_key.$unix_timestamp;
    $uniq_token_hash = hash('sha256', $uniq_token_string);
    $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
    // echo "TIMESTAMP: $unix_timestamp";
    // echo "\nUNIQTOKENST: $uniq_token_string";
    // echo "\nUNIQTOHAS: $uniq_token_hash";
    return response()->json([
        'token' => $auth_token
    ]);
})->withoutMiddleware(['guest']);

# B2C
Route::get('/b2c', [B2CController::class, 'index'])->name('b2c.index');
Route::get('/b2c-parami', [B2CController::class, 'indexParaMi'])->name('b2c.index_parami');