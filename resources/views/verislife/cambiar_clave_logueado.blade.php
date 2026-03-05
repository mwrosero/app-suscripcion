@extends('template.app-template')
@section('title')
Veris
@endsection
@section('title-section')
Registro
@endsection

@section('content')
<!-- Firma exitisa -->
{{-- <div class="modal fade" id="successComprobanteUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successComprobanteUploadLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <h2 class="text-primary-veris fw-bold">Carga exitosa</h2>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/success-ok.svg" class="mb-3"/>
                <h5 class="text-blue-zodiac-950 fw-bold">Tus comprobante se ha cargado con éxito</h5>
                <div class="d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-cerulean-blue-800" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="flex-grow-1 container-p-y">
    <section class="mb-4 p-3">
        <div class="text-start text-md-center mb-4">
            <h1 class="fw-semibold h4 text-primary-veris">Actualizar clave</h1>
        </div>
        <div class="row justify-content-start justify-content-md-center">
            <div class="col-12 col-md-5 col-lg-4 rounded-3 shadow p-3">
                <div class="w-100 mb-3">
                    <label for="claveActual" class="form-label fs-14p fw-medium">Clave actual <span class="text-danger">*</span></label>
                    <input type="password" autocomplete="new-password" class="form-control form-control-lg fs-14p" id="claveActual" name="claveActual" required>
                </div>
                <div class="w-100 mb-3">
                    <label for="claveNueva" class="form-label fs-14p fw-medium">Clave nueva <span class="text-danger">*</span></label>
                    <input type="password" autocomplete="new-password" class="form-control form-control-lg fs-14p" id="claveNueva" name="claveNueva" required>
                </div>
                <div class="w-100 checklist-box p-2 mb-3 rounded">
                    <p class="fw-medium mb-2 bg-colortext">Su password debe contener al menos:</p>
                    <ul class="checklist px-2 mb-0">
                        <li id="numbers">Incluir Números</li>
                        <li id="uppercase">Incluir Mayúsculas</li>
                        <li id="lowercase">Incluir Minúsculas</li>
                        <li id="length">Tamaño mínimo 8</li>
                        <li id="special">Caracteres Especiales</li>
                    </ul>
                </div>
                <div class="w-100 mb-3">
                    <label for="claveNueva2" class="form-label fs-14p fw-medium">Confirmar clave nueva <span class="text-danger">*</span></label>
                    <input type="password" autocomplete="new-password" class="form-control form-control-lg fs-14p" id="claveNueva2" name="claveNueva2" required>
                </div>
                <hr>
                <div class="w-100">
                    <button class="btn btn-cerulean-blue-800 waves-effect waves-light w-100" id="btn-actualizar-clave">Actualizar clave</button>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const passwordInput = document.getElementById('claveNueva');
        const requirements = {
            numbers: /[0-9]/,
            uppercase: /[A-Z]/,
            lowercase: /[a-z]/,
            special: /[!@#$%^&*(),.?":{}|<>]/,
            length: /^.{8,}$/
        };
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

        $('body').on('click', '#btn-actualizar-clave', async function () {
            let validateFields = await validarClave();
            if(validateFields){
                // alert(0)
                await actualizarClave();
            }
            {{-- if(getInput('claveActual') !== "" && getInput('claveNueva') !== "" &&  getInput('claveNueva2') !== ""){
                if(getInput('claveNueva') === getInput('claveNueva2')){
                    alert(0)
                    //await actualizarClave();
                }else{
                    showMessage('warning','Atención','Las contraseña nueva y su confirmación no coinciden. Por favor, inténtalo de nuevo.');
                }
            }else{
                showMessage('warning','Atención','Debe ingresar los campos obligatorios');
            } --}}
        })
    })

    async function actualizarClave(){
        let args = [];
        args["endpoint"] = api_url + `/${war_seguridad}/v1/usuarios/{{ Session::get('userData')->secuenciaUsuario }}/cambio_clave`;
        args["method"] = "POST";
        args["token"] = _token;
        args["showLoader"] = true;
        args["bodyType"] = "json";
        args["data"] = JSON.stringify({
            "accessToken": "{{ Session::get('userData')->accessToken }}",
            "claveAnterior": getInput('claveActual'),
            "clavePropuesta": getInput('claveNueva')
        })
        const data = await call(args);
        console.log(data);
        if(data.code == 200){
            $('#claveActual, #claveNueva, #claveNueva2').val("");
            showMessage('success','Atención',"Clave actualizada exitosamente.");
            setTimeout(function(){
                location.href = '/portal-fidelizacion/dashboard';
            }, 2000);
        }else{
            showMessage('warning','Atención',data.message);
        }
    }

    async function validarClave() {
        const passwordInput = document.getElementById('claveNueva');
        var claveActual = document.getElementById("claveActual").value;
        var nuevaClave = document.getElementById("claveNueva").value;
        var confirmarClave = document.getElementById("claveNueva2").value;

        if (claveActual.length === 0) {
            showMessage('warning','Atención',"Debe ingresar los campos obligatorios.");
            return false;
        }
        
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
        var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#*$%^&+=!¡¿?])[0-9a-zA-Z@#*$%^&+=!¡¿?]{8,}$/;
        if (!re.test(nuevaClave)) {
            showMessage('warning','Atención',"La contraseña debe incluir al menos: <ul><li>Incluir Números</li><li>Incluir Mayúsculas</li><li>Incluir Minúsculas</li><li>Tamaño mínimo 8</li><li>Caracteres especiales</li></ul>");
            return false;
        }
        
        return true;
    }
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