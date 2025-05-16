@extends('template.verisLife.app-template')
@section('title')
Veris - Registro
@endsection
@section('title-section')
Registro
@endsection

@section('content')
<div class="flex-grow-1 container-p-y">
    <section class="mb-4 p-3">
        <div class="row justify-content-center">
            <div class="col-12 mb-4">
                <div id="wizard-validation" class="bs-stepper wizard-modern mt-2 mb-4">
                    <div class="bs-stepper-header justify-content-center pb-5">
                        <div class="step" data-target="#registo-usuarios-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">1</span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">Registrar usuarios</span>
                                    <span class="bs-stepper-subtitle">Lista de usuarios</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"><i class="ti ti-chevron-right"></i></div>
                        <div class="step" data-target="#dato-facturacion-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Datos de facturación</span>
                                    <span class="bs-stepper-subtitle">Detalles</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"><i class="ti ti-chevron-right"></i></div>
                        <div class="step" data-target="#forma-pago-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Forma de pago</span>
                                    <span class="bs-stepper-subtitle">Selecciona el método</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"><i class="ti ti-chevron-right"></i></div>
                        <div class="step" data-target="#confirmacion-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">4</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Confirmación</span>
                                    <span class="bs-stepper-subtitle">Revisa y finaliza</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content shadow-none p-0">
                        <div id="registo-usuarios-validation" class="content border rounded">
                            <div class="card shadow-none">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <!-- Título y buscador -->
                                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-4 mb-2 mb-md-0">
                                            <h5 class="text-raven-700 fw-medium mb-0">Beneficiarios</h5>
                                            <div class="input-group">
                                                <span class="input-group-text bg-wild-sand-50 border-end-0 border-0"><i class="ti ti-search"></i></span>
                                                <input type="text" class="form-control bg-wild-sand-50 border-start-0 border-0 py-3" placeholder="Buscar" aria-label="Buscar">
                                            </div>
                                        </div>

                                        <!-- Botones -->
                                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row gap-3 pe-3">
                                            <button type="button" class="btn btn-sm text-primary-veris fw-medium fs-14p shadow-none">+ Usuario</button>
                                            <button type="button" class="btn btn-sm text-primary-veris fw-medium fs-14p shadow-none">+ Carga Masiva</button>
                                            <a href="/ruta-a-tu-template/colaboradores.csv" class="btn btn-sm fw-medium shadow-none flex-column align-items-start">
                                                <small class="text-primary-veris fs-14p">Descarga template</small> 
                                                <small class="text-lochmara-500 fs-10p"><i class="fa-solid fa-download me-2"></i> colaboradores.csv</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Identificación</th>
                                                <th>Nombre y Apellido</th>
                                                <th>Teléfono móvil</th>
                                                <th>Correo</th>
                                                <th>Fecha de nacimiento</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td></td>
                                                <td><p class="me-1">0999999999</p></td>
                                                <td><p class="me-1">Juan Perez</p></td>
                                                <td><p class="me-1">0777777777</p></td>
                                                <td><p class="me-1">usuariovbe@mail.com</p></td>
                                                <td><p class="me-1">15/12/1992</p></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm text-aquamarine-300 shadow-none"><i class="fa-solid fa-pen"></i></button>
                                                    <button type="button" class="btn btn-sm text-rose-bud-300 shadow-none"><i class="fa-solid fa-trash-can"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="dato-facturacion-validation" class="content border rounded d-none">
                            <h4>Paso 2: Datos de facturación</h4>
                            <p>Contenido del paso 2</p>
                        </div>
                        <div id="forma-pago-validation" class="content border rounded d-none">
                            <h4>Paso 3: Forma de pago</h4>
                            <p>Contenido del paso 3</p>
                        </div>
                        <div id="confirmacion-validation" class="content border rounded d-none">
                            <h4>Confirmación</h4>
                            <p>Contenido de confirmación</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3 justify-content-center" id="wizard-actions">
                    <a id="btn-prev" href="/verislife/verificacion-plan" class="btn btn-outline-cerulean-blue-800">
                        <i class="fa-solid fa-chevron-left me-2"></i>
                        <span class="d-none d-sm-inline">Regresar</span>
                    </a>
                    <button id="btn-next" class="btn btn-cerulean-blue-800">
                        <span class="d-none d-sm-inline">Continuar</span>
                        <i class="fa-solid fa-chevron-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stepperEl = document.querySelector('#wizard-validation');
        const stepper = new Stepper(stepperEl, {
            linear: false,
            animation: true
        });
        const actions = document.getElementById('wizard-actions');
        const steps = Array.from(stepperEl.querySelectorAll('.bs-stepper-header .step'));
        const total = steps.length;

        function disableAllTriggers() {
            steps.forEach(step => {
                const btn = step.querySelector('.step-trigger');
                btn.setAttribute('disabled', '');
            });
        }

        function enableTrigger(idx) {
            const btn = steps[idx].querySelector('.step-trigger');
            btn.removeAttribute('disabled');
        }

        function updateCircles(idx) {
            steps.forEach((step, i) => {
                const circle = step.querySelector('.bs-stepper-circle');
                if (i < idx) {
                    circle.innerHTML = '<i class="bi bi-check-lg"></i>';
                } else {
                    circle.textContent = i + 1;
                }
            });
        }

        function showContent(targetId) {
            document.querySelectorAll('.bs-stepper-content .content')
                .forEach(el => el.classList.add('d-none'));
            document.getElementById(targetId).classList.remove('d-none');
        }

        function renderButtons(idx) {
            if (idx === 0) {
                actions.innerHTML = `
            <a id="btn-prev" href="/verislife/verificacion-plan" class="btn btn-outline-cerulean-blue-800">
              <i class="fa-solid fa-chevron-left me-2"></i>
              <span class="d-none d-sm-inline">Regresar</span>
            </a>
            <button id="btn-next" class="btn btn-cerulean-blue-800">
              <span class="d-none d-sm-inline">Continuar</span>
              <i class="fa-solid fa-chevron-right ms-2"></i>
            </button>
          `;
            } else if (idx === total - 1) {
                actions.innerHTML = `
            <a href="/home" class="btn btn-success">
              <i class="bi bi-house"></i>
              <span class="d-none d-sm-inline">Home</span>
            </a>
          `;
            } else {
                actions.innerHTML = `
            <button id="btn-prev" class="btn btn-outline-cerulean-blue-800">
              <i class="fa-solid fa-chevron-left me-2"></i>
              <span class="d-none d-sm-inline">Regresar</span>
            </button>
            <button id="btn-next" class="btn btn-cerulean-blue-800">
              <span class="d-none d-sm-inline">Continuar</span>
              <i class="fa-solid fa-chevron-right ms-2"></i>
            </button>
          `;
            }
            const btnPrev = document.getElementById('btn-prev');
            const btnNext = document.getElementById('btn-next');
            if (btnPrev && idx > 0 && idx < total - 1) btnPrev.addEventListener('click', () => stepper.previous());
            if (btnNext && idx < total - 1) btnNext.addEventListener('click', () => stepper.next());
        }

        stepperEl.addEventListener('show.bs-stepper', function(event) {
            const idx = event.detail.indexStep;
            disableAllTriggers();
            enableTrigger(idx);
            updateCircles(idx);
            const target = steps[idx].getAttribute('data-target').slice(1);
            showContent(target);
            renderButtons(idx);
        });

        // Inicialización
        disableAllTriggers();
        enableTrigger(0);
        updateCircles(0);
        showContent(steps[0].getAttribute('data-target').slice(1));
        renderButtons(0);
    });
</script>