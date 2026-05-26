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
                                    <li id="numbers">Incluir Números</li>
                                    <li id="uppercase">Incluir Mayúsculas</li>
                                    <li id="lowercase">Incluir Minúsculas</li>
                                    <li id="length">Tamaño mínimo 8</li>
                                    <li id="special">Caracteres Especiales</li>
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

        // Mapeo de requisitos y sus expresiones regulares
        const requirements = {
            numbers: /[0-9]/,
            uppercase: /[A-Z]/,
            lowercase: /[a-z]/,
            special: /[#$%*_\-+ =!]/,
            length: /^.{8,}$/
        };

        {{-- passwordInput.addEventListener('focus', () => {
            $('.checklist-box').removeClass('d-none')
        })

        passwordInput.addEventListener('blur', () => {
            $('.checklist-box').addClass('d-none')
        }) --}}

        passwordInput.addEventListener('input', () => {
            const value = passwordInput.value;

            // Iterar sobre cada regla y validar
            for (const key in requirements) {
                const element = document.getElementById(key);
                const isValid = requirements[key].test(value);

                if (isValid) {
                    element.classList.add('valid');
                } else {
                    element.classList.remove('valid');
                }
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
        
        // Validar requisitos de complejidad
        var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#$%*_\-+ =!])[0-9a-zA-Z#$%*_\-+ =!]{8,}$/;
        if (!re.test(nuevaClave)) {
            showMessage('warning','Atención',"La contraseña debe incluir al menos: <ul><li>Incluir Números</li><li>Incluir Mayúsculas</li><li>Incluir Minúsculas</li><li>Tamaño mínimo 8</li><li>Caracteres especiales</li></ul>");
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