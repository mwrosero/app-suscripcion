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
    <section class="bg-cornflower-blue-400 mb-4 p-3">
        <div class="d-none justify-content-between align-items-center mb-2">
            <h5 class="fw-medium border-start-blue text-white ps-3 fs-18 mb-0">Planes contratados</h5>
            <a href="#!" class="fw-medium text-white me-1">Ver todos</a>
        </div>
        <div class="row">
            <div class="content-message text-center">
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/login-amico1.svg"/>
                <h4 class="text-white">Pronto podrás visualizar tu información aquí</h4>
            </div>
        </div>
    </section>
    <section class="bg-pattens-blue-100 mb-4 p-3">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Opciones pendientes de suscripción</h5>
            <a href="#!" class="fw-medium me-1">Ver todos</a>
        </div>
        <div class="row">

            <div class="col-12 col-lg-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-3">
                        <h5 class="card-title">Opción 1</h5>
                        <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 36%</span>
                        <h4 class="fw-semibold text-primary-veris mb-0">$90,00 <small class="fs-6">/anual</small></h4>
                        <p class="text-fiord-700 text-decoration-line-through small mb-2">PVP $140</p>
                        <a href="/verislife/verificacion-plan" class="btn btn-cerulean-blue-800 px-0 w-100">Continuar suscripción</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-3">
                        <h5 class="card-title">Opción 2</h5>
                        <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 39%</span>
                        <h4 class="fw-semibold text-primary-veris mb-0">$129,00 <small class="fs-6">/anual</small></h4>
                        <p class="text-fiord-700 text-decoration-line-through small mb-2">PVP $210</p>
                        <a href="/verislife/verificacion-plan" class="btn btn-cerulean-blue-800 px-0 w-100">Continuar suscripción</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-3">
                        <h5 class="card-title">Opción 3</h5>
                        <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 39%</span>
                        <h4 class="fw-semibold text-primary-veris mb-0">$172,00 <small class="fs-6">/anual</small></h4>
                        <p class="text-fiord-700 text-decoration-line-through small mb-2">PVP $280</p>
                        <a href="/verislife/verificacion-plan" class="btn btn-cerulean-blue-800 px-0 w-100">Continuar suscripción</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-3">
                        <h5 class="card-title">Opción 4</h5>
                        <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 39%</span>
                        <h4 class="fw-semibold text-primary-veris mb-0">$129,00 <small class="fs-6">/anual</small></h4>
                        <p class="text-fiord-700 text-decoration-line-through small mb-2">PVP $210</p>
                        <a href="/verislife/verificacion-plan" class="btn btn-cerulean-blue-800 px-0 w-100">Continuar suscripción</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="bg-pattens-blue-100 mb-4 p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Opciones contratadas</h5>
            <a href="#!" class="fw-medium me-1">Ver todos</a>
        </div>
        <div class="row">
            <div class="content-message text-center">
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/carrito.svg"/>
                <h4 class="text-primary-veris">No tienes opciones contratados</h4>
            </div>
        </div>
    </section>
</div>
@endsection