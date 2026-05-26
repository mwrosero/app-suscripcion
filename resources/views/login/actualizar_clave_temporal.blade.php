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
                    <p class="fs-4 mb-1 pt-2 text-center bg-colortext fw-bold">Actualizar contraseña</p>
                    <p class="fs-10 mb-3 text-center bg-colortext">Para acceder al sistema debe realizar el proceso de actualización de la contraseña</p>

                    <form id="formAuthentication" class="mb-3" method="post" action="/actualizar-clave-temporal" onsubmit="return validarClave()">
                        @csrf
                        @if (session()->has('mensaje'))
                            <div class="alert alert-warning">
                            {{ session('mensaje') }}
                            </div>
                        @endif
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
                            <div class="checklist-box p-2 my-2 rounded">
                                <p class="fw-medium mb-2 bg-colortext">Su password debe contener al menos:</p>
                                <ul class="checklist px-2">
                                    <li id="firstLetter">Debe iniciar con una letra mayúscula</li>
                                    {{-- <li id="uppercase">Incluir Mayúscula</li> --}}
                                    <li id="lowercase">Incluir Minúscula</li>
                                    <li id="numbers">Incluir Números</li>
                                    <li id="length">Tamaño mínimo 8</li>
                                    <li id="special">Caracteres Especiales <b class="ms-1 text-dark">#$%*_-+=!</b></li>
                                </ul>
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
        const passwordInput = document.getElementById('nuevaClave');

        {{-- passwordInput.addEventListener('focus', () => {
            $('.checklist-box').removeClass('d-none')
        })

        passwordInput.addEventListener('blur', () => {
            $('.checklist-box').addClass('d-none')
        }) --}}

        passwordInput.addEventListener('input', () => {
            let value = passwordInput.value;
            const allowedCharsStr = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$%*_-+=!";

            // 1. RESTRICCIÓN: Si hay algo escrito, el primer carácter DEBE ser Mayúscula
            if (value.length > 0) {
                const firstChar = value.charAt(0);
                if (!/[A-Z]/.test(firstChar)) {
                    // Si el primero no es mayúscula, borramos todo y avisamos
                    passwordInput.value = "";
                    showMessage('warning', 'Atención', "La contraseña debe comenzar obligatoriamente con una letra mayúscula.");
                    
                    // Limpiamos todos los checks visualmente
                    for (const key in requirements) {
                        document.getElementById(key).classList.remove('valid');
                    }
                    return;
                }
            }

            // 2. FILTRADO de caracteres prohibidos (el resto de la cadena)
            const lastChar = value.slice(-1);
            if (value.length > 0 && !allowedCharsStr.includes(lastChar)) {
                passwordInput.value = value.slice(0, -1);
                showMessage('warning', 'Atención', `Caracter "${lastChar}" no permitido.`);
                return; 
            }

            // 3. Validación visual (se desmarcará al borrar, ya que evaluamos el valor actual)
            for (const key in requirements) {
                const element = document.getElementById(key);
                // Si el valor es vacío o no cumple, .toggle(..., false) quitará la clase
                element.classList.toggle('valid', value.length > 0 && requirements[key].test(value));
            }
        });

    })
    function validarClave() {
        const passwordInput = document.getElementById('nuevaClave');
        var nuevaClave = document.getElementById("nuevaClave").value;
        var confirmarClave = document.getElementById("confirmarClave").value;
        
        // Validar longitud mínima de 8 caracteres
        if (nuevaClave.length < 8) {
            showMessage('warning','Atención',"La nueva contraseña debe tener al menos 8 caracteres.");
            return false;
        }
        
        // Validar que las contraseñas coincidan
        if (nuevaClave !== confirmarClave) {
            showMessage('warning','Atención',"Las contraseñas no coinciden.");
            return false;
        }
        
        const isComplex = Object.values(requirements).every(regex => regex.test(nuevaClave));
        
        if (!isComplex) {
            showMessage('warning', 'Atención', "La contraseña no cumple con todos los requisitos de seguridad.");
            return false;
        }
        
        return true;
    }

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
<style>
    .checklist-box{
        font-size: 0.85rem;
        color: #6e6b7b;
        font-size: 12px;
        line-height: 12px;
        background: #296bef17;
    }
    /* Estilos base */
    .checklist {
        list-style: none;
    }

    .checklist li {
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        margin-bottom: 4px;
    }

    /* Estado por defecto: El BULLET */
    .checklist li::before {
        content: "\2022"; /* Código Unicode de un punto (bullet) */
        color: #b9b9c3;   /* Color gris claro para el punto */
        font-weight: bold;
        display: inline-block; 
        width: 20px;      /* Espacio fijo para que el texto no se mueva */
        font-size: 1.2rem;
    }

    /* Estado cuando se cumple la validación */
    .checklist li.valid {
        color: #28c76f !important; /* Verde Bootstrap/Tabler */
    }

    /* Insertar el icono de flechita dinámicamente */
    .checklist li.valid::before {
        content: "\2713"; /* Código Unicode del check (visto) */
        font-weight: bold;
        margin-right: 8px;
        color: #28c76f !important;
    }
</style>
@endsection