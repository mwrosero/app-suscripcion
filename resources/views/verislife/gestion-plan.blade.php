@extends('template.app-template')

@section('title', 'Gestión de suscripción - Veris Care')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
            
            {{-- 1. Encabezado de la sección --}}
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h1 class="h3 mb-1 text-dark fw-bold">Gestión de suscripción</h1>
                </div>
            </div>

            {{-- 2. Contenedor Dinámico para Mensajes / Alertas superiores --}}
            <div id="contenedorAlertas"></div>

            {{-- 3. Tarjeta de Resumen del Plan y Suscriptor --}}
            <div id="seccionTarjetaSuscripcion" class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- Alerta visual si hay cancelación programada --}}
                    <div id="alertaCancelacionProgramada" class="d-none mb-4 p-3 rounded-3 bg-warning-soft text-warning d-flex align-items-center">
                        <i class="fa fa-info-circle fa-lg me-3"></i>
                        <div>
                            <strong>Cancelación programada.</strong> Tu programa estará activo hasta el <span id="lblVigenteHastaProg">--/--/----</span>. No se te cobrará de nuevo.
                        </div>
                    </div>

                    {{-- Cabecera del Plan y Etiqueta de Estado --}}
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h4 class="fw-bold text-dark mb-1" id="lblNombrePlan">Veris Care ...</h4>
                            <p class="text-muted small mb-0" id="lblTipoPlan">Plan ...</p>
                        </div>
                        <div>
                            {{-- Inicialmente oculto o en estado de carga para evitar mostrar "Activa" por defecto --}}
                            <span id="badgeEstadoSuscripcion" class="badge bg-secondary-soft text-secondary px-3 py-2 rounded-pill fw-semibold">
                                <i class="fa fa-spinner fa-spin me-1"></i> Cargando...
                            </span>
                        </div>
                    </div>

                    <hr class="text-muted opacity-25 my-4">

                    {{-- Cuadrícula de Información (Titular, Valor, Próximo cobro, Tarjeta) --}}
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <span class="text-muted small d-block mb-1">Titular</span>
                            <span class="fw-bold text-dark" id="lblTitularPlan">{{ Session::get('infoCliente')->nombrePacienteTitular ?? 'María Pérez' }}</span>
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small d-block mb-1">Valor del plan</span>
                            <span class="fw-bold text-dark" id="lblValorPlan">US$ --</span>
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small d-block mb-1">Próximo cobro</span>
                            <span class="fw-bold text-dark" id="lblProximoCobro">--/--/----</span>
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small d-block mb-1">Tarjeta</span>
                            <span class="fw-bold text-dark" id="lblTarjetaResumen">Terminada en ----</span>
                        </div>
                    </div>

                    {{-- 3.1 Bloque Inferior de Cancelación --}}
                    <div id="seccionBloqueCancelacion" class="border-top pt-4 mt-4 d-none">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                            <div>
                                <h6 class="fw-bold text-dark mb-1">¿Quieres dejar de usar el programa?</h6>
                                <p class="text-muted small mb-0" id="textoAyudaCancelacion">Puedes cancelar cuando quieras. Seguirás con tus beneficios hasta el <span id="lblFechaBeneficioAyuda">--/--/----</span>.</p>
                            </div>
                            <div id="contenedorBotonCancelarSuscripcion">
                                {{-- Botón secundario con borde rojo inyectado por JS --}}
                            </div>
                        </div>
                    </div>

                    {{-- Mensaje inferior cuando ya está programada la cancelación --}}
                    <div id="seccionMensajeCancelado" class="border-top pt-3 mt-4 d-none text-muted small">
                        Si cambias de opinión, podrás contratar el programa de nuevo cuando finalice.
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- 4. Modal de Cancelación de Suscripción (Pasos 1 y 2 en modal-md) --}}
<div class="modal fade" id="modalCancelacionSuscripcion" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content rounded-4 border-0 p-2 p-md-3">
            
            <style>
                .option-card {
                    border: 1px solid #dee2e6;
                    border-radius: 12px;
                    transition: all 0.2s ease-in-out;
                    cursor: pointer;
                }
                .option-card:hover {
                    border-color: #198754;
                }
                .option-card.selected {
                    border-color: #198754;
                    background-color: #f4faf7;
                }
            </style>

            {{-- Paso 1: Motivo --}}
            <div id="stepMotivoCancelacion" class="modal-body p-3 p-md-4">
                <div class="mb-3">
                    <span class="text-uppercase text-muted fs-12 fw-bold tracking-wider">PASO 1 DE 2</span>
                    <h4 class="fw-bold text-dark mt-1 mb-1">Cuéntanos por qué te vas</h4>
                    <p class="text-muted small mb-0">Tu respuesta nos ayuda a mejorar. Elige una opción para continuar.</p>
                </div>

                <div id="listaMotivosContainer" class="d-flex flex-column gap-2 mb-3"></div>

                <div id="contenedorCampoOtro" class="mb-4 d-none">
                    <label class="form-label small fw-semibold text-dark">Escribe tu motivo</label>
                    <textarea class="form-control rounded-3" id="txtMotivoOtro" rows="3" maxlength="300" placeholder="Escribe tu motivo..."></textarea>
                    <div class="text-end text-muted small mt-1"><span id="contadorCaracteres">0</span>/300</div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4 py-2" data-bs-dismiss="modal">Volver</button>
                    <button type="button" id="btnContinuarCancelacion" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold" disabled>Continuar</button>
                </div>
            </div>

            {{-- Paso 2: Confirmación --}}
            <div id="stepConfirmacionCancelacion" class="modal-body p-3 p-md-4 d-none">
                <div class="mb-3">
                    <span class="text-uppercase text-muted fs-12 fw-bold tracking-wider">PASO 2 DE 2</span>
                    <h4 class="fw-bold text-dark mt-1 mb-1">¿Confirmas la cancelación?</h4>
                    <p class="text-muted small mb-0">Revisa los detalles antes de procesar tu solicitud.</p>
                </div>

                <div id="avisoBajaInmediata" class="alert alert-warning border-0 rounded-3 small mb-3 d-none">
                    <i class="fa fa-exclamation-triangle me-1"></i> Tu último cobro no se pudo procesar, por eso ya no tienes días pagados por usar.
                </div>

                <div class="bg-light p-3 rounded-3 mb-3 small">
                    <ol class="mb-0 ps-3">
                        <li class="mb-2">Sigues con tus beneficios hasta el <b id="lblFechaFinBen">--/--/----</b>.</li>
                        <li class="mb-2">No se te volverá a cobrar. Eliminaremos tu tarjeta terminada en <b id="lblUltimosDigitosConf">----</b>.</li>
                        <li>Después de esa fecha tú y tu grupo familiar dejarán de tener los beneficios del programa.</li>
                    </ol>
                </div>

                <div class="d-flex justify-content-between align-items-center bg-white border rounded-3 p-3 mb-4">
                    <div>
                        <span class="text-muted d-block" style="font-size: 11px;">Motivo:</span>
                        <strong class="text-dark small" id="lblMotivoSeleccionadoResumen">-</strong>
                    </div>
                    <button type="button" id="btnCambiarMotivo" class="btn btn-link btn-sm text-success p-0 fw-semibold text-decoration-none">Cambiar</button>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="button" id="btnVolverAPaso1" class="btn btn-outline-secondary rounded-pill px-4 py-2">Volver</button>
                    <button type="button" id="btnEjecutarCancelacion" class="btn btn-danger rounded-pill px-4 py-2 fw-semibold">Sí, cancelar mi suscripción</button>
                </div>
            </div>

            {{-- Paso 3: Resultado Éxito --}}
            <div id="stepResultadoCancelacion" class="modal-body p-4 text-center d-none">
                <div class="bg-success-soft text-success rounded-circle p-3 d-inline-flex mb-3" style="width: 70px; height: 70px; display: grid; place-items: center; margin: 0 auto;">
                    <i class="fa fa-check fa-2x"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2">Cancelación registrada</h4>
                <p class="text-muted small mb-4">Tu programa seguirá activo hasta la fecha indicada. No se te volverá a cobrar y eliminamos tu tarjeta. Te enviamos la confirmación a tu correo.</p>
                <button type="button" id="btnCerrarYRecargar" class="btn btn-primary rounded-pill px-5 py-2 fw-semibold" data-bs-dismiss="modal">Volver a Gestión de suscripción</button>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let detalleSuscripcion = {};
    let secuenciaAfiliado = "{{ Session::get('infoCliente')->secuenciaAfiliado ?? '' }}";
    let motivoElegidoFinal = "";

    document.addEventListener('DOMContentLoaded', async function () {
        await cargarInformacionCompleta();
        setupEventosModalCancelacion();
    });

    async function cargarInformacionCompleta() {
        try {
            let argsPlan = [];
            argsPlan["endpoint"] = api_url + `/${api_war_empresarial}/v1/suscripcion/planes/detalle_afiliado?secuenciaAfiliado=${secuenciaAfiliado}`;
            argsPlan["method"] = "GET";
            argsPlan["showLoader"] = true;
            argsPlan["token"] = _token;
            const resPlan = await call(argsPlan);

            if (resPlan && resPlan.code === 200 && resPlan.success && resPlan.data && resPlan.data.length > 0) {
                let planInfo = resPlan.data[0];
                document.getElementById('lblNombrePlan').textContent = `Veris Care ${planInfo.nombre || 'Plenitud'}`;
                document.getElementById('lblTipoPlan').textContent = `Plan ${planInfo.tipo ? planInfo.tipo.toLowerCase() : 'mensual'}`;
                
                let frecuenciaTexto = planInfo.tipo === 'ANUAL' ? 'cada año' : 'cada mes';
                document.getElementById('lblValorPlan').textContent = `US$ ${parseFloat(planInfo.valorFinal || planInfo.precio || 0).toFixed(2)} ${frecuenciaTexto}`;
            }

            let argsPago = [];
            argsPago["endpoint"] = api_url + `/${api_war_empresarial}/v1/suscripcion/metodo_pago`;
            argsPago["method"] = "GET";
            argsPago["showLoader"] = false;
            argsPago["token"] = _token;
            const resPago = await call(argsPago);

            if (resPago && resPago.code === 200 && resPago.success && resPago.data) {
                detalleSuscripcion = resPago.data;
                renderizarDatosPagoYCancelacion(detalleSuscripcion);
            }
        } catch (e) {
            console.error("Error al cargar la información de suscripción:", e);
        }
    }

    function renderizarDatosPagoYCancelacion(data) {
        if (data.aplica === false) {
            alert("La opción de gestión de suscripción no aplica para este usuario.");
            window.location.href = '/portal-fidelizacion/dashboard';
            return;
        }

        if (data.tarjeta) {
            document.getElementById('lblTarjetaResumen').textContent = `Terminada en ${data.tarjeta.ultimosDigitos || '4242'}`;
        }

        if (data.cancelacion && data.cancelacion.vigenteHasta) {
            let partes = data.cancelacion.vigenteHasta.split('-');
            document.getElementById('lblProximoCobro').textContent = `${partes[2]}/${partes[1]}/${partes[0]}`;
        }

        // Una vez que llega la respuesta real, se pinta el estado correcto (Activa o Cancelación programada)
        const badgeEstado = document.getElementById('badgeEstadoSuscripcion');

        if (data.cancelacion && data.cancelacion.programada === true) {
            document.getElementById('alertaCancelacionProgramada').classList.remove('d-none');
            badgeEstado.className = "badge bg-warning-soft text-warning px-3 py-2 rounded-pill fw-semibold";
            badgeEstado.textContent = "Cancelación programada";
            
            if (data.cancelacion.vigenteHasta) {
                let partes = data.cancelacion.vigenteHasta.split('-');
                document.getElementById('lblVigenteHastaProg').textContent = `${partes[2]}/${partes[1]}/${partes[0]}`;
                document.getElementById('lblProximoCobro').textContent = "Ninguno";
                document.getElementById('lblTarjetaResumen').textContent = "Eliminada";
            }
            document.getElementById('seccionBloqueCancelacion').classList.add('d-none');
            document.getElementById('seccionMensajeCancelado').classList.remove('d-none');
        } else {
            badgeEstado.className = "badge bg-success-soft text-success px-3 py-2 rounded-pill fw-semibold";
            badgeEstado.textContent = "Activa";

            if (data.cancelacion && data.cancelacion.puedeCancelar === true) {
                document.getElementById('seccionBloqueCancelacion').classList.remove('d-none');
                document.getElementById('seccionMensajeCancelado').classList.add('d-none');
                
                if (data.cancelacion.vigenteHasta) {
                    let partes = data.cancelacion.vigenteHasta.split('-');
                    document.getElementById('lblFechaBeneficioAyuda').textContent = `${partes[2]}/${partes[1]}/${partes[0]}`;
                }

                const contenedorBtnCanc = document.getElementById('contenedorBotonCancelarSuscripcion');
                contenedorBtnCanc.innerHTML = `<button type="button" id="btnAbrirModalCancelacion" class="btn btn-outline-danger rounded-pill px-4 fw-semibold">Cancelar suscripción</button>`;
                
                document.getElementById('btnAbrirModalCancelacion').addEventListener('click', function() {
                    abrirModalCancelacion(data.cancelacion);
                });
            }
        }
    }

    function abrirModalCancelacion(cancelacionData) {
        document.getElementById('stepMotivoCancelacion').classList.remove('d-none');
        document.getElementById('stepConfirmacionCancelacion').classList.add('d-none');
        document.getElementById('stepResultadoCancelacion').classList.add('d-none');

        const listaContainer = document.getElementById('listaMotivosContainer');
        listaContainer.innerHTML = '';

        let motivosList = cancelacionData.motivos || [];
        
        motivosList.forEach((motivo, index) => {
            listaContainer.innerHTML += `
                <div class="form-check p-3 option-card d-flex align-items-center" onclick="document.getElementById('motivo_${index}').click()">
                    <input class="form-check-input radio-motivo mt-0 ms-1" type="radio" name="opcionMotivo" id="motivo_${index}" value="${motivo}">
                    <label class="form-check-label w-100 fw-medium text-dark ms-3 cursor-pointer" for="motivo_${index}">${motivo}</label>
                </div>`;
        });

        listaContainer.innerHTML += `
            <div class="form-check p-3 option-card d-flex align-items-center" onclick="document.getElementById('motivo_otro').click()">
                <input class="form-check-input radio-motivo mt-0 ms-1" type="radio" name="opcionMotivo" id="motivo_otro" value="Otro">
                <label class="form-check-label w-100 fw-medium text-dark ms-3 cursor-pointer" for="motivo_otro">Otro</label>
            </div>`;

        document.querySelectorAll('.radio-motivo').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.option-card').forEach(card => card.classList.remove('selected'));
                this.closest('.option-card').classList.add('selected');

                document.getElementById('btnContinuarCancelacion').removeAttribute('disabled');
                if (this.value === 'Otro') {
                    document.getElementById('contenedorCampoOtro').classList.remove('d-none');
                    document.getElementById('txtMotivoOtro').focus();
                } else {
                    document.getElementById('contenedorCampoOtro').classList.add('d-none');
                    document.getElementById('txtMotivoOtro').value = '';
                }
            });
        });

        $('#modalCancelacionSuscripcion').modal('show');
    }

    function setupEventosModalCancelacion() {
        const txtOtro = document.getElementById('txtMotivoOtro');
        if(txtOtro) {
            txtOtro.addEventListener('input', function() {
                let len = this.value.trim().length;
                document.getElementById('contadorCaracteres').textContent = len;
                if(len > 0 && len <= 300) {
                    document.getElementById('btnContinuarCancelacion').removeAttribute('disabled');
                } else {
                    document.getElementById('btnContinuarCancelacion').setAttribute('disabled', 'true');
                }
            });
        }

        document.getElementById('btnContinuarCancelacion').addEventListener('click', function() {
            let seleccionado = document.querySelector('input[name="opcionMotivo"]:checked');
            if (!seleccionado) return;

            if (seleccionado.value === 'Otro') {
                motivoElegidoFinal = document.getElementById('txtMotivoOtro').value.trim();
            } else {
                motivoElegidoFinal = seleccionado.value;
            }

            document.getElementById('stepMotivoCancelacion').classList.add('d-none');
            document.getElementById('stepConfirmacionCancelacion').classList.remove('d-none');

            document.getElementById('lblMotivoSeleccionadoResumen').textContent = motivoElegidoFinal;
            let ultDig = detalleSuscripcion.tarjeta ? detalleSuscripcion.tarjeta.ultimosDigitos : '4242';
            document.getElementById('lblUltimosDigitosConf').textContent = ultDig;

            let vigenteHasta = detalleSuscripcion.cancelacion ? detalleSuscripcion.cancelacion.vigenteHasta : null;
            if (vigenteHasta) {
                let partes = vigenteHasta.split('-');
                document.getElementById('lblFechaFinBen').textContent = `${partes[2]}/${partes[1]}/${partes[0]}`;
                document.getElementById('avisoBajaInmediata').classList.add('d-none');
                document.getElementById('btnEjecutarCancelacion').textContent = "Sí, cancelar mi suscripción";
            } else {
                document.getElementById('avisoBajaInmediata').classList.remove('d-none');
                document.getElementById('btnEjecutarCancelacion').textContent = "Sí, dar de baja ahora";
                document.getElementById('lblFechaFinBen').textContent = "inmediatamente";
            }
        });

        const volverP1 = () => {
            document.getElementById('stepConfirmacionCancelacion').classList.add('d-none');
            document.getElementById('stepMotivoCancelacion').classList.remove('d-none');
        };
        document.getElementById('btnCambiarMotivo').addEventListener('click', volverP1);
        document.getElementById('btnVolverAPaso1').addEventListener('click', volverP1);

        document.getElementById('btnEjecutarCancelacion').addEventListener('click', async function() {
            let btnExec = this;
            btnExec.setAttribute('disabled', 'true');
            btnExec.textContent = "Cancelando...";

            let args = [];
            args["endpoint"] = api_url + `/${api_war_empresarial}/v1/suscripcion/cancelacion`;
            args["method"] = "POST";
            args["showLoader"] = true;
            args["token"] = _token;
            args["bodyType"] = "json";
            args["data"] = JSON.stringify({ "motivo": motivoElegidoFinal });

            const response = await call(args);
            if (response && response.code === 200 && response.success) {
                document.getElementById('stepConfirmacionCancelacion').classList.add('d-none');
                document.getElementById('stepResultadoCancelacion').classList.remove('d-none');
            } else {
                showMessage('error', response.message || 'Ocurrió un error al procesar la cancelación.');
                btnExec.removeAttribute('disabled');
                btnExec.textContent = "Sí, cancelar mi suscripción";
            }
        });

        document.getElementById('btnCerrarYRecargar').addEventListener('click', function() {
            location.reload();
        });
    }
</script>
@endpush