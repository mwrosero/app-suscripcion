@extends('template.login')
@section('title')
    Veris - Actualizar Contraseña
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
                    <!-- Content Actualizar Clave -->
                    @if (session()->has('mensaje') && session('mensaje') == "Usuario debe cambiar su clave porque ha pasado 'x' tiempo desde el último cambio")
                        <p class="fs-4 mb-1 pt-2 text-center bg-colortext fw-bold">Actualizar Contraseña</p>
                    @else
                        <p class="fs-4 mb-1 pt-2 text-center bg-colortext fw-bold">Recuperando Contraseña</p>
                    @endif
                    <p class="fs-10 mb-3 text-center bg-colortext">Para actualizar la contraseña debes ingresar el código de validación enviado a tu correo electrónico registrado</p>

                     {{-- onsubmit="return validarClave()" --}}
                    <form id="formAuthentication" class="mb-3" method="post" action="/actualizar-clave">
                        @csrf
                        <input type="hidden" name="usuario" value="{{ $usuario }}">
                        @if (session()->has('mensaje'))
                            <div class="alert alert-warning">
                            {{ session('mensaje') }}
                            </div>
                        @endif
                        <div class="mb-2">
                            <label for="codigo" class="form-label fw-medium">Código de validación</label>
                            <input type="text"
                                class="form-control"
                                id="codigo"
                                name="codigo"
                                autofocus
                                required 
                                autocomplete="off"
                                value="" />
                        </div>
                        <div class="mb-2">
                            <label for="nuevaClave" class="form-label fw-medium">Nueva contraseña</label>
                            <div class="input-group input-group-merge">
                                <input type="password"
                                    class="form-control"
                                    id="nuevaClave"
                                    name="nuevaClave"
                                    autofocus
                                    required />
                                <span id="togglePassword" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="confirmarClave" class="form-label fw-medium">Confirmar nueva contraseña</label>
                            <div class="input-group input-group-merge">
                                <input type="password"
                                    class="form-control"
                                    id="confirmarClave"
                                    name="confirmarClave"
                                    autofocus
                                    required />
                                <span id="togglePassword2" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-lg btn-blue-veris d-grid w-100" type="submit" id="recuperarContrasena">Actualizar Contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content Actualizar Clave -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('formAuthentication');

        form.addEventListener('submit', function(event) {
            // 1. Obtenemos los valores
            var nuevaClave = document.getElementById("nuevaClave").value;
            var confirmarClave = document.getElementById("confirmarClave").value;
            
            // Variable para controlar si hay error
            let hayError = false;
            let mensajeError = "";

            // 2. Validar longitud
            if (nuevaClave.length < 8) {
                hayError = true;
                mensajeError = "La nueva contraseña debe tener al menos 8 caracteres.";
            } 
            // 3. Validar coincidencia
            else if (nuevaClave !== confirmarClave) {
                hayError = true;
                mensajeError = "Las contraseñas no coinciden.";
            } 
            // 4. Validar complejidad (Regex mejorado)
            else {
                // Este regex verifica: 1 dígito, 1 minuscula, 1 mayuscula, 1 caracter especial, min 8 chars
                // Nota: He eliminado la restricción de caracteres finales para evitar fallos si usan un "." o "-"
                var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
                
                if (!re.test(nuevaClave)) {
                    hayError = true;
                    mensajeError = "La contraseña debe incluir: Mayúscula, Minúscula, Número y Carácter especial.";
                }
            }

            // 5. Si hay error, DETENEMOS el envío
            if (hayError) {
                event.preventDefault(); // ESTO es lo que evita que se envíe el form
                
                // Verificamos si showMessage existe para evitar crash
                if (typeof showMessage === "function") {
                    showMessage('warning', 'Atención', mensajeError);
                } else {
                    // Fallback por si la librería visual falla
                    alert(mensajeError);
                }
                
                return false;
            }

            // Si llega aquí, el formulario se envía normalmente
        });
    });

    const passwordInput = document.getElementById('nuevaClave');
    const passwordInput2 = document.getElementById('confirmarClave');
    const togglePassword = document.getElementById('togglePassword');
    const togglePassword2 = document.getElementById('togglePassword2');

    togglePassword.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.innerHTML = '<i class="ti ti-eye"></i>';
        } else {
            passwordInput.type = 'password';
            togglePassword.innerHTML = '<i class="ti ti-eye-off"></i>';
        }
    });

    togglePassword2.addEventListener('click', function() {
        if (passwordInput2.type === 'password') {
            passwordInput2.type = 'text';
            togglePassword2.innerHTML = '<i class="ti ti-eye"></i>';
        } else {
            passwordInput2.type = 'password';
            togglePassword2.innerHTML = '<i class="ti ti-eye-off"></i>';
        }
    });
</script>
@endsection