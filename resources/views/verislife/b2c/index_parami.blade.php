@extends('template.app-blank')

@section('title', 'ParaMi - B2C')
@section('body-class', '')

@section('layout-wrapper-class', 'flex-column')
@section('layout-container-class', 'flex-column')

@section('content')
<header class="navbar-floating navbar-sticky navbar-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('assets/img/veris/logo-parami-bn.svg') }}" alt="Veris" height="40" class="me-2">
            </a>

            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbar" aria-controls="mainNavbar"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
        </div>
    </nav>
</header>
<section class="hero d-flex flex-column justify-content-center align-items-center text-white text-start">
    <div class="container">
        <img src="{{ asset('assets/img/veris/titular-parami.svg') }}" alt="Sé parte de Para Mí Cuidado Familiar" class="img-fluid mb-4 img-label" style="opacity: 0.7" />
        <h4 class="text-fiord-700 fw-semibold">Programa de cuidado completo y fácil de contratar</h4>
    </div>
</section>

<section class="py-5">
    <div class="container" id="planes">
        <h2 class="fw-bold text-primary-veris text-center">Escoge la opción ideal para ti</h2>
        <div class="row justify-content-center px-xl-5">
            <ul class="nav nav-pills justify-content-center bg-white w-auto p-1 rounded-3" style="border: 4px solid #EAF0FD;" id="pills-tab" role="tablist">
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
                            <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 4 },"1280": { "slidesPerView": 4 }}'>
                                <div class="swiper-wrapper" id="planesMENSUAL">

                                    <div class="swiper-slide">
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
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                            <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                Opción 2
                                            </h5>
                                            <div class="px-3 py-2">
                                                <div class="mt-1">
                                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 32%</span>
                                                </div>
                                                <div class="my-1">
                                                    <h1 class="fw-bold text-blue-zodiac-950 m-0">$11,83 <small class="fw-medium fs-5">/mes</small></h1>
                                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $210</small>
                                                </div>
                                            </div>
                                            <hr class="my-1">
                                            <div class="p-3">
                                                <h6 class="fw-bold">Beneficios</h6>
                                                <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                        <span>6 consultas al año<br><small>2 consulta por bimestre</small></span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                        2 Profilaxis
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
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                            <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                Opción 3
                                            </h5>
                                            <div class="px-3 py-2">
                                                <div class="mt-1">
                                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 32%</span>
                                                </div>
                                                <div class="my-1">
                                                    <h1 class="fw-bold text-blue-zodiac-950 m-0">$15,95 <small class="fw-medium fs-5">/mes</small></h1>
                                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $280</small>
                                                </div>
                                            </div>
                                            <hr class="my-1">
                                            <div class="p-3">
                                                <h6 class="fw-bold">Beneficios</h6>
                                                <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                        <span>8 consultas al año<br><small>2 consulta por trimestre</small></span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                        3 Profilaxis
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
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                            <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                Opción 4
                                            </h5>
                                            <div class="px-3 py-2">
                                                <div class="mt-1">
                                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 40%</span>
                                                </div>
                                                <div class="my-1">
                                                    <h1 class="fw-bold text-blue-zodiac-950 m-0">$20,89 <small class="fw-medium fs-5">/mes</small></h1>
                                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $240</small>
                                                </div>
                                            </div>
                                            <hr class="my-1">
                                            <div class="p-3">
                                                <h6 class="fw-bold">Beneficios</h6>
                                                <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                        <span>12 consultas al año<br><small>1 consulta mensual</small></span>
                                                    </li>
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                        4 Profilaxis
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
                                    </div>

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
                        <h6 class="text-fiord-700 fw-normal text-center">*Los beneficios  del programa se extiende a familiares de hasta tercer grado de consanguinidad y primer grado de afinidad.</h6>
                        <p class="fw-medium mt-3 mb-2">¿Tienes dudas?</p>
                        <a href="#dudas" class="btn btn-outline-blue-veris">Clic aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background: #0071CF;">
    <div class="container">
        <h2 class="text-center text-white mb-4">Todas las opciones incluyen</h2>
        <div class="row g-3 gap-4 gap-xl-0 mt-4 justify-content-between">
            <div class="col-12 d-flex align-items-end justify-content-center mb-3">
                <h5 class="fw-medium ps-3 fs-18 mb-0 me-3 text-white">Descuentos en</h5>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/logo-veris-bn.svg" class="me-4" alt="parami">
            </div>
        </div>
        <div class="row g-3 gap-4 gap-xl-0 mt-4 justify-content-between">

            <div class="col-12 col-md-5">
                <div class="card rounded-4 shadow-sm text-center h-100" style="background: #25B0F3">
                    <div class="badge bg-white text-congress-blue-900 fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                        Hasta 10% en:
                    </div>
                    <div class="card-body row justify-content-around align-items-center flex-wrap g-0 pt-4">
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-flask fs-2 text-white mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Laboratorio clínico</p>
                        </div>
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-x-ray fs-2 text-white mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Imágenes</p>
                        </div>
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-crutch fs-2 text-white mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Terapias</p>
                        </div>
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-file-prescription fs-2 text-white mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Procedimientos</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card rounded-4 shadow-sm text-center h-100" style="background: #25B0F3">
                    <div class="badge bg-white text-congress-blue-900 fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                        Hasta 15% en:
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center pt-4">
                        <i class="fa-solid fa-stethoscope fs-2 text-white mt-3 mb-2"></i>
                        <p class="fs-12p fw-normal text-white mb-0 lh-1">Consultas adicionales</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card rounded-4 shadow-sm text-center h-100" style="background: #25B0F3">
                    <div class="badge bg-white text-congress-blue-900 fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                        Hasta 5% en:
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center pt-4">
                        <i class="fa-solid fa-pills fs-2 text-white mt-3 mb-2"></i>
                        <p class="fs-12p fw-normal text-white mb-0 lh-1">Farmacia</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 gap-4 gap-xl-0 mt-4 justify-content-between">
            <div class="col-12 d-flex align-items-center justify-content-center mb-3">
                <h5 class="fw-medium ps-3 fs-18 mb-0 me-3 text-white">Descuentos en</h5>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/logo-parami-bn.svg" class="me-4" alt="parami">
            </div>
        </div>
        <div class="row g-3 gap-4 gap-xl-0 mt-4 justify-content-between">

            <div class="col-12 col-md-5">
                <div class="card rounded-4 shadow-sm text-center h-100" style="background: #25B0F3">
                    <div class="badge bg-white text-congress-blue-900 fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                        Hasta 20% en:
                    </div>
                    <div class="card-body row justify-content-around align-items-center flex-wrap g-0 pt-4">
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-flask fs-2 text-white mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Laboratorio clínico</p>
                        </div>
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-x-ray fs-2 text-white mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Imágenes</p>
                        </div>
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-crutch fs-2 text-white mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Terapias</p>
                        </div>
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-file-prescription fs-2 text-white mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Procedimientos</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card rounded-4 shadow-sm text-center h-100" style="background: #25B0F3">
                    <div class="badge bg-white text-congress-blue-900 fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                        Hasta 20% en:
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center pt-4">
                        <i class="fa-solid fa-stethoscope fs-2 text-white mt-3 mb-2"></i>
                        <p class="fs-12p fw-normal text-white mb-0 lh-1">Consultas adicionales</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card rounded-4 shadow-sm text-center h-100" style="background: #25B0F3">
                    <div class="badge bg-white text-congress-blue-900 fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                        Hasta 5% en:
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center pt-4">
                        <i class="fa-solid fa-pills fs-2 text-white mt-3 mb-2"></i>
                        <p class="fs-12p fw-normal text-white mb-0 lh-1">Farmacia</p>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="bg-menu-theme-veris-life py-5">
    <h2 class="text-center text-white mb-4">Servicios adicionales</h2>
    <div class="row mx-0 px-0 justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
            <div class="card border-perano rounded-4 text-center">
                <div class="card-body text-blue-zodiac-950">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-blue-zodiac-950">Veris Urgencias</strong><br>
                            <small>Hasta 15% de descuento (Gye)</small>
                        </div>
                        <div class="col-md-6 border-start">
                            <strong class="text-blue-zodiac-950">Asesoría Médica</strong><br>
                            <small>Asesoría médica ilimitada a través del contact center</small>
                        </div>
                    </div>
                    <div class="mt-2 text-zodiac-blue small fw-medium">
                        **NO APLICA PARA VACUNAS NI VITAMINA C**
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-wild-sand-50 py-5">
    <div class="container">
        <h2 class="text-center text-primary-veris mb-4">Así funcionan nuestras opciones</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card border-perano-300 rounded-4 shadow-none h-100">
                    <div class="card-body">
                        <h5 class="card-title">Esto es:</h5>
                        <hr>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex mb-2"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Es un programa de fidelización.</li>
                            <li class="d-flex mb-2"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Puedes hacerte atender tanto en los centros Veris y Para Mí.</li>
                            <li class="d-flex"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Puedes hacer uso del producto de manera inmediata.</li>
                            <li class="d-flex"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Puedes atender tus enfermedades que ya tienes (preexistentes).</li>
                            <li class="d-flex"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Atención médica oportuna y sin complicaciones.</li>
                            <li class="d-flex"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Beneficios inmediatos desde el primer día de contratación</li>
                            <li class="d-flex"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Acceso a todo el ecosistema Veris.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card border-perano-300 rounded-4 shadow-none h-100">
                    <div class="card-body">
                        <h5 class="card-title">Esto no es:</h5>
                        <hr>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex mb-2"><i class="bi bi-x-circle-fill text-grenadier-600 me-2"></i>No es un seguro médico.</li>
                            <li class="d-flex mb-2"><i class="bi bi-x-circle-fill text-grenadier-600 me-2"></i>No aplica para vacunas ni vitamina C.</li>
                            <li class="d-flex mb-2"><i class="bi bi-x-circle-fill text-grenadier-600 me-2"></i>No requiere trámites de autorización o deducibles.</li>
                            <li class="d-flex mb-2"><i class="bi bi-x-circle-fill text-grenadier-600 me-2"></i>No cubre emergencias hospitalarias.</li>
                            <li class="d-flex mb-2"><i class="bi bi-x-circle-fill text-grenadier-600 me-2"></i>No está limitado a una especialidad médica.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="#planes" class="btn btn-blue-veris mt-3">Quiero unirme a Para Mí Cuidado Familiar</a>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-5" id="dudas">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <h2 class="text-center text-primary-veris mb-2">¿Tienes dudas sobre nuestro programa?</h2>
                <p class="ext-center text-fiord-700 fw-semibold mb-5">Esto cubrimos / no cubrimos</p>
        
                <div class="accordion accordion-flush accordion-question" id="faqAccordion">
        
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="heading-0">
                            <button class="accordion-button text-vris-mine-shaft-950 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-0"
                                aria-expanded="false" aria-controls="collapse-0">
                                ¿Desde cuándo puedo empezar a usar los servicios de Para Mí Cuidado Familiar?
                            </button>
                        </h2>
                        <div id="collapse-0" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body fw-medium">
                                Desde el primer día de activación de Para Mí Cuidado Familiar.
                            </div>
                        </div>
                    </div>
        
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="heading-1">
                            <button class="accordion-button text-vris-mine-shaft-950 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-1"
                                aria-expanded="false" aria-controls="collapse-1">
                                ¿Cuáles son las características del programa?
                            </button>
                        </h2>
                        <div id="collapse-1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body fw-medium">
                                1. Acceso inmediato a servicios de salud ambulatoria
                                <ul>
                                    <li>Consultas médicas generales y especializadas.</li>
                                    <li>Exámenes de laboratorio, imagenología y procedimientos diagnósticos.</li>
                                    <li>Atención prioritaria sin tiempos de espera extensos.</li>
                                </ul>
                                2. Cobertura familiar ampliada
                                <ul>
                                    <li>Permite incluir familiares hasta 3° grado de consanguinidad y 1° de afinidad.</li>
                                    <li>Sin límite en el número de beneficiarios incluidos por colaborador.</li>
                                </ul>
                                3. Sin restricciones ni barreras de acceso
                                <ul>
                                    <li>No aplica carencias ni exclusión por preexistencias.</li>
                                    <li>Acceso voluntario, sin trámites engorrosos ni deducibles.</li>
                                    <li>No es un seguro ni medicina prepagada.</li>
                                </ul>
                                4. Red médica nacional
                                <ul>
                                    <li>Más de 14 centrales médicas Veris, 5 centros “Para Mi”, 1 centro de urgencias y 8 sedes de laboratorio.</li>
                                    <li>Telemedicina a través de Central Médica Virtual con más de 21 especialidades y 500 médicos conectados.</li>
                                    <li>Servicios a domicilio en Quito y Guayaquil (laboratorio y farmacia).</li>
                                </ul>
                                5. Beneficios corporativos
                                <ul>
                                    <li>Descuentos importantes en todos los servicios del ecosistema Veris.</li>
                                    <li>Programas adaptables al tamaño y necesidades de cada empresa.</li>
                                    <li>Mejora de la productividad y reducción del ausentismo laboral.</li>
                                </ul>
                                6. Tecnología y atención continua
                                <ul>
                                    <li>Agendamiento 24/7, resultados en línea, recetas electrónicas y recordatorios médicos.</li>
                                    <li>Atención los 365 días del año de 07h00 a 21h00.</li>
                                    <li>Plataforma digital con historia clínica en red y seguimiento personalizado.</li>
                                </ul>
                                7. Compromiso ambiental y social
                                <ul>
                                    <li>Empresa con Huella de Carbono, comprometida con la sostenibilidad.</li>
                                    <li>Digitalización de procesos y reducción del uso de papel.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
        
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="heading-2">
                            <button class="accordion-button text-vris-mine-shaft-950 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-2"
                                aria-expanded="false" aria-controls="collapse-2">
                                ¿A quiénes puedo incluir en el programa?
                            </button>
                        </h2>
                        <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body fw-medium">
                                <ul>
                                    <li>El colaborador de la empresa o persona individual que accede al programa.</li>
                                    <li>Familiares hasta 3er grado de consanguinidad, como por ejemplo: Padres, Hijos, Hermanos, Abuelos, Nietos, Tíos, Sobrinos</li>
                                    <li>Familiares hasta 1er grado de afinidad, como: Cónyuge o pareja, Suegros, Yerno o nuera.</li>
                                </ul>
                                Importante:
                                <ul>
                                    <li>No existe un límite en el número de familiares que el colaborador puede incluir dentro del programa.</li>
                                    <li>El acceso es voluntario y puede adaptarse a las necesidades individuales de cada familia.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
        
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="heading-3">
                            <button class="accordion-button text-vris-mine-shaft-950 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-3"
                                aria-expanded="false" aria-controls="collapse-3">
                                ¿Qué es tercer grado de consanguinidad y primer grado de afinidad?
                            </button>
                        </h2>
                        <div id="collapse-3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body fw-medium">
                                Familiares hasta 3er grado de consanguinidad, como por ejemplo: Padres Hijos Hermanos Abuelos Nietos Tíos Sobrinos.
                                <br>
                                Familiares hasta 1er grado de afinidad, como: Cónyuge o pareja Suegros Yerno o nuera
                            </div>
                        </div>
                    </div>
        
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="heading-4">
                            <button class="accordion-button text-vris-mine-shaft-950 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-4"
                                aria-expanded="false" aria-controls="collapse-4">
                                ¿El precio del programa aplica para todos?
                            </button>
                        </h2>
                        <div id="collapse-4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body fw-medium">
                                Sí. La tarifa del programa Para Mí Cuidado Familiar no es por persona, sino por grupo, y aplica para todos los beneficiarios que el colaborador desee incluir, sin límite en el número de personas.
                                <br>
                                Esto significa que con una sola tarifa fija anual, el colaborador puede incluir a todos los familiares que cumplan con los criterios (hasta 3er grado de consanguinidad y 1er grado de afinidad).
                                <br>
                                Por ello, es importante elegir la opción del programa que mejor se ajuste a las necesidades del colaborador o de la empresa, considerando la amplitud de cobertura que se desea brindar.
                            </div>
                        </div>
                    </div>
        
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="heading-5">
                            <button class="accordion-button text-vris-mine-shaft-950 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-5"
                                aria-expanded="false" aria-controls="collapse-5">
                                ¿Necesito tener seguro médico para acceder a Para Mí Cuidado Familiar?
                            </button>
                        </h2>
                        <div id="collapse-5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body fw-medium">
                                No. No necesitas tener un seguro médico para acceder a Para Mí Cuidado Familiar. El programa está diseñado para ser una alternativa independiente, ideal para personas o empresas que no cuentan con cobertura de seguro.
                                <br>
                                Sin embargo, si ya tienes un seguro médico, puedes complementar tu cobertura con Para Mí Cuidado Familiar, accediendo a servicios ambulatorios inmediatos, descuentos en toda la red Veris y atención prioritaria, sin trámites ni deducibles.
                                <br>
                                Para Mí Cuidado Familiar es una solución flexible que se adapta tanto a quienes no tienen seguro, como a quienes desean mejorar su acceso a salud preventiva y continua.
                            </div>
                        </div>
                    </div>
        
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="heading-6">
                            <button class="accordion-button text-vris-mine-shaft-950 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-6"
                                aria-expanded="false" aria-controls="collapse-6">
                                ¿Qué servicios incluye Para Mí Cuidado Familiar?
                            </button>
                        </h2>
                        <div id="collapse-6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body fw-medium">
                                Para Mí Cuidado Familiar incluye una amplia gama de servicios de salud ambulatoria dentro del ecosistema Veris y Centros Para Mi, diseñados para garantizar una atención integral, oportuna y accesible. Entre los principales servicios se encuentran:
                                <br>
                                Atención médica:
                                <ul>
                                    <li>Consultas médicas generales y especializadas.</li>
                                    <li>Telemedicina en más de 21 especialidades a través de la Central Médica Virtual.</li>
                                </ul>
                                Servicios diagnósticos:
                                <ul>
                                    <li>Exámenes de laboratorio clínico.</li>
                                    <li>Estudios de imagenología (rayos X, ecografías, entre otros).</li>
                                    <li>Procedimientos como MAPA, Holter, electrocardiogramas, endoscopias, colonoscopias, etc.</li>
                                </ul>
                                Servicios complementarios:
                                <ul>
                                    {{-- <li>Odontología</li>
                                    <li>Optometría.</li> --}}
                                    <li>Terapias físicas y respiratorias.</li>
                                </ul>
                                Beneficios adicionales:
                                <ul>
                                    <li>Descuentos importantes en todos los servicios del ecosistema Veris.</li>
                                    <li>Atención prioritaria sin tiempos de espera extensos.</li>
                                    <li>Servicios de laboratorio, procedimientos y farmacia a domicilio en Quito y Guayaquil.</li>
                                    <li>Resultados de exámenes y recetas médicas en línea.</li>
                                    <li>Agendamiento 24/7 y pagos multicanal.</li>
                                    <li>Historia clínica en red disponible desde cualquier punto de atención.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
        
                    <div class="accordion-item border-bottom">
                        <h2 class="accordion-header" id="heading-7">
                            <button class="accordion-button text-vris-mine-shaft-950 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse-7"
                                aria-expanded="false" aria-controls="collapse-7">
                                ¿Dónde puedo usar Para Mí Cuidado Familiar?
                            </button>
                        </h2>
                        <div id="collapse-7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body fw-medium">
                                Puedes usar Veris Care en todos los centros Veris y Para Mí en las ciudades de Guayaquil, Quito y Cuenca. 
                                <br>
                                Centros Veris <a target="_blank" href="https://www.veris.com.ec/ubicaciones">https://www.veris.com.ec/ubicaciones</a>
                                <br>
                                Centros Veris <a target="_blank" href="https://www.parami.com.ec/nosotros">https://www.parami.com.ec/nosotros</a>
                            </div>
                        </div>
                    </div>
        
                </div>
        
                <div class="text-center mt-4">
                    <a href="#" class="btn btn-blue-veris">Ver más preguntas</a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('verislife.widget-whatsapp')
<script>
    let detalleSuscripcionTmp = {
        "empresa": {
            "codigoEmpresa": "68",
            "nombreEmpresa": "VERIS S.A."
        },
        "tipoFlujo": "I"
    }
    let lineaNegocioPage = "PMF"
    detalleSuscripcionTmp.lineaNegocio = lineaNegocioPage;
    localStorage.setItem(`suscripcion`, JSON.stringify(detalleSuscripcionTmp));
</script>
@include("verislife.b2c.funcionalidadB2C")
<style>
    .hero{
        position: relative;
        background: linear-gradient(
                0deg,
                rgba(251, 251, 251, 0.90) 0%,
                rgba(248, 251, 255, 1) 0%,
                rgba(255, 255, 255, 0) 90%
            ),
            url("/assets/img/veris/fondo-parami-b2c.jpg") no-repeat top right;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top left;
        min-height: 100vh;
        padding-top: 6rem; /* margen para que no tape el navbar */
        z-index: 1;
        overflow: hidden;
    }
    .nav-pills li.nav-item .nav-link.active {
        background: #25CAD2 !important;
    }
    @media only screen and (max-width: 600px) {
        .hero{
            position: relative;
            background: linear-gradient(
                    0deg,
                    rgba(251, 251, 251, 0.90) 0%,
                    rgba(248, 251, 255, 1) 0%,
                    rgba(255, 255, 255, 0) 90%
                ),
                url("/assets/img/veris/fondo-parami-b2c.jpg") no-repeat top right;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top left;
            min-height: 100vh;
            padding-top: 6rem; /* margen para que no tape el navbar */
            z-index: 1;
            overflow: hidden;
            background-position-x: 50%;
        }
        .img-label{
            margin-top: 180px;
        }
    }
</style>
@endsection