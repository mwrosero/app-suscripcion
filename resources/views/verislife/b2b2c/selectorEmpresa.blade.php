@extends('template.app-blank')
@section('title')
VerisLife - Selecciona la empresa
@endsection

@section('body-class', 'bg-pattens-blue-100-gradient')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-6">
            <div class="row g-0 gap-4 justify-content-center align-items-center mb-5">
                <div class="col-auto">
                    <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/icono-veris-vertical.svg" width="138" alt="Veris Logo">
                </div>
                <div class="col-auto">
                    <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/parami.svg" width="256" alt="ParaMí Logo">
                </div>
            </div>

            <div class="text-center">
                <h5 class="mb-4 fw-semibold text-fiord-700">Hola (Nombre), elige la empresa en la que trabajas</h5>
            </div>

            <div class="row g-3 justify-content-center mb-5">
                <div class="col-12 col-xl-7">
                    <label for="companySelect" class="form-label fw-medium text-blue-zodiac-950">Empresas <span class="text-danger">*</span></label>
                    <select id="companySelect" class="form-select form-select-lg fs-14p" required>
                        <option selected>Todas las empresas</option>
                        <option value="">Pronaca</option>
                        <option value="">Diners</option>
                        <option value="">Teconomega</option>
                        <option value="">Grupo Favorita</option>
                        <option value="">Grupo El Rosado</option>
                        <option value="">Banco Pichincha</option>
                        <option value="">Banco Pacífico</option>
                    </select>
                </div>
                <div class="col-12 col-xl-7 d-none">
                    <button type="submit" class="btn btn-lg btn-blue-veris w-100">Continuar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection