@extends('template.login')
@section('title')
    Veris - Recuperar Contraseña
@endsection
@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
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
                    <!-- Content Recuperar Clave -->
                    <p class="fs-4 mt-5 mb-0 text-center bg-colortext fw-bold">Recuperar Contraseña</p>
                    <p class="fs-6 mb-4  text-center bg-colortext">Para actualizar la Contraseña, debes ingresar el código de validación enviado a tu correo.</p>
                    <form id="formAuthentication" class="mb-3" action="login">
                        <div class="mb-3">
                            <label for="codigo" class="form-label bg-colortext fw-bold mt-3">Código de Validación</label>
                            <input type="text"
                                class="form-control"
                                id="codigo"
                                name="codigo-username"
                                autofocus
                                required />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label bg-colortext fw-bold" for="password">Nueva Contraseña</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label bg-colortext fw-bold" for="password">Confirmar Nueva Contraseña</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password"
                                    id="new-password"
                                    class="form-control"
                                    name="new-password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="new-password"
                                    required />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100 bg-colorboton" type="submit" id="guardarContrasena">Aceptar</button>
                        </div>
                    </form>
                    <!-- /Content Recuperar Clave -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection