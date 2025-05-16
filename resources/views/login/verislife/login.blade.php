@extends('template.verisLife.login')
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
            <form class="mb-3 needs-validation" novalidate>
                <div class="mb-3">
                    <label for="email" class="form-label fw-medium">Correo o Número de Identificación *</label>
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email-username"
                        placeholder="Enter your email or username"
                        autofocus required/>
                </div>
                <div class="mb-2 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label fw-medium" for="password">Contraseña *</label>
                    </div>
                    <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" required/>
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                </div>
                <div class="mb-5">
                    <a href="#!" class="fs-12p"><small>Olvidé mi contraseña</small></a>
                </div>
                <div class="mb-3">
                    <a href="/verislife/home" class="btn btn-lg btn-blue-veris d-grid w-100">Iniciar sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection