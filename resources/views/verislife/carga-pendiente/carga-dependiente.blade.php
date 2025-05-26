@extends('template.verisLife.app-template')
@section('title')
Veris
@endsection
@section('title-section')
Registro
@endsection

@section('content')
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
                        <a href="/verislife/carga-dependiente/registro" class="btn btn-blue-veris px-0 w-100">Ver registro</a>
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