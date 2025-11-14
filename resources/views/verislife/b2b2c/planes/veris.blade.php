@extends('template.app-blank')
@section('title')
Veris Care - Elegir plan médico
@endsection

@section('body-class', 'bg-sail-gradient')

@section('content')
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
        <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Elije la opción <b class="text-primary-veris">Veris</b> de tu preferencia</h5>
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
            <div class="row g-3 gap-4 gap-xl-0 mt-4 justify-content-between">
                <div class="col-12 col-md-3">
                    <div class="card border-blue-ribbon-600 rounded-4 shadow-sm text-center h-100">
                        <div class="badge bg-blue-ribbon-600 text-white fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                            -20% en:
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center align-items-center pt-4">
                            <i class="fa-solid fa-stethoscope fs-2 text-blue-zodiac-950 mt-3 mb-2"></i>
                            <p class="fs-12p fw-normal text-blue-zodiac-950 mb-0 lh-1">Consultas adicionales</p>
                        </div>
                    </div>
                </div>
        
                <div class="col-12 col-md-5">
                    <div class="card border-blue-ribbon-600 rounded-4 shadow-sm text-center h-100">
                        <div class="badge bg-blue-ribbon-600 text-white fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                            -15% en:
                        </div>
                        <div class="card-body row justify-content-around align-items-center flex-wrap g-0 pt-4">
                            <div class="col-6 col-xl-3 text-center">
                                <i class="fa-solid fa-flask fs-2 text-blue-zodiac-950 mt-3 mb-2"></i>
                                <p class="fs-12p text-blue-zodiac-950 mb-0 lh-1">Laboratorio clínico</p>
                            </div>
                            <div class="col-6 col-xl-3 text-center">
                                <i class="fa-solid fa-x-ray fs-2 text-blue-zodiac-950 mt-3 mb-2"></i>
                                <p class="fs-12p text-blue-zodiac-950 mb-0 lh-1">Imágenes</p>
                            </div>
                            <div class="col-6 col-xl-3 text-center">
                                <i class="fa-solid fa-crutch fs-2 text-blue-zodiac-950 mt-3 mb-2"></i>
                                <p class="fs-12p text-blue-zodiac-950 mb-0 lh-1">Terapias</p>
                            </div>
                            <div class="col-6 col-xl-3 text-center">
                                <i class="fa-solid fa-file-prescription fs-2 text-blue-zodiac-950 mt-3 mb-2"></i>
                                <p class="fs-12p text-blue-zodiac-950 mb-0 lh-1">Procedimientos</p>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-12 col-md-3">
                    <div class="card border-blue-ribbon-600 rounded-4 shadow-sm text-center h-100">
                        <div class="badge bg-blue-ribbon-600 text-white fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                            -5% en:
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center align-items-center pt-4">
                            <i class="fa-solid fa-pills fs-2 text-blue-zodiac-950 mt-3 mb-2"></i>
                            <p class="fs-12p fw-normal text-blue-zodiac-950 mb-0 lh-1">Farmacia</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h6 class="text-fiord-700 fw-normal">¿Deseas ver las opciones “Para Mí”?</h6>
                    <a href="/plan-medico-parami" class="text-primary-veris text-decoration-underline">Ver “Para Mi”</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let lineaNegocioPage = "CMV"
</script>
@include("verislife.b2b2c.planes.funcionalidad")
@endsection