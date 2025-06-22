@extends('template.app-blank')
@section('title')
VerisLife - Selecciona la empresa
@endsection

@section('body-class', 'bg-pattens-blue-100-gradient')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex h-100 flex-row">
        <!-- Left side -->
        <div class="col-md-3 d-none d-lg-block">
            <div class="card bg-cerulean-blue-800 border-0 rounded-0 h-100">
                <div class="card-body">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <h3 class="text-white mt-5 mb-1">Te cuidamos con</h3>
                        <div class="bg-zumthor-50 text-primary-veris text-center rounded-3 h3 p-2">más beneficios</div>
                        <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/images/illustration/veris/injury.svg" alt="Beneficios" class="img-fluid mt-auto" style="max-height: 352px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side -->
        <div class="right-panel">
            <div class="text-center w-100 mt-4">
                <h4 class="text-fiord-700 fw-semibold mb-2">Hola <span class="text-primary-veris">(nombre del usuario)</span>,</h4>
                <h5 class="text-fiord-700 fw-medium mb-4">Te damos la bienvenida a Veris care</h5>
                <h5 class="fw-medium text-primary-veris mb-5">Escoge el programa de fidelización a tu medida:</h5>

                <div class="row gap-4 justify-content-center">
                    <div class="col-12 col-md-4">
                        <a href="#!" class="text-decoration-none">
                            <div class="card shadow-1 rounded-4 card-hover text-center">
                                <div class="card-body position-relative">
                                    <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/icono-veris-vertical-lg.svg" class="my-auto" alt="Veris"/>
                                    <div class="card-info pt-5 p-4">
                                        <div class="badge-descuento">-15% en:</div>
                                        <div class="row g-0 justify-content-center">
                                            <div class="col-6 col-md-6">
                                                <div class="info-icon"><i class="fa-solid fa-flask"></i></div>
                                                <p class="fw-normal text-white fs-14p lh-1">Laboratorio<br>clínico</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <div class="info-icon"><i class="fa-solid fa-x-ray"></i></div>
                                                <p class="fw-normal text-white fs-14p lh-1">Imágenes</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <div class="info-icon"><i class="fa-solid fa-crutch"></i></div>
                                                <p class="fw-normal text-white fs-14p lh-1">Terapias</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <div class="info-icon"><i class="fa-solid fa-file-prescription"></i></div>
                                                <p class="fw-normal text-white fs-14p lh-1">Procedimientos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4">
                        <a href="#" class="text-decoration-none">
                            <div class="card shadow-1 rounded-4 card-hover text-center">
                                <div class="card-body position-relative">
                                    <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/parami-vertical.png" class="my-auto" alt="ParaMí" />
                                    <div class="card-info pt-5 p-4">
                                        <div class="badge-descuento">-15% en:</div>
                                        <div class="row g-0 justify-content-center">
                                            <div class="col-6 col-md-6">
                                                <div class="info-icon"><i class="fa-solid fa-flask"></i></div>
                                                <p class="fw-normal text-white fs-14p lh-1">Laboratorio<br>clínico</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <div class="info-icon"><i class="fa-solid fa-x-ray"></i></div>
                                                <p class="fw-normal text-white fs-14p lh-1">Imágenes</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <div class="info-icon"><i class="fa-solid fa-crutch"></i></div>
                                                <p class="fw-normal text-white fs-14p lh-1">Terapias</p>
                                            </div>
                                            <div class="col-6 col-md-6">
                                                <div class="info-icon"><i class="fa-solid fa-file-prescription"></i></div>
                                                <p class="fw-normal text-white fs-14p lh-1">Procedimientos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection