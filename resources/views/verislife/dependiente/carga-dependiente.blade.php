@extends('template.app-template')
@section('title')
Veris
@endsection
@section('title-section')
Registro
@endsection

@section('content')
@php
$processId = base64_encode(uniqid());
@endphp
<div class="flex-grow-1 container-p-y">
    <!-- COLABORADOR 1 B2B-->
    <section class="mb-4 px-lg-5 py-4">
        <div class="row g-3">
            <div class="col-sm-12">
                <div class="card bg-cornflower-blue-400 rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-medium border-start-white text-white ps-3 fs-18 mb-0">Opción contratada</h5>
                        </div>
                        <div class="row g-3 justify-content-center mb-4">
                            <div class="col-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row rounded-4 p-3">
                                            <div class="col-md-6">
                                                <h6 class="bg-zumthor-50 text-blue-zodiac-950 fw-semibold text-start px-3 py-2 rounded w-auto">Opción 1</h6>
                                                <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 39%</span>
                                                <h2 class="fw-semibold text-blue-zodiac-950 mb-0">$90 <small class="fs-6">/anual</small></h2>
                                                <p class="text-fiord-700 text-decoration-line-through small mb-0">PVP $280</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="fw-semibold">Beneficios</h6>
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-flex align-items-start lh-sm mb-3">
                                                        <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                        <span>4 consultas al año<br><small class="text-fiord-700">Uso inmediato</small></span>
                                                    </li>
                                                    <li class="d-flex align-items-start lh-sm mb-3">
                                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                        <span>1 Profilaxis</span>
                                                    </li>
                                                    <li class="d-flex align-items-start lh-sm mb-3">
                                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                        <span>Consulta Optométrica y Odontológica</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-4 px-lg-5 py-4">
        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-cerulean-blue-800 py-3">
                        <h6 class="fw-medium border-start-white text-white ps-3 mb-0">Dependientes registrados</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-0 justify-content-around align-items-center my-4">
                            <div class="col-12 col-md-5">
                                <div class="avatar avatar-lg me-2">
                                    <span class="avatar-initial rounded-4 bg-cerulean-blue-800">
                                        <i class="fa-solid fa-users text-white fs-2"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <h2 class="text-primary-veris text-center mb-0">1</h2>
                            </div>
                            <div class="content-message text-center d-none">
                                <i class="fa-solid fa-bullhorn fs-3 mb-3"></i>
                                <h6 class="text-darktext-blue-zodiac-950 mb-0">No tienes dependientes registrados</h6>
                            </div>
                        </div>
                        <a href="/verislife/carga-dependiente/registro" class="btn btn-blue-veris px-0 w-100">Ver registro</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-cerulean-blue-800 py-3">
                        <h6 class="fw-medium border-start-white text-white ps-3 mb-0">Consultas realizadas</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-0 justify-content-center align-items-center my-4">
                            <div class="col-3">
                                <div class="progress-circle my-auto ms-auto" data-percentage="10">
                                    <span class="progress-left">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <div class="progress-value">
                                        <div>
                                            <span><i class="bi bi-check2 fw-medium text-success"></i></span>
                                            <p class="text-success fw-medium fs-12p mb-0">0/4</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#!" class="btn btn-blue-veris px-0 w-100">Ver consultas realizadas</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card h-100">
                    <div class="card-header bg-cerulean-blue-800 py-3">
                        <h6 class="fw-medium border-start-white text-white ps-3 mb-0">Gratuidades</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-0 justify-content-center align-items-center my-4">
                            <div class="col-3">
                                <div class="progress-circle my-auto ms-auto" data-percentage="10">
                                    <span class="progress-left">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <div class="progress-value">
                                        <div>
                                            <span><i class="bi bi-check2 fw-medium text-success"></i></span>
                                            <p class="text-success fw-medium fs-12p mb-0">0/4</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#!" class="btn btn-blue-veris px-0 w-100">Ver detalle</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-4 px-lg-5 py-4">
        <div class="row g-3">
            <div class="col-sm-12">
                <div class="card bg-white rounded-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-medium border-start-blue text-blue-zodiac-950 ps-3 fs-18 mb-0">Historial de uso</h5>
                            <a href="#!" class="fw-medium me-1">Ver todos</a>
                        </div>
                        <div class="row g-3 justify-content-center mb-4">
                            <div class="content-message text-center">
                                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/monitor.svg" />
                                <h4 class="text-primary-veris">Pronto podrás visualizar tu información aquí</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('scripts')
<script>
    let codigoCliente = {{ Session::get('infoCliente')->informacionCliente->codigoCliente }};
    {{-- let codigoCliente = 13315; --}}
    document.addEventListener('DOMContentLoaded', async () => {
        const planes = await obtenerPlanesSuscripcionDetalleEmpresa();
        const planesContratados = planes.filter(plan => plan.contratado);
        const planesPendientes = planes.filter(plan => !plan.contratado);

        renderizarPlanes(planesContratados, 'suscripcionContratadas', 'empty-space-no-contratado', true);
        renderizarPlanes(planesPendientes, 'suscripcionPendientes', 'empty-space-pendientes-registro', false);
        drawAdminPlanes(planesContratados);

        $('body').on('click', '.btn-continuar-registro', function() {
            let data = JSON.parse($(this).attr('data-rel'));
            let suscripcion = {};
            suscripcion.detallePlan = data;
            suscripcion.origen = "suscripcion";
            localStorage.setItem(`suscripcion-{{ $processId }}`, JSON.stringify(suscripcion));
            location.href = '/portal-fidelizacion/verificacion-plan/{{ $processId }}';
        });

        $('body').on('click', '.btn-edit-plan', function() {
            let data = JSON.parse($(this).attr('data-rel'));
            let suscripcion = {};
            suscripcion.detallePlan = data;
            suscripcion.origen = "edicion";
            localStorage.setItem(`suscripcion-{{ $processId }}`, JSON.stringify(suscripcion));
            location.href = '/portal-fidelizacion/registro-plan/{{ $processId }}';
        });

    });

    async function drawAdminPlanes(planes){
        if(planes.length == 0){
            return;
        }
        $('.section-admin-planes').removeClass('d-none');
        //section-admin-planes
        let elem = ``;
        $.each(planes, function(key, value){
            let logoNombre = 'logo-veris.svg';
            if (value.lineaNegocio === 'PMF') logoNombre = 'parami.png';
            const logoSrc = `${url_site}/assets/img/veris/${logoNombre}`;

            elem += `<div class="swiper-slide">
                        <div class="card rounded-4 shadow-sm h-100">
                            <div class="card-body px-3 py-3">
                                <div class="text-center border-start-blue-8 mb-3">
                                    <div class="ms-3">
                                        <img src="${logoSrc}" class="img-fluid mx-auto mb-3" alt="${value.lineaNegocio}" width="128">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h6 class="text-bay-many-900 mb-0">${value.nombre}</h6>
                                            <button type="button" class="btn text-grenadier-600 fw-normal p-0 me-2" data-bs-toggle="modal" data-bs-target="#deleteSubscriptionModal"><i class="fa-regular fa-trash-can fs-4"></i></button>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="text-start">
                                                <h2 class="fw-bold text-blue-zodiac-950 mb-0">${value.cantidadAfiliados}</h2>
                                            </div>
                                            <div class="text-end">
                                                <i class="fa-solid fa-users fs-1 text-primary-veris"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex flex-column gap-3 px-3 pt-0">
                                <a href="#" class="btn btn-blue-veris fs-14p w-100 btn-edit-plan" data-rel='${ JSON.stringify(value) }'>
                                    Mejora tus beneficios
                                </a>
                                <a href="#" class="btn btn-outline-blue-veris fs-14p w-100 btn-edit-plan" data-rel='${ JSON.stringify(value) }'>
                                    Ver colaboradores
                                </a>
                            </div>
                        </div>
                    </div>`;
        })
        $('#planesContratadosAdmin').html(elem);
    }

    async function obtenerPlanesSuscripcionDetalleEmpresa() {
        if (!api_url || !_application || !_idOrganizacion || !_token) {
            console.error('Faltan variables globales: api_url, _application, _idOrganizacion o _token.');
            return null;
        }

        const baseUrl = `${api_url}/empresarial/v1/suscripcion/planes/detalle_afiliado`; 
        const queryParams = new URLSearchParams({
            secuenciaAfiliado: codigoCliente
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: true,
        });

        return response?.data || [];
    }

    function renderizarPlanes(planes, containerId, emptyMessageId, esContratado = false) {
        const container = document.getElementById(containerId);
        const emptyMessage = document.getElementById(emptyMessageId);

        container.innerHTML = '';

        if (planes.length === 0) {
            emptyMessage.classList.remove('d-none');
            return;
        }

        emptyMessage.classList.add('d-none');

        planes.forEach(value => {

            const beneficios = value.beneficios || [];
            const beneficiosHTML = beneficios.map((beneficio, index) => {
                const claseIcono = index === 0 ? 'text-primary-veris' : 'text-blue-zodiac-950';
                const claseTexto = index === 0 ? 'text-primary-veris' : '';
                return `
                    <li class="mb-2 d-flex align-items-start lh-sm">
                        <i class="bi bi-patch-check-fill ${claseIcono} me-2"></i>
                        ${beneficio.descripcion}
                    </li>`;
            }).join('');
            //${beneficio.cantidadGratuita ? ` (${beneficio.cantidadGratuita})` : ''}
            let logoNombre = 'logo-veris.svg';
            if (value.lineaNegocio === 'PMF') logoNombre = 'parami.png';
            const logoSrc = `${url_site}/assets/img/veris/${logoNombre}`;

            const slide = document.createElement('div');
            slide.className = 'swiper-slide';
            slide.innerHTML = esContratado ?
                `
                <div class="card border-perano-300 rounded-4 shadow-none h-100">
                    <div class="card-body p-0 pt-3">
                        <div class="d-flex justify-content-between mx-3 mb-3">
                            <div class="option-info">
                                <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRASTE ${value.porcentajeDescuento}%</span>
                                <h5 class="option-title fw-medium mb-0">${value.nombre}</h5>
                            </div>
                            <div class="price-block text-start">
                                <h5 class="fw-semibold mb-0">$${value.valorFinal.toFixed(2)} <small class="fw-normal fs-14p">/${value.tipo}</small></h5>
                                <p class="text-fiord-700 text-decoration-line-through fs-12p mb-0">PVP $${value.precio.toFixed(2)}</p>
                            </div>
                        </div>
                        <button type="button" data-rel='${JSON.stringify(value)}' class="btn text-primary-veris fs-12p border-top rounded-0 w-100 btn-edit-plan">Ver detalle</button>
                    </div>
                </div>` :
                `
                <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                    <img src="${logoSrc}" class="img-fluid mx-auto mb-3" alt="${value.lineaNegocio}" width="128">
                    <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                        ${value.nombre}
                    </h5>
                    <div class="px-3 py-2">
                        <div class="mt-1">
                            <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA ${value.porcentajeDescuento}%</span>
                        </div>
                        <div class="my-1">
                            <h1 class="fw-bold text-blue-zodiac-950 m-0">$${value.valorFinal.toFixed(2)} <small class="fw-medium fs-5">/${value.tipo}</small></h1>
                            <small class="text-muted text-decoration-line-through text-xs">PVP: $${value.precio.toFixed(2)}</small>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="p-3">
                        <h6 class="fw-bold">Beneficios</h6>
                        <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                            ${beneficiosHTML}
                        </ul>
                        <div class="text-center">
                            <button type="button" data-rel='${JSON.stringify(value)}' class="btn btn-lg btn-blue-veris w-100 btn-continuar-registro">Continuar registro</button>
                        </div>
                    </div>
                </div>
                `;
            container.appendChild(slide);
        });
    }
    
</script>
@endpush