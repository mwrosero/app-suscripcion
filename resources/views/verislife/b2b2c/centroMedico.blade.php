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
                        <h3 class="text-white mb-1">Te cuidamos con</h3>
                        <div class="bg-zumthor-50 text-primary-veris text-center rounded-3 h3 p-2">más beneficios</div>
                        <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/images/illustration/veris/injury.svg" alt="Beneficios" class="img-fluid mt-auto" style="max-height: 352px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side -->
        <div class="right-panel">
            <div class="text-center w-100">
                <h4 class="text-fiord-700 fw-semibold mb-2">Hola <span class="text-primary-veris">(nombre del usuario)</span>,</h4>
                <h5 class="text-fiord-700 fw-medium mb-4">Te damos la bienvenida a Veris care</h5>
                <h5 class="fw-medium text-primary-veris mb-5">Escoge el programa de fidelización a tu medida:</h5>

                <div class="row gap-4 justify-content-center">
                    <div class="col-12 col-md-4">
                        <div class="card shadow-1 rounded-4 h-100 card-hover text-center">
                            <div class="card-body position-relative">
                                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/icono-veris-vertical.svg" alt="Veris" class="logo-veris mb-3" />
                                <div class="card-info">
                                    <div class="badge-descuento">-15% en:</div>
                                    <div class="row g-2 justify-content-center">
                                        <div class="col-6 col-md-6">
                                            <div class="info-icon">🧪</div>
                                            <div class="info-text">Laboratorio<br>clínico</div>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="info-icon">🖼️</div>
                                            <div class="info-text">Imágenes</div>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="info-icon">🧘‍♂️</div>
                                            <div class="info-text">Terapias</div>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="info-icon">💉</div>
                                            <div class="info-text">Procedimientos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="card shadow-1 rounded-4 h-100">
                            <div class="card-body d-flex justify-content-center">
                                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/parami-vertical.png" class="my-auto" alt="ParaMí" />
                                <!-- -15% en: -->
                                <!-- Laboratorio clínico - Imagenes - Terapias - Procedimientos -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection