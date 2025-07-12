@extends('template.login')
@section('title')
    Veris - Olvide Contraseña
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
                    <!-- Content Olvide Clave -->
                    <p class="fs-4 mb-1 pt-2 text-center bg-colortext fw-bold">Olvidé mi Contraseña</p>
                    <p class="fs-6 mb-4  text-center bg-colortext">Ingresa tu Usuario o Correo Electrónico </p>

                    <form id="formAuthentication" class="mb-3" method="post" action="/recuperar-clave" >
                        @csrf
                        @if (session()->has('mensaje'))
                            <div class="alert alert-warning">
                            {{ session('mensaje') }}
                            </div>
                        @endif
                        {{-- <div class="mb-3">
                            <label for="user" class="form-label bg-colortext fw-bold mt-2">Usuario o Correo Electrónico</label>
                            <input type="text"
                                class="form-control"
                                id="user"
                                name="user"
                                autofocus
                                required />
                        </div> --}}
                        <div class="mb-3">
                            <label for="user" class="form-label fw-medium">Usuario o Correo Electrónico *</label>
                            <input
                                type="text"
                                class="form-control"
                                id="user"
                                name="user"
                                autofocus 
                                required/>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-lg btn-blue-veris d-grid w-100" type="submit" id="recuperarContrasena">Recuperar Contraseña</button>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="login" class="fs-12p" for="noCerrarSeesion"> Regresar al Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content Olvide Clave -->
@endsection