@extends('template.verisLife.app-template')
@section('title')
Veris
@endsection
@section('title-section')
Registro
@endsection

@section('content')
<div class="flex-grow-1 container-p-y">
    <div class="bg-white p-3 mb-4 d-none">
        <h5 class="mb-0 mt-2">Home</h5>
    </div>
    <section class="bg-cornflower-blue-400 mb-4 px-3 py-4">
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
    <section class="bg-pattens-blue-100 mb-4 px-3 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Opciones pendientes de suscripción</h5>
            <a href="#!" class="fw-medium me-1">Ver todos</a>
        </div>
        <div class="row g-3">
            <div class="slider-promotions position-relative">
                <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 4 }}'>
                    <div class="swiper-wrapper" id="suscripcionPendientes">
                        <div class="swiper-slide">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body p-3">
                                    <h5 class="card-title">Opción 1</h5>
                                    <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 36%</span>
                                    <h4 class="fw-semibold text-primary-veris mb-0">$90,00 <small class="fs-6">/anual</small></h4>
                                    <p class="text-fiord-700 text-decoration-line-through small mb-2">PVP $140</p>
                                    <a href="/verislife/verificacion-plan" class="btn btn-cerulean-blue-800 px-0 w-100">Continuar registro</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body p-3">
                                    <h5 class="card-title">Opción 2</h5>
                                    <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 39%</span>
                                    <h4 class="fw-semibold text-primary-veris mb-0">$129,00 <small class="fs-6">/anual</small></h4>
                                    <p class="text-fiord-700 text-decoration-line-through small mb-2">PVP $210</p>
                                    <a href="/verislife/verificacion-plan" class="btn btn-cerulean-blue-800 px-0 w-100">Continuar registro</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body p-3">
                                    <h5 class="card-title">Opción 3</h5>
                                    <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 39%</span>
                                    <h4 class="fw-semibold text-primary-veris mb-0">$172,00 <small class="fs-6">/anual</small></h4>
                                    <p class="text-fiord-700 text-decoration-line-through small mb-2">PVP $280</p>
                                    <a href="/verislife/verificacion-plan" class="btn btn-cerulean-blue-800 px-0 w-100">Continuar registro</a>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body p-3">
                                    <h5 class="card-title">Opción 4</h5>
                                    <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 39%</span>
                                    <h4 class="fw-semibold text-primary-veris mb-0">$129,00 <small class="fs-6">/anual</small></h4>
                                    <p class="text-fiord-700 text-decoration-line-through small mb-2">PVP $210</p>
                                    <a href="/verislife/verificacion-plan" class="btn btn-cerulean-blue-800 px-0 w-100">Continuar registro</a>
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
    </section>
    <section class="bg-pattens-blue-100 mb-4 px-3 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Opciones contratadas</h5>
            <a href="#!" class="fw-medium me-1">Ver todos</a>
        </div>
        <div class="row g-3">
            <div class="slider-promotions position-relative">
                <div class="swiper my-swiper pt-3 pb-5" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 3 }}'>
                    <div class="swiper-wrapper" id="suscripcionContratadas">
                        <div class="swiper-slide">
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
                        </div>
                        <div class="swiper-slide">
                            <div class="card border-perano-300 rounded-4 shadow-none h-100">
                                <div class="card-body p-0 pt-3">
                                    <div class="d-flex justify-content-between mx-3 mb-3">
                                        <div class="option-info">
                                            <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRASTE 36%</span>
                                            <h5 class="option-title fw-medium mb-0">Opción 2</h5>
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
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next mt-n5 me-n2 me-lg-n3 box-shadow-2 d-none"></div>
                <div class="swiper-button-prev mt-n5 ms-n2 ms-lg-n3 box-shadow-2 d-none"></div>
                <div class="swiper-pagination position-absolute bottom-0"></div>
            </div>

            <div class="content-message text-center">
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/carrito.svg" />
                <h4 class="text-primary-veris">No tienes opciones contratados</h4>
            </div>
        </div>
    </section>

    <!-- COLABORADOR -->
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
            <div class="col-12 col-lg-4">
                <div class="card h-100">
                    <div class="card-header bg-cerulean-blue-800 py-3">
                        <h6 class="fw-medium border-start-white text-white ps-3 mb-0">Dependientes registrados</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-0 justify-content-around align-items-center my-4">
                            <div class="col-12 col-lg-5">
                                <div class="avatar avatar-lg me-2">
                                    <span class="avatar-initial rounded-4 bg-cerulean-blue-800">
                                        <i class="fa-solid fa-users text-white fs-2"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <h2 class="text-primary-veris text-center mb-0">1</h2>
                            </div>
                            <div class="content-message text-center d-none">
                                <i class="fa-solid fa-bullhorn fs-3 mb-3"></i>
                                <h6 class="text-darktext-blue-zodiac-950 mb-0">No tienes dependientes registrados</h6>
                            </div>
                        </div>
                        <a href="#!" class="btn btn-blue-veris px-0 w-100">Ver registro</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
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
            <div class="col-12 col-lg-4">
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