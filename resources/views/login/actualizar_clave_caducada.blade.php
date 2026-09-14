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
                    <p class="fs-10 mb-3 text-center bg-colortext">Contraseña caducada, actualízala para <br> ingresar al portal.</p>

                    <!-- Cambiamos action a javascript:void(0) para evitar envíos no deseados -->
                    <form id="formAuthentication" class="mb-3" method="post" action="javascript:void(0);">
                        @csrf
                        @if (session()->has('mensaje'))
                            <div class="alert alert-warning">
                                {{ session('mensaje') }}
                            </div>
                        @endif
                        
                        <div class="mb-2">
                            <label for="claveActual" class="form-label fw-medium">Contraseña actual</label>
                            <div class="input-group input-group-merge">
                                <input type="password"
                                    class="form-control"
                                    id="claveActual"
                                    name="claveActual"
                                    autofocus 
                                    {{-- onpaste="return false;"  --}}
                                    required />
                                <span id="togglePasswordCurrent" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>

                            <label for="nuevaClave" class="form-label fw-medium mt-2">Nueva contraseña</label>
                            <div class="input-group input-group-merge">
                                <input type="password"
                                    class="form-control"
                                    id="nuevaClave"
                                    name="nuevaClave"
                                    onpaste="return false;" 
                                    required />
                                <span id="togglePasswordNew" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>

                            <div class="checklist-box p-2 my-2 rounded">
                                <p class="fw-medium mb-2 bg-colortext">Su password debe contener al menos:</p>
                                <ul class="checklist px-2">
                                    <li id="firstLetter">Debe iniciar con una letra mayúscula</li>
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
                                    onpaste="return false;"
                                    required />
                                <span id="togglePasswordConfirm" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- CAMBIO CLAVE: type="button" en lugar de type="submit" -->
                            <button class="btn btn-lg btn-blue-veris d-grid w-100" type="button" id="btnSubmitForm">Actualizar Contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('formAuthentication');
        const btnSubmit = document.getElementById('btnSubmitForm');
        const passwordInput = document.getElementById('nuevaClave');

        // Escuchar el clic directamente sobre el botón
        if (btnSubmit) {
            btnSubmit.addEventListener('click', function(e) {
                e.preventDefault();
                
                if (validarFormulario()) {
                    // Si la validación pasa, asignamos la ruta y enviamos
                    form.action = "/actualizar-clave-caducada";
                    form.submit();
                }
            });
        }

        // Permitir enviar con la tecla Enter dentro de los inputs
        form.querySelectorAll('input').forEach(input => {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    btnSubmit.click();
                }
            });
        });

        // Validación dinámica de la nueva clave
        if (passwordInput) {
            passwordInput.addEventListener('input', () => {
                let value = passwordInput.value;

                if (value.length > 0) {
                    const firstChar = value.charAt(0);
                    if (!/[A-Z]/.test(firstChar)) {
                        passwordInput.value = "";
                        if (typeof showMessage === 'function') {
                            showMessage('warning', 'Atención', "La contraseña debe comenzar obligatoriamente con una letra mayúscula.");
                        }
                        
                        if (typeof requirements !== 'undefined') {
                            for (const key in requirements) {
                                document.getElementById(key)?.classList.remove('valid');
                            }
                        }
                        return;
                    }
                }

                const lastChar = value.slice(-1);
                if (value.length > 0 && typeof allowedCharsStr !== 'undefined' && !allowedCharsStr.includes(lastChar)) {
                    passwordInput.value = value.slice(0, -1);
                    if (typeof showMessage === 'function') {
                        showMessage('warning', 'Atención', `Carácter "${lastChar}" no permitido.`);
                    }
                    return; 
                }

                if (typeof requirements !== 'undefined') {
                    for (const key in requirements) {
                        const element = document.getElementById(key);
                        if (element) {
                            element.classList.toggle('valid', value.length > 0 && requirements[key].test(value));
                        }
                    }
                }
            });
        }

        bindToggle('togglePasswordCurrent', 'claveActual');
        bindToggle('togglePasswordNew', 'nuevaClave');
        bindToggle('togglePasswordConfirm', 'confirmarClave');
    });

    function bindToggle(toggleId, inputId) {
        const toggleBtn = document.getElementById(toggleId);
        const inputField = document.getElementById(inputId);
        if (toggleBtn && inputField) {
            toggleBtn.addEventListener('click', function() {
                const isPassword = inputField.type === 'password';
                inputField.type = isPassword ? 'text' : 'password';
                this.innerHTML = isPassword ? '<i class="ti ti-eye"></i>' : '<i class="ti ti-eye-off"></i>';
            });
        }
    }

    function validarFormulario() {
        const claveActualVal = document.getElementById('claveActual')?.value || '';
        const nuevaClaveVal = document.getElementById('nuevaClave')?.value || '';
        const confirmarClaveVal = document.getElementById('confirmarClave')?.value || '';
        
        if (claveActualVal.trim() === '') {
            if (typeof showMessage === 'function') showMessage('warning', 'Atención', "La contraseña actual es requerida.");
            return false;
        }

        if (nuevaClaveVal.length < 8) {
            if (typeof showMessage === 'function') showMessage('warning', 'Atención', "La nueva contraseña debe tener al menos 8 caracteres.");
            return false;
        }
        
        if (nuevaClaveVal !== confirmarClaveVal) {
            if (typeof showMessage === 'function') showMessage('warning', 'Atención', "Las contraseñas no coinciden.");
            return false;
        }
        
        if (typeof requirements !== 'undefined') {
            const isComplex = Object.values(requirements).every(regex => regex.test(nuevaClaveVal));
            if (!isComplex) {
                if (typeof showMessage === 'function') showMessage('warning', 'Atención', "La contraseña no cumple con todos los requisitos de seguridad.");
                return false;
            }
        }
        
        return true;
    }
</script>

<style>
    .checklist-box {
        font-size: 12px;
        line-height: 12px;
        color: #6e6b7b;
        background: #296bef17;
    }

    .checklist {
        list-style: none;
    }

    .checklist li {
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        margin-bottom: 4px;
    }

    .checklist li::before {
        content: "\2022";
        color: #b9b9c3;
        font-weight: bold;
        display: inline-block; 
        width: 20px;
        font-size: 1.2rem;
    }

    .checklist li.valid {
        color: #28c76f !important;
    }

    .checklist li.valid::before {
        content: "\2713";
        font-weight: bold;
        margin-right: 8px;
        color: #28c76f !important;
    }
</style>
@endsection