@extends('template.app-blank')

@section('title', 'VerisLife - B2C')
@section('body-class', '')

@section('layout-wrapper-class', 'flex-column')
@section('layout-container-class', 'flex-column')

@section('content')
<header class="navbar-floating navbar-sticky navbar-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('assets/img/veris/logo-veris.svg') }}" alt="Veris" height="40" class="me-2">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbar" aria-controls="mainNavbar"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>
<section class="hero d-flex flex-column justify-content-center align-items-center text-white text-start">
    <div class="container">
        <img src="{{ asset('assets/img/veris/titular.svg') }}" alt="Sé parte de Veris Care" class="img-fluid mb-4" />
        <h4 class="text-fiord-700 fw-semibold">Programa de cuidado completo y fácil de contratar</h4>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="fw-medium text-primary-veris text-center">Escoge la opción ideal para ti</h2>
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
                        <h6 class="text-fiord-700 fw-normal">*Los beneficios del programa se extiende a familiares de hasta tercer grado de consanguinidad</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-mariner-2-500 py-5">
    <div class="container">
        <h2 class="text-center text-white mb-4">Todas las opciones incluyen</h2>
        <div class="row g-3 gap-4 gap-xl-0 mt-4 justify-content-between">
            <div class="col-12 col-md-3">
                <div class="card bg-vris-astronaut-900 border-blue-ribbon-600 rounded-4 shadow-sm text-center h-100">
                    <div class="badge bg-white text-congress-blue-900 fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                        -20% en:
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center pt-4">
                        <i class="fa-solid fa-stethoscope fs-2 text-shakespeare-300 mt-3 mb-2"></i>
                        <p class="fs-12p fw-normal text-white mb-0 lh-1">Consultas adicionales</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="card bg-vris-astronaut-900 border-blue-ribbon-600 rounded-4 shadow-sm text-center h-100">
                    <div class="badge bg-white text-congress-blue-900 fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                        -15% en:
                    </div>
                    <div class="card-body row justify-content-around align-items-center flex-wrap g-0 pt-4">
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-flask fs-2 text-shakespeare-300 mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Laboratorio clínico</p>
                        </div>
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-x-ray fs-2 text-shakespeare-300 mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Imágenes</p>
                        </div>
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-crutch fs-2 text-shakespeare-300 mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Terapias</p>
                        </div>
                        <div class="col-6 col-xl-3 text-center">
                            <i class="fa-solid fa-file-prescription fs-2 text-shakespeare-300 mt-3 mb-2"></i>
                            <p class="fs-12p text-white mb-0 lh-1">Procedimientos</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card bg-vris-astronaut-900 border-blue-ribbon-600 rounded-4 shadow-sm text-center h-100">
                    <div class="badge bg-white text-congress-blue-900 fs-12p position-absolute top-0 start-50 translate-middle rounded-pill px-4 py-3 small fw-medium">
                        -5% en:
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center pt-4">
                        <i class="fa-solid fa-pills fs-2 text-shakespeare-300 mt-3 mb-2"></i>
                        <p class="fs-12p fw-normal text-white mb-0 lh-1">Farmacia</p>
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
            <div class="col-md-4">
                <div class="card border-perano-300 rounded-4 shadow-none h-100">
                    <div class="card-body">
                        <h5 class="card-title">Esto es:</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex mb-2"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Programa de fidelización</li>
                            <li class="d-flex mb-2"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Atención en todos los centros Veris y ParaMí</li>
                            <li class="d-flex"><i class="bi bi-patch-check-fill text-primary-veris me-2"></i>Uso inmediato tras la compra</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-perano-300 rounded-4 shadow-none h-100">
                    <div class="card-body">
                        <h5 class="card-title">Esto no es:</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex mb-2"><i class="bi bi-x-circle-fill text-grenadier-600 me-2"></i>Seguro médico</li>
                            <li class="d-flex mb-2"><i class="bi bi-x-circle-fill text-grenadier-600 me-2"></i>Coparticipación</li>
                            <li class="d-flex"><i class="bi bi-x-circle-fill text-grenadier-600 me-2"></i>Aplicable para urgencias ni hospitalización</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-5">
    <div class="container">
        <h2 class="text-center text-primary-veris mb-2">¿Tienes dudas sobre nuestro programa?</h2>
        <p class="text-center text-fiord-700 mb-5">Esto cubrimos / no cubrimos</p>

        <div class="accordion" id="faqAccordion">

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-0">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse-0"
                        aria-expanded="false" aria-controls="collapse-0">
                        ¿Desde cuándo puedo usar el programa Veris care?
                    </button>
                </h2>
                <div id="collapse-0" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Desde el momento en que finalizas tu compra y recibes tu confirmación.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-1">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse-1"
                        aria-expanded="false" aria-controls="collapse-1">
                        ¿Cuáles son las características del programa?
                    </button>
                </h2>
                <div id="collapse-1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Son planes prepagados de salud con precios fijos y beneficios concretos.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-2">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse-2"
                        aria-expanded="false" aria-controls="collapse-2">
                        ¿Qué requisitos debo cumplir para inscribirme?
                    </button>
                </h2>
                <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Ser mayor de edad y tener un documento de identidad válido.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-3">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse-3"
                        aria-expanded="false" aria-controls="collapse-3">
                        ¿Existen costos ocultos en el programa?
                    </button>
                </h2>
                <div id="collapse-3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        No. Pagas solo el valor del plan que escojas.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-4">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapse-4"
                        aria-expanded="false" aria-controls="collapse-4">
                        ¿Cómo puedo contactar al soporte técnico?
                    </button>
                </h2>
                <div id="collapse-4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        A través de WhatsApp, call‑center o en cualquiera de nuestros centros.
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-blue-veris">Ver más preguntas</a>
        </div>
    </div>
</section>
<script>
    let detalleSuscripcionTmp = {
        "empresa": {
            "codigoEmpresa": "68",
            "nombreEmpresa": "VERIS S.A."
        },
        "tipoFlujo": "E"
    }
    localStorage.setItem(`suscripcion`, JSON.stringify(detalleSuscripcionTmp));
    let lineaNegocioPage = "CMV"
</script>
@include("verislife.b2b2c.planes.funcionalidad")
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', async () => {
        $('body').on('click', '.btn-acceder', async function() {
        })
    })
</script>
@endpush