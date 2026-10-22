@extends('template.app-template')

@section('title', 'Método de pago - Veris Care')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            
            {{-- 1. Encabezado de la sección --}}
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h1 class="h3 mb-1 text-dark fw-bold">Método de pago</h1>
                    <p class="text-muted mb-0">Gestiona la tarjeta de crédito o débito asociada a tus cobros recurrentes de Veris Care.</p>
                </div>
            </div>

            {{-- 2. Contenedor Dinámico para Mensajes / Alertas superiores por JS --}}
            <div id="contenedorAlertas"></div>

            {{-- 3. Contenedor de la Tarjeta Actual (Diseño Visual de Tarjeta Bancaria) --}}
            <div id="seccionTarjetaActual" class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-7 mb-3 mb-md-0">
                            {{-- Estilo visual tipo tarjeta de crédito --}}
                            <div class="p-4 rounded-4 text-white shadow-sm position-relative overflow-hidden" style="background: linear-gradient(135deg, #13233f 0%, #2563eb 100%); min-height: 190px; display: flex; flex-direction: column; justify-content: space-between;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="small text-uppercase tracking-wider opacity-75" id="brandBank"></span>
                                    <i class="fa fa-wifi fa-rotate-90 opacity-75"></i>
                                </div>
                                <div id="vencida" class="text-danger fw-bold d-none">
                                    Tarjeta caducada
                                </div>
                                <div>
                                    <div class="font-monospace fs-5 mb-2 tracking-widest" id="lblUltimosDigitos">•••• •••• •••• ----</div>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <span style="font-size: 10px;" class="d-block text-uppercase opacity-75">Titular</span>
                                            <span class="small fw-semibold text-truncate d-inline-block" style="max-width: 180px;" id="lblNombreTitular">CARGANDO...</span>
                                        </div>
                                        <div>
                                            <span style="font-size: 10px;" class="d-block text-uppercase opacity-75">Vencimiento</span>
                                            <span class="small font-monospace fw-semibold" id="lblVencimiento">--/--</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 d-flex flex-column justify-content-center ps-md-4">
                            <span class="text-uppercase text-muted fs-12 fw-semibold mb-1">Estado del último pago</span>
                            <div class="mb-3" id="badgeEstadoPago">
                                <span class="badge bg-secondary-soft text-secondary px-3 py-2 rounded-pill fw-semibold">
                                    <i class="fa fa-spinner fa-spin me-1"></i> Cargando...
                                </span>
                            </div>

                            <div id="contenedorBotonCambiar">
                                {{-- Se inyecta por JS según la propiedad 'puedeCambiar' --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4. Contenedor Oculto: Formulario Externo de Suscripción de Tarjeta (Nuvei) --}}
            <div id="seccionFormularioTarjeta" class="card border-0 shadow-sm rounded-4 mb-4" style="display: none;">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0 text-dark">Registrar nueva tarjeta</h4>
                        <button type="button" id="btnCancelarFormulario" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                            <i class="fa fa-arrow-left me-1"></i> Cancelar
                        </button>
                    </div>

                    <p class="text-muted small mb-4">Ingresa los datos de tu tarjeta. La validación y tokenización se realiza mediante Nuvei de forma completamente segura.</p>

                    <form id="add-card-form" class="row g-3 justify-content-center d-none">
                        <div class="col-12 col-md-8 col-lg-7 col-xl-6">
                            <img class="w-100 mb-3" src="{{ asset('assets/img/veris/marcas-tarjetas-2048x176.png') }}">
                            <div class="payment-form mb-3" id="my-card" data-capture-name="true"></div>
                            <br/>
                            <div id="messages"></div>
                            <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill fw-semibold mt-3">Guardar tarjeta</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- 5. Modal OTP de verificación bancaria (Nuvei) --}}
<div class="modal fade" id="modalNuveiOtp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalNuveiOtpLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-body text-center p-4">

                <h3 class="modal-title fw-semibold text-primary-veris mb-3">Código de verificación</h3>

                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/enter-otp.svg" alt="Código de verificación" class="img-fluid mb-4" style="max-height: 256px;">

                <p class="mb-2 fw-semibold fs-6">Para autenticar tu tarjeta ingresa el <b>código de seguridad</b> enviado a tu teléfono y/o correo electrónico.</p>

                <div class="d-flex justify-content-center gap-2 mb-3 verification-inputs">
                    <input type="text" id="input1_nuvei" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded input-digit" placeholder="-" aria-label="Dígito 1">
                    <input type="text" id="input2_nuvei" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded input-digit" placeholder="-" aria-label="Dígito 2">
                    <input type="text" id="input3_nuvei" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded input-digit" placeholder="-" aria-label="Dígito 3">
                    <input type="text" id="input4_nuvei" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded input-digit" placeholder="-" aria-label="Dígito 4">
                    <input type="text" id="input5_nuvei" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded input-digit" placeholder="-" aria-label="Dígito 5">
                    <input type="text" id="input6_nuvei" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded input-digit" placeholder="-" aria-label="Dígito 6">
                </div>

                <button type="button" class="btn btn-cerulean-blue-800 w-100 mb-2 btn-verificar-otp-nuvei" disabled>Verificar código</button>
                <button type="button" class="btn btn-outline-cerulean-blue-800 w-100" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<link href="https://cdn.paymentez.com/ccapi/sdk/payment_stable.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.paymentez.com/ccapi/sdk/payment_stable.min.js" charset="UTF-8"></script>
<script>
    let detalleSuscripcion = {};
    let randomValueNuvei = Math.floor(10000 + Math.random() * 90000);

    document.addEventListener('DOMContentLoaded', async function () {
        const tarjetaActual = document.getElementById('seccionTarjetaActual');
        const formTarjeta = document.getElementById('seccionFormularioTarjeta');
        const btnCancelar = document.getElementById('btnCancelarFormulario');

        // Consumir el servicio GET y pintar dinámicamente la UI
        await obtenerInfoPago();

        // Botón cancelar dentro del formulario de nueva tarjeta
        if(btnCancelar) {
            btnCancelar.addEventListener('click', function() {
                formTarjeta.style.display = 'none';
                tarjetaActual.style.display = 'block';
            });
        }

        const inputs = document.querySelectorAll(".input-digit");
        inputs.forEach((input, index) => {
            input.addEventListener("input", function () {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 1);
                if (this.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener("keydown", function (e) {
                if (e.key === "Backspace" && this.value === "" && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        Payment.init('{{ \App\Models\Ism::ENVIRONMENT_NUVEI }}', '{{ \App\Models\Ism::APPLICATION_CODE_NUVEI }}', '{{ \App\Models\Ism::APPLICATION_KEY_NUVEI }}');

        setTimeout(function(){
            $('.expiry').val('');
            $('.cvc').val('');$('#add-card-form').removeClass('d-none');
        },1000);
    });

    let form = $("#add-card-form");
    let submitButton = form.find("button");
    let submitInitialText = submitButton.text();

    $("#add-card-form").submit(function (e) {
        e.preventDefault();
        if (typeof showLoader === 'function') showLoader();
        let myCard = $('#my-card');
        $('#messages').text("");
        let cardToSave = myCard.PaymentForm('card');
        
        if (cardToSave == null) {
            if (typeof hideLoader === 'function') hideLoader();
            $('#messages').text("Datos inválidos de tarjeta, verifique la información ingresada.");
        } else {
            submitButton.attr("disabled", "disabled").text("Procesando tarjeta...");

            let uid = `${ {{ Session::get('userData')->secuenciaUsuario }} || 'user'}${randomValueNuvei}`;
            let email = '{{ Session::get('userData')->correoElectronico }}' || '';
            Payment.addCard(uid, email, cardToSave, successHandler, errorHandler);
        }
    });

    let successHandler = async function (cardResponse) {
        if (typeof hideLoader === 'function') hideLoader();
        console.log(cardResponse.card);
        if (cardResponse.card.status === 'valid') {
            console.log("-----TARJETA VÁLIDA TOKENIZADA-----");
            detalleSuscripcion.tarjetaNueva = cardResponse.card;
            await actualizarTarjeta();
            //alert("¡Tarjeta tokenizada con éxito!");
            // Aquí puedes proceder a invocar tu endpoint PUT para actualizar la tarjeta en tu API
        } else if(cardResponse.card.status === 'review' || cardResponse.card.status === 'pending') {
            detalleSuscripcion.tarjetaNueva = cardResponse.card;
            popupOtpNuvei();
            console.log("Abrir OTP de Nuvei");
        } else {
            $('#messages').html('Error<br>status: ' + cardResponse.card.status + '<br>message: ' + cardResponse.card.message);
        }
        submitButton.removeAttr("disabled");
        submitButton.text(submitInitialText);
    };

    let errorHandler = function (err) {
        if (typeof hideLoader === 'function') hideLoader();
        console.log(err.error);
        if(err.error && err.error.help == "If you want to update the card, first delete it"){
            $('#informacion').modal('show');
        } else {
            $('#messages').html(err.error ? err.error.type : 'Error desconocido');
        }
        submitButton.removeAttr("disabled");
        submitButton.text(submitInitialText);
    };

    function popupOtpNuvei(){
        if (typeof hideLoader === 'function') hideLoader();
        $('#input1_nuvei').val("");
        $('#input2_nuvei').val("");
        $('#input3_nuvei').val("");
        $('#input4_nuvei').val("");
        $('#input5_nuvei').val("");
        $('#input6_nuvei').val("");
        $('#modalNuveiOtp').modal('show');
    }

    async function actualizarTarjeta(){
        console.log(detalleSuscripcion.tarjetaNueva);
        let args = [];
        args["endpoint"] = api_url + `/${api_war_empresarial}/v1/suscripcion/metodo_pago`;
        args["method"] = "PUT";
        args["showLoader"] = true;
        args["token"] = _token;
        args["bodyType"] = "json";
        detalleSuscripcion.tarjetaNueva;

        args["data"] = JSON.stringify({
            "cardToken": detalleSuscripcion.tarjetaNueva.token,
            "keyAdicionalToken": randomValueNuvei,
            "metadata": JSON.stringify(detalleSuscripcion.tarjetaNueva),
            "nombreTitular": $("input[name=card-holder]").val(),
            "ultimosDigitos": detalleSuscripcion.tarjetaNueva.number,
            "mesExpiracion": parseInt(detalleSuscripcion.tarjetaNueva.expiry_month),
            "anioExpiracion": detalleSuscripcion.tarjetaNueva.expiry_year,
            "tipoCobro": "CORRIENTE",
            "codigoInstitucion": 5
        });
        const response = await call(args);
        console.log(response);
        if (response && response.code === 200 && response.success && response.data) {
            await obtenerInfoPago();
            
            const tarjetaActual = document.getElementById('seccionTarjetaActual');
            const formTarjeta = document.getElementById('seccionFormularioTarjeta');

            showMessage('success', 'Tarjeta actualizada exitosamente')
            
            formTarjeta.style.display = 'none';
            tarjetaActual.style.display = 'block';
            document.getElementById("add-card-form").reset();
        }else{
            showMessage('error', response.message);
            await deleteTokenNuvei();
        }
    }

    async function obtenerInfoPago(){
        let args = [];
        args["endpoint"] = api_url + `/${api_war_empresarial}/v1/suscripcion/metodo_pago`;
        args["method"] = "GET";
        args["showLoader"] = true;
        args["token"] = _token;
        const response = await call(args);
        console.log(response);

        if (response && response.code === 200 && response.success && response.data) {
            detalleSuscripcion = response.data;
            renderizarInformacionPago(detalleSuscripcion);
        }
    }

    function renderizarInformacionPago(data) {
        // 0. Validar si la opción aplica al usuario (según nota del Swagger)
        if (data.aplica === false) {
            alert("La opción de método de pago no aplica para este usuario.");
            window.location.href = '/portal-fidelizacion/dashboard';
            return;
        }

        // 1. Renderizar Tarjeta Actual en el diseño visual
        if (data.tarjeta) {
            document.getElementById('lblUltimosDigitos').textContent = `•••• •••• •••• ${data.tarjeta.ultimosDigitos || '----'}`;
            document.getElementById('lblNombreTitular').textContent = data.tarjeta.nombreTitular || 'CLIENTE VERIS';

            document.getElementById('brandBank').textContent = `${data.tarjeta.marca} - ${data.tarjeta.banco}`;

            
            let mes = String(data.tarjeta.mesExpiracion || 1).padStart(2, '0');
            let anio = String(data.tarjeta.anioExpiracion || 2028).slice(-2);
            document.getElementById('lblVencimiento').textContent = `${mes}/${anio}`;

            if(data.tarjeta.vencida){
                $('#vencida').removeClass('d-none');
            }
        }

        // 2. Renderizar Estado del Último Pago acorde al contrato especificado
        const badgeContainer = document.getElementById('badgeEstadoPago');
        if (data.ultimoPago) {
            let p = data.ultimoPago;
            if (p.estado === 'COBRADO') {
                badgeContainer.innerHTML = `<span class="badge bg-success-soft text-success px-3 py-2 rounded-pill fw-semibold"><i class="fa fa-check-circle me-1"></i> Cobrado ($${parseFloat(p.monto || 0).toFixed(2)})</span>`;
            } else if (p.estado === 'RECHAZADO') {
                let intentoTxt = (p.intento !== undefined && p.maximoIntentos) ? ` (Intento ${p.intento}/${p.maximoIntentos})` : '';
                badgeContainer.innerHTML = `<span class="badge bg-warning-soft text-warning px-3 py-2 rounded-pill fw-semibold"><i class="fa fa-clock me-1"></i> Rechazado${intentoTxt}</span>`;
            } else if (p.estado === 'INTENTOS_AGOTADOS') {
                badgeContainer.innerHTML = `<span class="badge bg-danger-soft text-danger px-3 py-2 rounded-pill fw-semibold"><i class="fa fa-times-circle me-1"></i> Intentos agotados</span>`;
            } else {
                badgeContainer.innerHTML = `<span class="badge bg-secondary-soft text-secondary px-3 py-2 rounded-pill fw-semibold"><i class="fa fa-info-circle me-1"></i> ${p.estado}</span>`;
            }
        } else {
            badgeContainer.innerHTML = `<span class="badge bg-secondary-soft text-secondary px-3 py-2 rounded-pill fw-semibold"><i class="fa fa-info-circle me-1"></i> Sin cobros recientes</span>`;
        }

        // 3. Control de permisos de cambio (Regla del Swagger: "Si puedeCambiar=false se muestra la tarjeta sin lápiz")
        const btnContainer = document.getElementById('contenedorBotonCambiar');
        if (data.puedeCambiar === true) {
            btnContainer.innerHTML = `<button type="button" id="btnMostrarFormulario" class="btn btn-primary rounded-pill fw-semibold py-2 w-100"><i class="fa fa-pen me-2"></i> Cambiar tarjeta</button>`;
            
            document.getElementById('btnMostrarFormulario').addEventListener('click', function() {
                document.getElementById('seccionTarjetaActual').style.display = 'none';
                document.getElementById('seccionFormularioTarjeta').style.display = 'block';
            });
        } else {
            btnContainer.innerHTML = `<p class="text-muted small mb-0"><i class="fa fa-lock me-1"></i> Tarjeta gestionada por convenio corporativo (No editable).</p>`;
        }

        // 4. Renderizar Alertas Superiores Dinámicas
        const alertasContainer = document.getElementById('contenedorAlertas');
        alertasContainer.innerHTML = '';

        if (data.ultimoPago && data.ultimoPago.estado === 'RECHAZADO') {
            if (data.estadoSuscripcion === 'CAN' || data.ultimoPago.estado === 'INTENTOS_AGOTADOS') {
                alertasContainer.innerHTML = `
                    <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4 p-4" role="alert">
                        <div class="d-flex align-items-start">
                            <div class="bg-danger text-white rounded-circle p-2 me-3 mt-1 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div>
                                <h5 class="alert-heading fw-bold mb-1">Programa cancelado por falta de pago</h5>
                                <p class="mb-0 small">Tu suscripción se encuentra inactiva porque el último cobro fue rechazado o tu tarjeta expiró. Actualiza tu método de pago para procesar el pendiente y reactivar tus beneficios de inmediato.</p>
                            </div>
                        </div>
                    </div>`;
            } else {
                alertasContainer.innerHTML = `
                    <div class="alert alert-warning border-0 shadow-sm rounded-4 mb-4 p-4" role="alert">
                        <div class="d-flex align-items-start">
                            <div class="bg-warning text-dark rounded-circle p-2 me-3 mt-1 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                <i class="fa fa-clock"></i>
                            </div>
                            <div>
                                <h5 class="alert-heading fw-bold mb-1">Pago pendiente de cobro</h5>
                                <p class="mb-0 small">No pudimos procesar el cobro automático de tu programa. Actualiza tu tarjeta para evitar la suspensión del servicio.</p>
                            </div>
                        </div>
                    </div>`;
            }
        }
    }

    async function deleteTokenNuvei(){
        let uid = `${ {{ Session::get('userData')->secuenciaUsuario }} || 'user'}${randomValueNuvei}`;
        let args = [];
        args["endpoint"] = `${api_url_nuvei}/v2/card/delete/`;
        args["method"] = "POST";
        args["showLoader"] = false;
        args["tokenNuvei"] = await getTokenNuvei();
        args["bodyType"] = "json";
        args["data"] = JSON.stringify({
            "card": {
                "token": `${detalleSuscripcion.tarjetaNueva.token}`
            },
            "user": {
                "id": `${uid}`
            }
        });
        const data = await call(args);
        console.log(data);
        delete detalleSuscripcion.tarjeta
    }

    async function autenticarTokenNuvei(){
        let codigoOtp = `${$('#input1_nuvei').val()}${$('#input2_nuvei').val()}${$('#input3_nuvei').val()}${$('#input4_nuvei').val()}${$('#input5_nuvei').val()}${$('#input6_nuvei').val()}`;
        let uid = `${ {{ Session::get('userData')->secuenciaUsuario }} || 'user'}${randomValueNuvei}`;
        let args = [];
        args["endpoint"] = `${api_url_nuvei}/v2/transaction/verify/`;
        args["method"] = "POST";
        args["showLoader"] = true;
        args["tokenNuvei"] = await getTokenNuvei();
        args["bodyType"] = "json";
        args["data"] = JSON.stringify({
            "user": {
                "id": `${uid}`
            },
            "transaction": {
                id: detalleSuscripcion.tarjetaNueva.transaction_reference,
            },
            "type": "BY_OTP",
            "value": `${codigoOtp}`,
            "more_info":true,
        });
        const data = await call(args);
        console.log(data);
        detalleSuscripcion.autenticacionOtp = data
        if(data.transaction.status === "success" && data.transaction.status_detail === 32){
            $('#modalNuveiOtp').modal('hide');

            //detalleSuscripcion.tarjeta = cardResponse.card;
            $('.box-tarjeta').addClass('d-none');
            $('.box-diferidos').removeClass('d-none');
            $('#btn-next').removeClass('btn-suscribir-tarjeta').addClass('btn-continuar-tipo-diferido');

            await obtenerTiposDiferido();

            {{-- $('.box-tarjeta').addClass('d-none');
            $('.box-firma').removeClass('d-none');
            esTarjetaBox = false;
            await obtenerListadoDocumentosFirma()
            $('#btn-next').attr('disabled', true);
            validateFields();
            $('#btn-next').removeClass('btn-suscribir-tarjeta').addClass('btn-firmar-documentos'); --}}
        }else if(data.transaction.status === "pending"){
            showMessage('warning','Código inválido','Código erróneo, inténtalo nuevamente');
        }else{
            showMessage('warning','No se permiten más intentos','Haz alcanzado el número máximo de intentos con este código');
        }
    }

    async function getTokenNuvei(){
        let args = [];
        args["endpoint"] = `/get-auth-token-nuvei`;
        args["method"] = "GET";
        args["showLoader"] = true;
        const data = await call(args);
        return data.token;
    }
</script>
@endpush