@extends('template.verisLife.app-template')
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
    <div class="bg-white p-3 mb-4 d-none">
        <h5 class="mb-0 mt-2">Home</h5>
    </div>

    <section class="bg-cornflower-blue-400 mb-4 px-3 py-4 d-none">
        <div class="d-none justify-content-between align-items-center mb-4">
            <h5 class="fw-medium border-start-blue text-white ps-3 fs-18 mb-0">Planes contratados</h5>
            <a href="#!" class="fw-medium text-white me-1">Ver todos</a>
        </div>
        <div class="row g-3">
            <div class="col-12 col-lg-3">
                <div class="card rounded-4 shadow-sm h-100">
                    <div class="card-body px-0 pt-3 pb-0">
                        <div class="text-center d-flex justify-content-between align-items-end border-start-blue mx-3 mb-3">
                            <div class="text-start ms-3">
                                <h6 class="text-bay-many-900 small mb-0">Opción 1</h6>
                                <h2 class="fw-bold text-blue-zodiac-950 mb-0">100</h2>
                            </div>
                            <div class="text-end ">
                                <i class="fa-solid fa-users fs-1 text-primary-veris"></i>
                            </div>
                        </div>
                        <a href="#" class="btn text-primary-veris bg-zumthor-50 fs-12p rounded-bottom-4 w-100">
                            Ver colaboradores
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-message text-center">
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/login-amico1.svg" />
                <h4 class="text-white">Pronto podrás visualizar tu información aquí</h4>
            </div>
        </div>
    </section>
    <section class="bg-pattens-blue-100 mb-4 px-3 py-4" id="section-pendientes-registro">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Opciones pendientes de registro</h5>
            <a href="#!" class="fw-medium me-1">Ver todos</a>
        </div>
        <div class="row g-3">
            <div class="slider-promotions position-relative">
                <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 4 }}'>
                    <div class="swiper-wrapper" id="suscripcionPendientes">

                        <!-- <div class="swiper-slide">
                            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                    Opción 1
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
                                        <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
                <div class="swiper-button-next mt-n5 me-n2 me-lg-n3 box-shadow-2 d-none"></div>
                <div class="swiper-button-prev mt-n5 ms-n2 ms-lg-n3 box-shadow-2 d-none"></div>
                <div class="swiper-pagination position-absolute bottom-0"></div>
            </div>
            <div class="content-message text-center d-none" id="empty-space-pendientes-registro">
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/carrito.svg" />
                <h4 class="text-primary-veris">No tienes pendientes de registro</h4>
            </div>
        </div>
    </section>
    <section class="bg-pattens-blue-100 mb-4 px-3 py-4" id="section-contratadas">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Opciones contratadas</h5>
            <a href="#!" class="fw-medium me-1">Ver todos</a>
        </div>
        <div class="row g-3">
            <div class="slider-promotions position-relative">
                <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 3 }}'>
                    <div class="swiper-wrapper" id="suscripcionContratadas">

                        <!-- <div class="swiper-slide">
                            <div class="card border-perano-300 rounded-4 shadow-none h-100">
                                <div class="card-body p-0 pt-3">
                                    <div class="d-flex justify-content-between mx-3 mb-3">
                                        <div class="option-info">
                                            <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRASTE 36%</span>
                                            <h5 class="option-title fw-medium mb-0">Opción 1</h5>
                                        </div>
                                        <div class="price-block text-start">
                                            <h5 class="fw-semibold mb-0">$90,00 <small class="fw-normal fs-6">/anual</small></h5>
                                            <p class="text-fiord-700 text-decoration-line-through fs-12p mb-0">PVP $140</p>
                                        </div>
                                    </div>
                                    <a href="#" class="btn text-primary-veris fs-12p border-top rounded-0 w-100">
                                        Ver detalle
                                    </a>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
                <div class="swiper-button-next mt-n5 me-n2 me-lg-n3 box-shadow-2 d-none"></div>
                <div class="swiper-button-prev mt-n5 ms-n2 ms-lg-n3 box-shadow-2 d-none"></div>
                <div class="swiper-pagination position-absolute bottom-0"></div>
            </div>

            <div class="content-message text-center d-none" id="empty-space-no-contratado">
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/carrito.svg" />
                <h4 class="text-primary-veris">No tienes opciones contratados</h4>
            </div>
        </div>
    </section>


    <!-- COLABORADOR 2 B2B2C-->
    <section class="bg-sail-gradient mb-4 px-3 py-4 d-none">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Elije la opción <b class="text-primary-veris">Veris</b> de tu preferencia</h5>
            <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/logo-veris.svg" class="me-5" alt="veris">
        </div>
        <div class="row justify-content-center">
            <ul class="nav nav-pills justify-content-center bg-white w-auto p-1 rounded-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 px-lg-5 active" id="pills-anual-veris-tab" data-bs-toggle="pill" data-bs-target="#pills-anual-veris" type="button" role="tab" aria-controls="pills-anual-veris" aria-selected="true">Anual</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 px-lg-5" id="pills-mensual-veris-tab" data-bs-toggle="pill" data-bs-target="#pills-mensual-veris" type="button" role="tab" aria-controls="pills-mensual-veris" aria-selected="false">Mensual</button>
                </li>
            </ul>
            <div class="tab-content bg-transparent" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-anual-veris" role="tabpanel" aria-labelledby="pills-anual-veris-tab" tabindex="0">
                    <div class="row g-3">
                        <div class="slider-promotions position-relative">
                            <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 4 }}'>
                                <div class="swiper-wrapper" id="planesVerisAnual">

                                    <div class="swiper-slide">
                                        <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                            <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                Opción 1
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 39%</span>
                                                </div>
                                                <div class="my-1">
                                                    <h1 class="fw-bold text-blue-zodiac-950 m-0">$129 <small class="fw-medium fs-5">/anual</small></h1>
                                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $210</small>
                                                </div>
                                            </div>
                                            <hr class="my-1">
                                            <div class="p-3">
                                                <h6 class="fw-bold">Beneficios</h6>
                                                <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                        <span>6 consultas al año<br><small>Uso inmediato</small></span>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 39%</span>
                                                </div>
                                                <div class="my-1">
                                                    <h1 class="fw-bold text-blue-zodiac-950 m-0">$172 <small class="fw-medium fs-5">/anual</small></h1>
                                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $180</small>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 36%</span>
                                                </div>
                                                <div class="my-1">
                                                    <h1 class="fw-bold text-blue-zodiac-950 m-0">$228 <small class="fw-medium fs-5">/anual</small></h1>
                                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $240</small>
                                                </div>
                                            </div>
                                            <hr class="my-1">
                                            <div class="p-3">
                                                <h6 class="fw-bold">Beneficios</h6>
                                                <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                        <span>12 consultas al año<br><small>Uso inmediato</small></span>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                <div class="tab-pane fade" id="pills-mensual-veris" role="tabpanel" aria-labelledby="pills-mensual-veris-tab" tabindex="0">
                    <div class="row g-3">
                        <div class="slider-promotions position-relative">
                            <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 4 }}'>
                                <div class="swiper-wrapper" id="planesVerisMensual">

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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
            </div>
        </div>
    </section>
    <section class="bg-madang-gradient mb-4 px-3 py-4 d-none">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Elije la opción <b class="text-chateau-green-600">Club Para mí</b> de tu preferencia</h5>
            <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/parami.png" class="me-5" alt="parami">
        </div>
        <div class="row justify-content-center">
            <ul class="nav nav-pills justify-content-center bg-white w-auto p-1 rounded-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 px-lg-5 active" id="pills-anual-parami-tab" data-bs-toggle="pill" data-bs-target="#pills-anual-parami" type="button" role="tab" aria-controls="pills-anual-parami" aria-selected="true">Anual</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 px-lg-5" id="pills-mensual-parami-tab" data-bs-toggle="pill" data-bs-target="#pills-mensual-parami" type="button" role="tab" aria-controls="pills-mensual-parami" aria-selected="false">Mensual</button>
                </li>
            </ul>
            <div class="tab-content bg-transparent" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-anual-parami" role="tabpanel" aria-labelledby="pills-anual-parami-tab" tabindex="0">
                    <div class="row g-3">
                        <div class="slider-promotions position-relative">
                            <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 4 }}'>
                                <div class="swiper-wrapper" id="planesAnualParami">

                                    <div class="swiper-slide">
                                        <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                            <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                Opción 1
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 39%</span>
                                                </div>
                                                <div class="my-1">
                                                    <h1 class="fw-bold text-blue-zodiac-950 m-0">$129 <small class="fw-medium fs-5">/anual</small></h1>
                                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $210</small>
                                                </div>
                                            </div>
                                            <hr class="my-1">
                                            <div class="p-3">
                                                <h6 class="fw-bold">Beneficios</h6>
                                                <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                        <span>6 consultas al año<br><small>Uso inmediato</small></span>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 39%</span>
                                                </div>
                                                <div class="my-1">
                                                    <h1 class="fw-bold text-blue-zodiac-950 m-0">$172 <small class="fw-medium fs-5">/anual</small></h1>
                                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $180</small>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 36%</span>
                                                </div>
                                                <div class="my-1">
                                                    <h1 class="fw-bold text-blue-zodiac-950 m-0">$228 <small class="fw-medium fs-5">/anual</small></h1>
                                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $240</small>
                                                </div>
                                            </div>
                                            <hr class="my-1">
                                            <div class="p-3">
                                                <h6 class="fw-bold">Beneficios</h6>
                                                <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                        <span>12 consultas al año<br><small>Uso inmediato</small></span>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                <div class="tab-pane fade" id="pills-mensual-parami" role="tabpanel" aria-labelledby="pills-mensual-parami-tab" tabindex="0">
                    <div class="row g-3">
                        <div class="slider-promotions position-relative">
                            <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 4 }}'>
                                <div class="swiper-wrapper" id="planesMensualParami">

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
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                        Consulta Optométrica<br>y Odontológica
                                                    </li>
                                                </ul>
                                                <div class="text-center">
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                        Consulta Optométrica<br>y Odontológica
                                                    </li>
                                                </ul>
                                                <div class="text-center">
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
                                                    <li class="mb-2 d-flex align-items-start lh-sm">
                                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                        Consulta Optométrica<br>y Odontológica
                                                    </li>
                                                </ul>
                                                <div class="text-center">
                                                    <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Comprar</a>
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
            </div>
        </div>
    </section>
    <section class="bg-wild-sand-50 mb-4 px-3 py-4 d-none">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Historial de uso</h5>
            <a href="#!" class="fw-medium me-1">Ver todos</a>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
    let codigoCliente = 13315;
    document.addEventListener('DOMContentLoaded', async () => {
        const planes = await obtenerPlanesSuscripcionDetalleEmpresa();
        const planesContratados = planes.filter(plan => plan.contratado);
        const planesPendientes = planes.filter(plan => !plan.contratado);

        renderizarPlanes(planesContratados, 'suscripcionContratadas', 'empty-space-no-contratado', true);
        renderizarPlanes(planesPendientes, 'suscripcionPendientes', 'empty-space-pendientes-registro', false);

        $('body').on('click', '.btn-continuar-registro', function() {
            let data = JSON.parse($(this).attr('data-rel'));
            let suscripcion = {};
            suscripcion.detallePlan = data;
            localStorage.setItem(`suscripcion-{{ $processId }}`, JSON.stringify(suscripcion));
            location.href = '/portal-fidelizacion/verificacion-plan/{{ $processId }}';
        });
    });

    async function obtenerPlanesSuscripcionDetalleEmpresa() {
        if (!api_url || !_application || !_idOrganizacion || !_token) {
            console.error('Faltan variables globales: api_url, _application, _idOrganizacion o _token.');
            return null;
        }

        const baseUrl = `${api_url}/empresarial/v1/suscripcion/planes/detalle_empresa`; 
        const queryParams = new URLSearchParams({
            estado: 'ACTIVO',
            frecuencia: 'ANUAL',
            lineaNegocio: 'CMV',
            codigoCliente: codigoCliente
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

        planes.forEach(plan => {

            const beneficios = plan.beneficios || [];
            const beneficiosHTML = beneficios.map((beneficio, index) => {
                const claseIcono = index === 0 ? 'text-primary-veris' : 'text-blue-zodiac-950';
                const claseTexto = index === 0 ? 'text-primary-veris' : '';
                return `
                    <li class="mb-2 d-flex align-items-start lh-sm">
                        <i class="bi bi-patch-check-fill ${claseIcono} me-2"></i>
                        ${beneficio.descripcion}${beneficio.cantidadGratuita ? ` (${beneficio.cantidadGratuita})` : ''}
                    </li>`;
            }).join('');

            const slide = document.createElement('div');
            slide.className = 'swiper-slide';
            slide.innerHTML = esContratado ?
                `
                <div class="card border-perano-300 rounded-4 shadow-none h-100">
                    <div class="card-body p-0 pt-3">
                        <div class="d-flex justify-content-between mx-3 mb-3">
                            <div class="option-info">
                                <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRASTE ${plan.porcentajeDescuento}%</span>
                                <h5 class="option-title fw-medium mb-0">${plan.nombre}</h5>
                            </div>
                            <div class="price-block text-start">
                                <h5 class="fw-semibold mb-0">$${plan.valorFinal.toFixed(2)} <small class="fw-normal fs-6">/anual</small></h5>
                                <p class="text-fiord-700 text-decoration-line-through fs-12p mb-0">PVP $${plan.precio.toFixed(2)}</p>
                            </div>
                        </div>
                        <button type="button" data-rel='${JSON.stringify(plan)}' class="btn text-primary-veris fs-12p border-top rounded-0 w-100">Ver detalle</button>
                    </div>
                </div>` :
                `
                <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                    <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                        ${plan.nombre}
                    </h5>
                    <div class="px-3 py-2">
                        <div class="mt-1">
                            <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA ${plan.porcentajeDescuento}%</span>
                        </div>
                        <div class="my-1">
                            <h1 class="fw-bold text-blue-zodiac-950 m-0">$${plan.valorFinal.toFixed(2)} <small class="fw-medium fs-5">/anual</small></h1>
                            <small class="text-muted text-decoration-line-through text-xs">PVP: $${plan.precio.toFixed(2)}</small>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="p-3">
                        <h6 class="fw-bold">Beneficios</h6>
                        <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                            ${beneficiosHTML}
                        </ul>
                        <div class="text-center">
                            <button type="button" data-rel='${JSON.stringify(plan)}' class="btn btn-lg btn-blue-veris w-100 btn-continuar-registro">Continuar registro</button>
                        </div>
                    </div>
                </div>
                `;
            container.appendChild(slide);
        });
    }
    
</script>
@endpush