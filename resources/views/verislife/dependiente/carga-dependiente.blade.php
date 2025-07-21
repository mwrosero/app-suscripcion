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
                            <div class="col-12 col-lg-6" id="planContratado">
                                
                            </div>
                            <div class="content-message text-center d-none" id="empty-space-planes-contratados">
                                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/login-amico1.svg" />
                                <h4 class="text-white">Pronto podrás visualizar tu información aquí</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-4 px-lg-5 py-4 box-indicadores d-none">
        <div class="row g-3 d-flex justify-content-center">
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
                                <h2 class="text-primary-veris text-center mb-0 qtyDependientesAfiliados">1</h2>
                            </div>
                            <div class="content-message text-center d-none">
                                <i class="fa-solid fa-bullhorn fs-3 mb-3"></i>
                                <h6 class="text-darktext-blue-zodiac-950 mb-0">No tienes dependientes registrados</h6>
                            </div>
                        </div>
                        <div class="btn btn-blue-veris px-0 w-100 btn-registro">Ver registro</div>
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
            {{-- <div class="col-12 col-md-4">
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
            </div> --}}
        </div>
    </section>
    <section class="mb-4 px-lg-5 py-4 d-none">
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
    let codigoCliente = {{ Session::get('infoCliente')->secuenciaAfiliado  }};
    {{-- let codigoCliente = 13315; --}}
    document.addEventListener('DOMContentLoaded', async () => {
        const planes = await obtenerPlanesSuscripcionDetalleEmpresa();
        const planesContratados = planes.filter(plan => plan.contratado);

        renderizarPlanes(planesContratados);

        $('body').on('click', '.btn-continuar-registro', function() {
            let data = JSON.parse($(this).attr('data-rel'));
            let suscripcion = {};
            suscripcion.detallePlan = data;
            suscripcion.origen = "suscripcion";
            localStorage.setItem(`suscripcion-{{ $processId }}`, JSON.stringify(suscripcion));
            location.href = '/portal-fidelizacion/verificacion-plan/{{ $processId }}';
        });

        $('body').on('click', '.btn-registro', function() {
            let data = JSON.parse($(this).attr('data-rel'));
            let suscripcion = {};
            suscripcion.detallePlan = data;
            suscripcion.origen = "edicion";
            localStorage.setItem(`suscripcion-{{ $processId }}`, JSON.stringify(suscripcion));
            location.href = '/portal-fidelizacion/registro-dependientes/{{ $processId }}';
        });

    });

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

    function renderizarPlanes(planesContratados) {
        if(planesContratados === null || planesContratados.length == 0){
            $('#empty-space-planes-contratados').removeClass('d-none')
            return;
        }
        let plan = planesContratados[0];
        let beneficios = ``;
        $.each(plan.beneficios, function(key,value){
            const claseIcono = key === 0 ? 'text-primary-veris' : 'text-blue-zodiac-950';
            beneficios += `<li class="mb-2 d-flex align-items-start lh-sm">
                    <i class="bi bi-patch-check-fill ${claseIcono} me-2"></i>
                    ${value.descripcion}
                </li>`
        })
        let elem = `<div class="card">
                <div class="card-body">
                    <div class="row rounded-4 p-3">
                        <div class="col-md-6">
                            <h6 class="bg-zumthor-50 text-blue-zodiac-950 fw-semibold text-start px-3 py-2 rounded w-auto">${plan.nombre}</h6>
                            <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 39%</span>
                            <h2 class="fw-semibold text-blue-zodiac-950 mb-0">$${plan.valorFinal.toFixed(2)} <small class="fs-6 text-capitalize">/${plan.tipo.toLowerCase()}</small></h2>
                            <p class="text-fiord-700 text-decoration-line-through small mb-0">PVP $${plan.precio.toFixed(2)}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-semibold">Beneficios</h6>
                            <ul class="list-unstyled mb-0">
                                ${beneficios}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>`;
        $('.btn-registro').attr('data-rel', JSON.stringify(plan))
        $('#planContratado').html(elem)
        $('.qtyDependientesAfiliados').html(plan.cantidadAfiliados)
        $('.box-indicadores').removeClass('d-none')
    }
    
</script>
@endpush