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
            {{-- <form class="mb-3 needs-validation" > --}}
            <form id="loginForm" class="mb-3 needs-validation" action="/autenticar" method="POST" novalidate>
                @csrf
                @if (session()->has('mensaje'))
                    <div class="alert alert-warning">
                        {{ session('mensaje') }}
                    </div>
                @endif
                @if($errors->has('csrf_token'))
                <div class="alert alert-warning">
                    {{ $errors->first('csrf_token') }}
                </div>
                @endif
                <div class="mb-3">
                    <label for="user" class="form-label fw-medium">Usuario o Correo electrónico *</label>
                    <input
                        type="text"
                        class="form-control"
                        id="user"
                        name="user"
                        placeholder="Ingresa tu usuario o correo"
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
                            placeholder="Ingresa tu contraseña"
                            aria-describedby="password" required/>
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                </div>
                <div class="mb-5">
                    <a href="/olvide-clave" class="fs-12p"><small>Olvidé mi contraseña</small></a>
                </div>
                <div class="mb-3">
                    {{-- <a href="/verislife/home" class="btn btn-lg btn-blue-veris d-grid w-100">Iniciar sesión</a> --}}
                    <button type="submit" class="btn btn-lg btn-blue-veris d-grid w-100">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    localStorage.clear();
</script>
@endsection