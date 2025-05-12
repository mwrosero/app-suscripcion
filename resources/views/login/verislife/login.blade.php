@extends('template.verislife.login')
@section('title')
VerisLife - Login
@endsection

@section('content')
<div class="card shadow-none">
    <div class="card-body px-3">
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4 mt-2">
            <a href="#!" class="app-brand-link gap-2">
                <span class="app-brand-logo">
                    <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/icono-veris-vertical.svg" width="135" alt="veris">
                </span>
            </a>
        </div>
        <!-- /Logo -->
        <div class="row justify-content-center pb-5">
            <ul class="nav nav-pills justify-content-center bg-athens-gray-100 w-auto px-2 py-1 rounded-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 bg-white active" id="pills-empresa-veris-tab" data-bs-toggle="pill" data-bs-target="#pills-empresa-veris" type="button" role="tab" aria-controls="pills-empresa-veris" aria-selected="true">Empresa</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 bg-white" id="pills-colaborador-veris-tab" data-bs-toggle="pill" data-bs-target="#pills-colaborador-veris" type="button" role="tab" aria-controls="pills-colaborador-veris" aria-selected="false">Colaborador</button>
                </li>
            </ul>
            <div class="tab-content px-0" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-empresa-veris" role="tabpanel" aria-labelledby="pills-empresa-veris-tab" tabindex="0">
                    <x-forms.form-login type="empresa" action="#!" />
                </div>
                <div class="tab-pane fade" id="pills-colaborador-veris" role="tabpanel" aria-labelledby="pills-colaborador-veris-tab" tabindex="0">
                    <x-forms.form-login type="colaborador" action="#!" />
                </div>
            </div>
        </div>

    </div>
</div>
@endsection