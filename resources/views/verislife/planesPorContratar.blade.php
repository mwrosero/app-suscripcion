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
<div class="modal fade" id="avisoFrecuenciaLabelencia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="avisoFrecuenciaLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <h5 class="text-primary-veris text-center fw-bold">Método de pago</h5>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/success-ok.svg" class="mb-3"/>
                <h5 class="text-blue-zodiac-950 fw-bold">El método de pago “Descuento a rol” solo está disponible en los programas anuales</h5>
                <div class="d-block">
                    <div type="button" class="btn bg-blue-ribbon-600 text-white w-100 my-2 text-nowrap fs-14p py-2 col" data-bs-dismiss="modal">Cerrar</div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="container-fluid bg-sail-gradient px-3 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Elije la opción <b class="text-primary-veris nombreLineaNegocio"></b> de tu preferencia</h5>
        <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/logo-veris.svg" class="me-4" alt="veris">
    </div>
    <div class="row justify-content-center px-xl-5">
        <ul class="nav nav-pills justify-content-center bg-white w-auto p-1 rounded-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 px-lg-5 active" id="pills-anual-veris-tab" data-bs-toggle="pill" data-bs-target="#pills-anual-veris" tipo-rel="ANUAL" type="button" role="tab" aria-controls="pills-anual-veris" aria-selected="true">Anual</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 px-lg-5" id="pills-mensual-veris-tab" data-bs-toggle="pill" data-bs-target="#pills-mensual-veris" tipo-rel="MENSUAL" type="button" role="tab" aria-controls="pills-mensual-veris" aria-selected="false">Mensual</button>
            </li>
        </ul>
        <div class="tab-content bg-transparent" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-anual-veris" role="tabpanel" aria-labelledby="pills-anual-veris-tab" tabindex="0">
                <div class="row g-3">
                    <div class="slider-promotions position-relative">
                        <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 4 }}'>
                            <div class="swiper-wrapper" id="planesANUAL">

                                {{-- <div class="swiper-slide">
                                    <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                        <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                            Esencial
                                        </h5>
                                        <div class="px-3 py-2">
                                            <div class="mt-1">
                                                <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 36%</span>
                                            </div>
                                            <div class="my-1">
                                                <h1 class="fw-bold text-blue-zodiac-950 m-0">$90 <small class="fw-medium fs-5">/anual</small></h1>
                                                <small class="text-muted text-decoration-line-through text-xs">PVP: $140</small>
                                            </div>
                                        </div>
                                        <hr class="my-1">
                                        <div class="p-3">
                                            <h6 class="fw-bold">Beneficios</h6>
                                            <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                <li class="mb-2 d-flex align-items-start lh-sm">
                                                    <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                    <span>4 consultas al año<br><small>Uso inmediato</small></span>
                                                </li>
                                                <li class="mb-2 d-flex align-items-start lh-sm">
                                                    <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                    1 Profilaxis
                                                </li>
                                                <li class="d-flex align-items-start lh-sm">
                                                    <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                    Consulta Optométrica<br>y Odontológica
                                                </li>
                                            </ul>
                                            <div class="text-center">
                                                <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Continuar registro</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        <div class="swiper-button-next mt-n5 me-n2 me-lg-n3 box-shadow-2 d-none"></div>
                        <div class="swiper-button-prev mt-n5 ms-n2 ms-lg-n3 box-shadow-2 d-none"></div>
                        <div class="swiper-pagination position-absolute bottom-0"></div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="pills-mensual-veris" role="tabpanel" aria-labelledby="pills-mensual-veris-tab" tabindex="0">
                <div class="row g-3">
                    <div class="slider-promotions position-relative">
                        <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 4 }}'>
                            <div class="swiper-wrapper" id="planesMENSUAL">

                                {{-- <div class="swiper-slide">
                                    <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                        <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                            Opción 1
                                        </h5>
                                        <div class="px-3 py-2">
                                            <div class="mt-1">
                                                <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 30%</span>
                                            </div>
                                            <div class="my-1">
                                                <h1 class="fw-bold text-blue-zodiac-950 m-0">$8,25 <small class="fw-medium fs-5">/mes</small></h1>
                                                <small class="text-muted text-decoration-line-through text-xs">PVP: $140</small>
                                            </div>
                                        </div>
                                        <hr class="my-1">
                                        <div class="p-3">
                                            <h6 class="fw-bold">Beneficios</h6>
                                            <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                <li class="mb-2 d-flex align-items-start lh-sm">
                                                    <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                    <span>4 consultas al año<br><small>1 consulta por trimestre</small></span>
                                                </li>
                                                <li class="mb-2 d-flex align-items-start lh-sm">
                                                    <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                    1 Profilaxis
                                                </li>
                                                <li class="d-flex align-items-start lh-sm">
                                                    <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                    Consulta Optométrica<br>y Odontológica
                                                </li>
                                            </ul>
                                            <div class="text-center">
                                                <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Continuar registro</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        <div class="swiper-button-next mt-n5 me-n2 me-lg-n3 box-shadow-2 d-none"></div>
                        <div class="swiper-button-prev mt-n5 ms-n2 ms-lg-n3 box-shadow-2 d-none"></div>
                        <div class="swiper-pagination position-absolute bottom-0"></div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h6 class="text-fiord-700 fw-normal labelOpcionLN"></h6>
                    <a href="#" class="text-primary-veris text-decoration-underline text-link-lineaNegocio"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let lineaNegocio = "{{ $lineaNegocio }}";
    let codigoCliente = {{ Session::get('infoCliente')->informacionCliente->codigoCliente }};
    let logoNombre = 'logo-veris.svg';
    if (lineaNegocio === 'PMF') logoNombre = 'parami.png';
    const logoSrc = `${url_site}/assets/img/veris/${logoNombre}`;

    document.addEventListener('DOMContentLoaded', async () => {
        await cargarPlanes();
        if(lineaNegocio === 'PMF'){
            $('.nombreLineaNegocio').html('Para Mí');
            $('.text-link-lineaNegocio').html(`Ver “Veris”`).attr('href','CMV');
            $('.labelOpcionLN').html(`¿Deseas ver las opciones “Veris”?`);
        }else{
            $('.nombreLineaNegocio').html('Veris');
            $('.text-link-lineaNegocio').html(`Ver “Para Mi”`).attr('href','PMF');
            $('.labelOpcionLN').html(`¿Deseas ver las opciones “Para Mí”?`)
        }

        $(document).on('click', '.nav-link', async function(){
            console.log($(this).attr('id'))
            {{-- if(parseInt(detalleSuscripcion.empresa.codigoEmpresa) == 68){//&& lineaNegocio === 'CMV'
                if($(this).attr('id') == "pills-mensual-veris-tab" || $(this).attr('id') == "pills-mensual-parami-tab"){
                    $('#avisoFrecuenciaLabelencia').modal('show');
                }
            } --}}
            await cargarPlanes();
        })

        $('body').on('click', '.btn-continuar-registro', function() {
            let data = JSON.parse($(this).attr('data-rel'));
            let suscripcion = {};
            suscripcion.detallePlan = data;
            suscripcion.origen = "suscripcion";
            localStorage.setItem(`suscripcion-{{ $processId }}`, JSON.stringify(suscripcion));
            location.href = '/portal-fidelizacion/verificacion-plan/{{ $processId }}';
        });

    })

    async function cargarPlanes(){
        let tipo = $('.nav-link.active').attr('tipo-rel');
        const baseUrl = `${api_url}/empresarial/v1/suscripcion/planes/detalle_empresa`; 
        const queryParams = new URLSearchParams({
            estado: 'ACTIVO',
            frecuencia: tipo,
            contratado: false,
            lineaNegocio: lineaNegocio,
            codigoCliente: codigoCliente,
            codigoTipoContrato: 39
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: true,
        });

        console.log(response);
        if(response.code == 200){
            let elem = ``;
            for (const value of response.data) {
                const html = (lineaNegocio == "PMF") 
                    ? await drawCardParaMi(value) 
                    : await drawCardVeris(value);
                elem += html;
            }


            {{-- planesMensual --}}
            $(`#planes${tipo}`).html(elem)
            let mySwiper = document.querySelector('.my-swiper').swiper;
            mySwiper.update()
        }
    }

    async function drawCardVeris(detalle){
        const beneficios = detalle.beneficios || [];
        const beneficiosHTML = beneficios.map((beneficio, index) => {
            const claseIcono = index === 0 ? 'text-primary-veris' : 'text-blue-zodiac-950';
            const claseTexto = index === 0 ? 'text-primary-veris' : '';
            return `
                <li class="mb-2 d-flex align-items-start lh-sm">
                    <i class="bi bi-patch-check-fill ${claseIcono} me-2"></i>
                    ${beneficio.descripcion}
                </li>`;
        }).join('');
        return `<div class="swiper-slide">
            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                <img src="${logoSrc}" class="img-fluid mx-auto mb-3" alt="${lineaNegocio}" width="128">
                <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                    ${detalle.nombre}
                </h5>
                <div class="px-3 py-2">
                    <div class="mt-1">
                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA ${detalle.porcentajeDescuento}%</span>
                    </div>
                    <div class="my-1">
                        <h1 class="fw-bold text-blue-zodiac-950 m-0">$${detalle.valorFinal} <small class="fw-medium fs-4 text-capitalize">/${detalle.tipo.toLowerCase()}</small></h1>
                        <small class="text-muted text-decoration-line-through text-xs">PVP: $${detalle.precio}</small>
                    </div>
                </div>
                <hr class="my-1">
                <div class="p-3">
                    <h6 class="fw-bold">Beneficios</h6>
                    <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                        ${beneficiosHTML}
                    </ul>
                    <div class="text-center">
                        {{-- <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Continuar registro</a> --}}
                        <button type="button" data-rel='${JSON.stringify(detalle)}' class="btn btn-blue-veris rounded-3 py-2 w-100 btn-continuar-registro">Continuar registro</button>
                    </div>
                </div>
            </div>
        </div>`;
    }

    async function drawCardParaMi(detalle){
        console.log("PMF")
        const beneficios = detalle.beneficios || [];
        const beneficiosHTML = beneficios.map((beneficio, index) => {
            const claseIcono = index === 0 ? 'text-primary-veris' : 'text-blue-zodiac-950';
            const claseTexto = index === 0 ? 'text-primary-veris' : '';
            return `
                <li class="mb-2 d-flex align-items-start lh-sm">
                    <i class="bi bi-patch-check-fill ${claseIcono} me-2"></i>
                    ${beneficio.descripcion}
                </li>`;
        }).join('');
        return `<div class="swiper-slide">
            <div class="card card-transition border-aquamarine-blue-300 rounded-3 shadow-sm p-3 h-100">
                <img src="${logoSrc}" class="img-fluid mx-auto mb-3" alt="${lineaNegocio}" width="128">
                <h5 class="bg-vris-onahau-100 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                    ${detalle.nombre}
                </h5>
                <div class="px-3 py-2">
                    <div class="mt-1">
                        <span class="badge rounded-pill bg-robin-egg-blue-400 text-white fw-normal" style="font-size: 0.625rem;">AHORRA ${detalle.porcentajeDescuento}%</span>
                    </div>
                    <div class="my-1">
                        <h2 class="fw-bold text-blue-zodiac-950 m-0">$${detalle.valorFinal} <small class="fw-medium">/${detalle.tipo.toLowerCase()}</small></h2>
                        <small class="text-muted text-decoration-line-through text-xs">PVP: $${detalle.precio}</small>
                    </div>
                </div>
                <hr class="my-1">
                <div class="p-3">
                    <h6 class="fw-bold">Beneficios</h6>
                    <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                        ${beneficiosHTML}
                    </ul>
                    <div class="text-center">
                        {{-- <a href="#!" class="btn btn-robin-egg-blue-400 rounded-3 py-2 w-100">Continuar registro</a> --}}
                        <button type="button" data-rel='${JSON.stringify(detalle)}' class="btn btn-robin-egg-blue-400 rounded-3 py-2 w-100 btn-continuar-registro">Comprar</button>
                    </div>
                </div>
            </div>
        </div>`;
    }
</script>

@endsection