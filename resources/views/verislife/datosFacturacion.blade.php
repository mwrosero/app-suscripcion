@extends('template.app-template')
@section('title')
Veris - Registro
@endsection
@section('title-section')
Registro
@endsection

@section('content')
@php
    use Carbon\Carbon;

    // Establecer zona horaria
    $now = Carbon::now('America/Bogota'); // UTC-5 (también puedes usar 'America/Guayaquil')
    $nextYear = $now->copy()->addYear();
@endphp
<div class="modal fade" id="uploadedModal" tabindex="-1" aria-labelledby="uploadedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <div class="text-center mb-3">
                    <div class="loader mx-auto"></div>
                </div>
                <h5 class="text-blue-zodiac-950 fw-bold">Se están cargando tus datos</h5>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="messageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <i class="fa-solid fa-circle-check text-primary-veris fs-1 mb-3"></i>
                <h5 class="text-blue-zodiac-950 fw-bold">Beneficiario agregado con éxito.</h5>
                <h5 class="text-blue-zodiac-950 fw-bold">¿Deseas añadir un nuevo beneficiario?</h5>
                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-cerulean-blue-800 col">Añadir nuevo</button>
                    <button type="button" class="btn btn-outline-cerulean-blue-800 col" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addBeneficiaryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addBeneficiaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-dialog-centered">
        <div class="modal-content p-3 py-md-4 px-md-5">
            <div class="modal-body p-0">
                <form id="addBeneficiaryForm" class="pt-3">
                    <h5 class="fw-semibold">Datos</h5>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="documentId" class="form-label fs-14p fw-medium">CI/RUC/Pasaporte <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="documentId" name="documentId" placeholder="Número de identificación" required>
                        </div>
                        <div class="col-md-4">
                            <label for="firstName" class="form-label fs-14p fw-medium">Primer nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="firstName" name="firstName" placeholder="Primer nombre" required>
                        </div>
                        <div class="col-md-4">
                            <label for="middleName" class="form-label fs-14p fw-medium d-flex justify-content-between">Segundo nombre <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="middleName" name="middleName" placeholder="Segundo nombre">
                        </div>

                        <div class="col-md-4">
                            <label for="lastName" class="form-label fs-14p fw-medium">Primer apellido <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="lastName" name="lastName" placeholder="Primer apellido" required>
                        </div>
                        <div class="col-md-4">
                            <label for="secondLastName" class="form-label fs-14p fw-medium d-flex justify-content-between">Segundo apellido <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="secondLastName" name="secondLastName" placeholder="Segundo apellido">
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label fs-14p fw-medium">Género <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p" id="gender" name="gender" required>
                                <option value="" selected disabled>Selecciona un género</option>
                                <option value="female">Femenino</option>
                                <option value="male">Masculino</option>
                                <option value="other">Otro</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="birthDate" class="form-label fs-14p fw-medium">Fecha de nacimiento <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-lg fs-14p" id="birthDate" name="birthDate" required>
                        </div>
                        <div class="col-md-4">
                            <label for="maritalStatus" class="form-label fs-14p fw-medium">Estado Civil <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p" id="maritalStatus" name="maritalStatus" required>
                                <option value="" selected disabled>Selecciona estado civil</option>
                                <option value="single">Soltero/a</option>
                                <option value="married">Casado/a</option>
                                <option value="divorced">Divorciado/a</option>
                                <option value="widowed">Viudo/a</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="form-label fs-14p fw-medium d-flex justify-content-between">Dirección <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="address" name="address" placeholder="Ingresa la dirección">
                        </div>

                        <div class="col-md-4">
                            <label for="sector" class="form-label fs-14p fw-medium d-flex justify-content-between">Sector <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="sector" name="sector" placeholder="Ingresa el sector">
                        </div>
                        <div class="col-md-4">
                            <label for="contractNumber" class="form-label fs-14p fw-medium">Número de contrato afiliado</label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="contractNumber" name="contractNumber" placeholder="Número de contrato">
                        </div>
                        <div class="col-md-4">
                            <label for="relationship" class="form-label fs-14p fw-medium">Parentesco <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p" id="relationship" name="relationship" required>
                                <option value="" selected disabled>Selecciona una opción</option>
                                <option value="spouse">Cónyuge</option>
                                <option value="child">Hijo/a</option>
                                <option value="parent">Padre/Madre</option>
                                <option value="other">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5 class="fw-semibold">Contacto</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="phoneLandline" class="form-label fs-14p fw-medium d-flex justify-content-between">Teléfono fijo <small class="text-muted fs-12p">(Opcional)</small></label>
                                <input type="tel" class="form-control form-control-lg fs-14p" id="phoneLandline" name="phoneLandline" placeholder="Ingresa el número de teléfono">
                            </div>
                            <div class="col-md-4">
                                <label for="phoneMobile" class="form-label fs-14p fw-medium d-flex justify-content-between">Teléfono móvil <small class="text-muted fs-12p">(Opcional)</small></label>
                                <input type="tel" class="form-control form-control-lg fs-14p" id="phoneMobile" name="phoneMobile" placeholder="Ingresa el número de teléfono">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label fs-14p fw-medium d-flex justify-content-between">Correo <small class="text-muted fs-12p">(Opcional)</small></label>
                                <input type="email" class="form-control form-control-lg fs-14p" id="email" name="email" placeholder="Ingresa el correo">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="acceptTerms" name="acceptTerms" required>
                                    <label class="form-check-label fs-10p ms-2" for="acceptTerms">
                                        Acepto <a href="#" target="_blank">Términos y Condiciones</a> <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="acceptDataPolicy" name="acceptDataPolicy">
                                    <label class="form-check-label fs-10p ms-2" for="acceptDataPolicy">
                                        He leído y comprendo la autorización para el <a href="#" target="_blank">Tratamiento de mis datos personales</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer border-0 p-0">
                        <button type="button" class="btn btn-outline-cerulean-blue-800" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-cerulean-blue-800">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="documentoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="documentoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-simple modal-dialog-centered">
        <div class="modal-content p-3 py-md-4 px-md-4">
            <div class="modal-body p-0">
                <div id="addBeneficiaryForm" class="pt-3">
                    <h5 class="fw-semibold text-center titulo-documento"></h5>
                    <div class="text-center my-3" id="content-file">
                        <iframe src="/assets/file/documento.pdf" id="documentPreview" width="100%" height="500px" style="border: none;"></iframe>
                    </div>
                    <div class="modal-footer justify-content-center border-0 p-0">
                        <button type="button" class="btn btn-cerulean-blue-800" data-bs-dismiss="modal">Cerrar preview</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Código de Verificación -->
<div class="modal fade" id="verificationCodeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="verificationCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-body text-center p-4">

                <h3 class="modal-title fw-semibold text-primary-veris mb-3" id="verificationCodeModalLabel">Código de verificación</h3>

                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/enter-otp.svg" alt="Código de verificación" class="img-fluid mb-4" style="max-height: 256px;">

                <p class="mb-2 fw-semibold fs-6">Ingresa el código de verificación que ha sido enviado por SMS al número:</p>
                <p class="text-primary-veris fw-semibold fs-6">0999999999</p>

                <div class="d-flex justify-content-center gap-2 mb-3">
                    <input type="text" id="input1" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded" placeholder="-" style="width: 65px; height: 70px" aria-label="Dígito 1">
                    <input type="text" id="input2" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded" placeholder="-" style="width: 65px; height: 70px" aria-label="Dígito 2">
                    <input type="text" id="input3" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded" placeholder="-" style="width: 65px; height: 70px" aria-label="Dígito 3">
                    <input type="text" id="input4" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded" placeholder="-" style="width: 65px; height: 70px" aria-label="Dígito 4">
                    <input type="text" id="input5" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded" placeholder="-" style="width: 65px; height: 70px" aria-label="Dígito 4">
                    <input type="text" id="input6" maxlength="1" class="form-control text-center text-primary-veris fw-bold fs-4 p-2 rounded" placeholder="-" style="width: 65px; height: 70px" aria-label="Dígito 4">
                </div>

                <p class="fw-semibold fs-6 mb-3">
                    ¿Recibiste el código?
                    <a href="#" class="text-decoration-none text-primary-veris fw-semibold">Reenviar código</a>
                </p>

                <button type="button" class="btn btn-cerulean-blue-800 w-100 mb-2 btn-verificar-otp" disabled>Verificar código</button>
                <button type="button" class="btn btn-outline-cerulean-blue-800 w-100" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
<!-- Firmado documento -->
<div class="modal fade" id="signedDocumentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signedDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-body text-center p-4">

                <h3 class="modal-title fw-semibold text-primary-veris mb-3" id="signedDocumentModalLabel">Firmando documentos</h3>

                <div class="progress-circle progress-circle-lg my-auto ms-auto" data-percentage="w-100">
                    <span class="progress-left">
                        <span class="progress-bar"></span>
                    </span>
                    <span class="progress-right">
                        <span class="progress-bar"></span>
                    </span>
                    <div class="progress-value">
                        <div>
                            <span><i class="bi bi-hourglass-split fw-medium text-success fs-4"></i></span>
                            {{-- <p class="text-success fw-bold fs-2 mt-3 mb-0">30</p> --}}
                        </div>
                    </div>
                </div>

                <p class="fw-semibold fs-5 my-4">
                    ¡Este proceso puede tardar hasta 30 segundos!
                </p>

                {{-- <button type="button" class="btn btn-outline-cerulean-blue-800" data-bs-dismiss="modal">Cerrar</button> --}}

            </div>
        </div>
    </div>
</div>
<!-- Firma exitisa -->
<div class="modal fade" id="successSignatureModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successSignatureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <h2 class="text-primary-veris fw-bold">Firma exitosa</h2>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/success-ok.svg" class="mb-3"/>
                <h5 class="text-blue-zodiac-950 fw-bold">Tus documentos han sido firmados con éxito</h5>
                <div class="d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-cerulean-blue-800" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex-grow-1 container-p-y"> 
    <section class="mb-4 p-3">
        <div class="row justify-content-center">
            <div class="col-12 mb-4">
                <div id="wizard-validation" class="bs-stepper wizard-modern mt-2 mb-4">
                    <div class="bs-stepper-header justify-content-center pb-5">
                        <div class="step" data-target="#dato-facturacion-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Datos de facturación</span>
                                    <span class="bs-stepper-subtitle">Detalles</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"><i class="ti ti-chevron-right"></i></div>
                        <div class="step" data-target="#forma-pago-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Forma de pago</span>
                                    <span class="bs-stepper-subtitle">Selecciona el método</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"><i class="ti ti-chevron-right"></i></div>
                        <div class="step" data-target="#firma-docuemtos-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">3</span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">Firma documentos</span>
                                    <span class="bs-stepper-subtitle">Documento</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"><i class="ti ti-chevron-right"></i></div>
                        <div class="step" data-target="#confirmacion-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">4</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Confirmación</span>
                                    <span class="bs-stepper-subtitle">Revisa y finaliza</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content shadow-none bg-transparent p-0">
                        <div id="dato-facturacion-validation" class="content">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-8">
                                    <div class="card shadow-sm">
                                        <div class="card-body px-lg-5">
                                            <h5 class="fw-semibold">Datos de facturación</h5>
                                            <hr>
                                            <div class="row justify-content-center my-4">
                                                <div class="col-md-12 col-xl-8">
                                                    <div class="card border-perano-300 bg-wild-sand-50 rounded-4">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 col-md-6">
                                                                    <h3 class="mb-2">Total a pagar</h3>
                                                                    <h2 class="fw-semibold text-cerulean-blue-800 mb-0 valor-pagar"></h2>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="text-start text-md-end">
                                                                        <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/images/illustration/veris/device-inject.svg" alt="pay" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 justify-content-center">
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="tipoIdentificacionFactura" class="form-label fs-14p fw-medium">Elige tu documento <span class="text-danger">*</span></label>
                                                    <select class="form-select form-select-lg fs-14p" id="tipoIdentificacionFactura" name="tipoIdentificacionFactura" required>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="numeroIdentificacionFactura" class="form-label fs-14p fw-medium">Número de documento <span class="text-danger">*</span></label>
                                                    <input
                                                        type="text"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="numeroIdentificacionFactura"
                                                        name="numeroIdentificacionFactura"
                                                        placeholder="9999999999999"
                                                        required>
                                                </div>
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="nombresFactura" class="form-label fs-14p fw-medium">Nombres y Apellidos <span class="text-danger">*</span></label>
                                                    <input
                                                        type="text"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="nombresFactura"
                                                        name="nombresFactura"
                                                        placeholder="Empresa 1"
                                                        required>
                                                </div>
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="telefonoFactura" class="form-label fs-14p fw-medium">Teléfono <span class="text-danger">*</span></label>
                                                    <input
                                                        type="tel"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="telefonoFactura"
                                                        name="telefonoFactura"
                                                        placeholder="+593 097 989 3554"
                                                        required>
                                                </div>
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="emailFactura" class="form-label fs-14p fw-medium">Email <span class="text-danger">*</span></label>
                                                    <input
                                                        type="emailFactura"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="emailFactura"
                                                        name="emailFactura"
                                                        placeholder="micorreo@empresa1.com"
                                                        required>
                                                </div>
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="direccionFactura" class="form-label fs-14p fw-medium">Dirección <span class="text-danger">*</span></label>
                                                    <input
                                                        type="text"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="direccionFactura"
                                                        name="direccionFactura"
                                                        placeholder="Colinas de los ceibos, 318"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="forma-pago-validation" class="content d-none">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-8">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="mb-3">Valor a pagar</h5>
                                                <hr>
                                                <div class="row justify-content-center mt-4">
                                                    <div class="col-md-6">
                                                        <div class="card border-perano-300 bg-wild-sand-50 rounded-4">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6">
                                                                        <h3 class="mb-2">Total a pagar</h3>
                                                                        <h2 class="fw-semibold text-cerulean-blue-800 mb-0 valor-pagar"></h2>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="text-start text-md-end">
                                                                            <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/images/illustration/veris/device-inject.svg" alt="pay" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="mb-3">Método de pago</h5>
                                            <hr>
                                            <div class="row justify-content-center">
                                                <ul class="nav nav-pills justify-content-center bg-wild-sand-50 w-auto p-1 rounded-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item nav-metodo-pago d-none pasarela_pagos" role="presentation">
                                                        <button class="nav-link px-lg-4 fs-14p" id="pills-credit-card-tab" data-bs-toggle="pill" data-bs-target="#pills-credit-card" type="button" role="tab" aria-controls="pills-credit-card" aria-selected="true">Tarjeta de crédito/débito</button>
                                                    </li>
                                                    <li class="nav-item nav-metodo-pago d-none debito_cuenta" role="presentation">
                                                        <button class="nav-link px-lg-4 fs-14p" id="pills-debit-account-tab" data-bs-toggle="pill" data-bs-target="#pills-debit-account" type="button" role="tab" aria-controls="pills-debit-account" aria-selected="false">Débito a mi cuenta</button>
                                                    </li>
                                                    <li class="nav-item nav-metodo-pago d-none transferencia" role="presentation">
                                                        <button class="nav-link px-lg-4 fs-14p" id="pills-bank-transfer-tab" data-bs-toggle="pill" data-bs-target="#pills-bank-transfer" type="button" role="tab" aria-controls="pills-bank-transfer" aria-selected="false">Transferencia bancaria</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content bg-transparent" id="pills-tabContent">
                                                    <div class="tab-pane tab-pasarela_pagos d-none fade" id="pills-credit-card" role="tabpanel" aria-labelledby="pills-credit-card-tab" tabindex="0">
                                                        <div class="row g-3 justify-content-center">
                                                            <div class="col-12 col-lg-8">
                                                                <label for="cardNumber" class="form-label fs-14p fw-medium">Número de tarjeta</label>
                                                                <input type="text" class="form-control form-control-lg fs-14p" id="cardNumber" placeholder="Ingresa el número de la tarjeta" required>
                                                                <div class="invalid-feedback">
                                                                    Por favor ingresa un número de tarjeta válido.
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <label for="cardHolder" class="form-label fs-14p fw-medium">Nombre del titular</label>
                                                                <input type="text" class="form-control form-control-lg fs-14p" id="cardHolder" placeholder="Ingresa nombre del titular" required>
                                                                <div class="invalid-feedback">
                                                                    Por favor ingresa el nombre del titular.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="expiryDate" class="form-label fs-14p fw-medium">Fecha de expiración</label>
                                                                <input type="text" class="form-control form-control-lg fs-14p" id="expiryDate" placeholder="dd/mm/yy" required>
                                                                <div class="invalid-feedback">
                                                                    Por favor ingresa una fecha válida.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="cvv" class="form-label fs-14p fw-medium">CVV</label>
                                                                <input type="text" class="form-control form-control-lg fs-14p" id="cvv" placeholder="CVV" required>
                                                                <div class="invalid-feedback">
                                                                    Por favor ingresa el código de seguridad.
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <label for="paymentType" class="form-label fs-14p fw-medium">Tipo de pago</label>
                                                                <select class="form-select form-select-lg fs-14p" id="paymentType" required>
                                                                    <option value="" selected disabled>Selecciona</option>
                                                                    <option value="1">Pago único</option>
                                                                    <option value="2">Pago en cuotas</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Por favor selecciona un tipo de pago.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane tab-debito_cuenta d-none fade" id="pills-debit-account" role="tabpanel" aria-labelledby="pills-debit-account-tab" tabindex="0">
                                                        <div class="text-center mb-3" id="listTiposCuenta">
                                                            {{-- <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoCuenta" id="tipoCuentaAhorro" value="A" />
                                                                <label class="form-check-label fw-medium" for="tipoCuentaAhorro">Cuenta de ahorros</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoCuenta" id="tipoCuentaCorriente" value="C" />
                                                                <label class="form-check-label fw-medium" for="tipoCuentaCorriente">Cuenta corriente</label>
                                                            </div> --}}
                                                        </div>
                                                        <div class="row g-3 justify-content-center">
                                                            <div class="col-12 col-lg-8">
                                                                <label for="nombreBanco" class="form-label fs-14p fw-medium text-blue-zodiac-950">Nombre del banco </label>
                                                                <select class="form-select form-select-lg fs-14p select2" id="nombreBanco" name="nombreBanco" required readonly disabled>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <label for="frecuenciaPago" class="form-label fs-14p fw-medium text-blue-zodiac-950">Frecuencia de pago</label>
                                                                <input type="text" class="form-control form-control-lg fs-14p text-capitalize" name="frecuenciaPago" id="frecuenciaPago" disabled>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <label for="numeroCuenta" class="form-label fs-14p fw-medium text-blue-zodiac-950">Número de cuenta <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-lg fs-14p" name="numeroCuenta" id="numeroCuenta" placeholder="9999999999999999" required>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <label for="nombreTitular" class="form-label fs-14p fw-medium text-blue-zodiac-950">Nombre del titular <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control form-control-lg fs-14p" name="nombreTitular" id="nombreTitular" placeholder="Maria Donoso" required>
                                                            </div>
                                                            <div class="col-md-12 col-lg-8">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="autorizacionCobro" name="autorizacionCobro" required>
                                                                    <label class="form-check-label fs-10p" for="autorizacionCobro">
                                                                        Autorizo el cobro del valor o el débito de la opción contratada
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane tab-transferencia d-none fade" id="pills-bank-transfer" role="tabpanel" aria-labelledby="pills-bank-transfer-tab" tabindex="0">
                                                        <div class="row g-3 flex-column justify-content-center align-items-center">
                                                            <div class="col-12 col-lg-8">
                                                                <div class="card bg-zumthor-50">
                                                                    <div class="card-body">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fa-solid fa-circle-info text-havelock-blue-500 fs-1 me-3"></i>
                                                                            <div>
                                                                                <p class="text-blue-zodiac-950 fw-medium mb-0">Concepto de transferencia:</p>
                                                                                <p class="fw-normal mb-0 nombrePlanTransferencia"></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-8 d-none">
                                                                <select class="form-select form-select-lg bg-gray border-0 mb-3">
                                                                    <option value="2005132890">Banco Produbanco</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <div class="card shadow-1 rounded-4">
                                                                    <div class="card-body">
                                                                        <div class="text-start mb-3">
                                                                            <h6 class="text-primary-veris mb-0">Veris S.A.</h6>
                                                                            <h6 class="text-primary-veris mb-0 d-none" id="numeroCuenta">2005132890</h6>
                                                                        </div>
                                                                        <h5 class="text-blue-zodiac-950 mb-0" id="tipoBanco">Banco Produbanco</h5>
                                                                        <p class="fs-14p text-fiord-700 fw-medium mb-3">Cuenta corriente</p>
                                                                        <h1 class="text-blue-zodiac-950 fw-bold text-center">2005132890</h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <div class="text-center">
                                                                    <h6 class="fs-14p mb-1">Comprobante de pago</h6>
                                                                    <button type="button" class="btn btn-cerulean-blue-800 fs-14p">Cargar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="firma-docuemtos-validation" class="content d-none">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-8">
                                    <div class="card shadow-sm">
                                        <div class="card-body px-lg-5">
                                            <h5 class="fw-semibold">Firmar documentos</h5>
                                            <hr>
                                            <div class="row justify-content-center my-4 d-none">
                                                <div class="col-md-12 col-xl-8">
                                                    <div class="card border-perano-300 bg-wild-sand-50 rounded-4">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-12 col-md-6">
                                                                    <h5 class="mb-0">Ingresa los datos del titular del contrato</h5>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="text-start text-md-end">
                                                                        <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/images/illustration/veris/contract.svg" alt="pay" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 justify-content-center" id="lista-documentos">
                                                {{-- <div class="col-12 d-flex justify-content-between align-items-center py-2 px-3 rounded-3" style="border: 1px solid #D0D3D9">
                                                    Documento 1
                                                    <button class="btn bg-transparent border-0 btn-outline-cerulean-blue-800 fw-normal" data-bs-toggle="modal" data-bs-target="#documentoModal">
                                                        <i class="fa-solid fa-eye me-1"></i>Previsualizar
                                                    </button>
                                                </div> --}}
                                            </div>
                                            <div class="row g-3 justify-content-center mt-2">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="aceptaContrato" name="aceptaContrato" required>
                                                        <label class="form-check-label fs-10p" for="aceptaContrato">
                                                            He leido y estoy de acuerdo con los documentos de contratación <span class="text-danger">*</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 justify-content-center d-none">
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="nombreEmpresa" class="form-label fs-14p fw-medium">Nombre de la empresa</label>
                                                    <input
                                                        type="text"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="nombreEmpresa"
                                                        name="nombreEmpresa"
                                                        placeholder="Empresa 1"
                                                        required
                                                        readonly>
                                                </div>
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="ruc" class="form-label fs-14p fw-medium">RUC</label>
                                                    <input
                                                        type="text"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="ruc"
                                                        name="ruc"
                                                        placeholder="0999999999"
                                                        required
                                                        readonly>
                                                </div>
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="titular" class="form-label fs-14p fw-medium">Nombres del titular</label>
                                                    <input
                                                        type="tel"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="titular"
                                                        name="titular"
                                                        placeholder="María Yanina Donoso Samaniego"
                                                        required>
                                                </div>
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="emailContacto" class="form-label fs-14p fw-medium">Email <span class="text-danger">*</span></label>
                                                    <input
                                                        type="email"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="emailContacto"
                                                        name="emailContacto"
                                                        placeholder="micorreo@empresa1.com"
                                                        required>
                                                </div>
                                                <div class="col-md-12 col-xl-8">
                                                    <label for="telefono" class="form-label fs-14p fw-medium">Celular <span class="text-danger">*</span></label>
                                                    <input
                                                        type="text"
                                                        class="form-control form-control-lg fs-14p"
                                                        id="telefono"
                                                        name="telefono"
                                                        placeholder="+593 097 989 3554"
                                                        required>
                                                </div>
                                                <div class="col-md-12 col-xl-8 text-center">
                                                    El contrato será enviado por email, no olvides revisar la bandeja de spam.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="confirmacion-validation" class="content d-none">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-8">
                                    <div class="card shadow-sm">
                                        <div class="card-body p-4 text-center">
                                            <div class="text-center mb-4">
                                                <i class="fa-solid fa-circle-check text-primary-veris fs-1"></i>
                                            </div>
                                            <h4 class="text-primary-veris fw-semibold mb-4">Registro exitoso</h4>
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-lg-10 box-tiene-credito d-none">
                                                    <div class="card bg-zumthor-50">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <i class="fa-solid fa-circle-info text-havelock-blue-500 fs-1 me-3"></i>
                                                                <div>
                                                                    <p class="text-blue-zodiac-950 text-start mb-0">El <b>cobro</b> correspondiente a la opción contratada se realizará dentro de <b>30 días</b></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-8">
                                                    <div class="card card-body shadow-none">
                                                        <!-- Opción seleccionada -->
                                                        <div class="d-flex justify-content-between border-perano-300 rounded-4 p-2 mb-4 info-plan">
                                                            
                                                        </div>
                                                        <!-- Beneficios -->
                                                        <div class="text-start mb-4">
                                                            <ul class="list-unstyled mb-0 lista-beneficios">
                                                                {{-- <li class="d-flex align-items-start lh-sm mb-3">
                                                                    <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                                    <span>8 consultas al año<br><small class="text-fiord-700">Uso inmediato</small></span>
                                                                </li>
                                                                <li class="d-flex align-items-start lh-sm mb-3">
                                                                    <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                    <span>3 Profilaxis</span>
                                                                </li>
                                                                <li class="d-flex align-items-start lh-sm mb-3">
                                                                    <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                    <span>Consulta Optométrica y Odontológica</span>
                                                                </li>
                                                                <li class="d-flex align-items-start lh-sm mb-3">
                                                                    <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                    <span>Descuentos en servicios<br>"Veris" y "Para mí"</span>
                                                                </li> --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!-- Detalles de la compra -->
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Colaboradores registrados:</div>
                                                    <div class="detail-value colaboradores-registrados"></div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div class="text-start">Nombre de la empresa:</div>
                                                    <div class="detail-value text-end">{{ Session::get('infoCliente')->informacionCliente->nombreCliente }}</div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Método de pago:</div>
                                                    <div class="detail-value metodo-pago text-capitalize"></div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Frecuencia de pago: </div>
                                                    <div class="detail-value frecuencia-pago text-capitalize"></div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Monto total:</div>
                                                    <div class="detail-value valor-total"></div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Comprobante de pago:</div>
                                                    <div type="button" class="detail-value text-decoration-underline btn-outline-cerulean-blue-800 link-comprobante-pago">Visualizar</div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Fecha de inicio de contrato:</div>
                                                    <div class="detail-value">{{ $now->format('d/m/Y') }}</div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Fecha de fin de contrato:</div>
                                                    <div class="detail-value">{{ $nextYear->format('d/m/Y') }}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3 justify-content-center" id="wizard-actions">
                    <a id="btn-prev" href="/portal-fidelizacion/registro-plan/{{ $params }}" class="btn btn-outline-cerulean-blue-800">
                        <i class="fa-solid fa-chevron-left me-2"></i>
                        <span class="d-none d-sm-inline">Regresar</span>
                    </a>
                    <button id="btn-next" class="btn btn-cerulean-blue-800">
                        <span class="d-none d-sm-inline">Continuar</span>
                        <i class="fa-solid fa-chevron-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@push('scripts')
<script>
    const stepperEl = document.querySelector('#wizard-validation');
    const stepper = new Stepper(stepperEl, {
        linear: false,
        animation: true
    });
    const actions = document.getElementById('wizard-actions');
    const steps = Array.from(stepperEl.querySelectorAll('.bs-stepper-header .step'));
    const total = steps.length;

    function disableAllTriggers() {
        console.log('disableAllTriggers')
        steps.forEach(step => {
            const btn = step.querySelector('.step-trigger');
            btn.setAttribute('disabled', '');
        });
    }

    function enableTrigger(idx) {
        console.log('enableTrigger')
        const btn = steps[idx].querySelector('.step-trigger');
        btn.removeAttribute('disabled');
    }

    function updateCircles(idx) {
        console.log('updateCircles')
        steps.forEach((step, i) => {
            const circle = step.querySelector('.bs-stepper-circle');
            if (i < idx) {
                circle.innerHTML = '<i class="bi bi-check-lg"></i>';
            } else {
                circle.textContent = i + 1;
            }
        });
    }

    function showContent(targetId) {
        console.log('showContent')
        document.querySelectorAll('.bs-stepper-content .content')
            .forEach(el => el.classList.add('d-none'));
        document.getElementById(targetId).classList.remove('d-none');
    }

    async function renderButtons(idx) {
        console.log({total})
        console.log({idx})
        if (idx === 0) {
            actions.innerHTML = `
                <a id="btn-prev" href="/portal-fidelizacion/registro-plan/{{ $params }}" class="btn btn-outline-cerulean-blue-800">
                  <i class="fa-solid fa-chevron-left me-2"></i>
                  <span class="d-none d-sm-inline">Regresar</span>
                </a>
                <button id="btn-next" class="btn btn-cerulean-blue-800" disabled step-rel="1">
                  <span class="d-none d-sm-inline">Continuar</span>
                  <i class="fa-solid fa-chevron-right ms-2"></i>
                </button>
              `;
        } else if (idx === total - 1) {
            actions.innerHTML = `
                <a href="/portal-fidelizacion/dashboard" class="btn btn-cerulean-blue-800">
                  <span class="d-none d-sm-inline">Volver al inicio</span>
                </a>
              `;
        } else if(idx === 1) {
            actions.innerHTML = `
                <button id="btn-prev" class="btn btn-outline-cerulean-blue-800">
                  <i class="fa-solid fa-chevron-left me-2"></i>
                  <span class="d-none d-sm-inline">Regresar</span>
                </button>
                <button id="btn-next" class="btn btn-cerulean-blue-800" disabled step-rel="${idx+1}">
                  <span class="d-none d-sm-inline">Continuar</span>
                  <i class="fa-solid fa-chevron-right ms-2"></i>
                </button>`;
        } else {
            await obtenerListadoDocumentosFirma()
            actions.innerHTML = `
                <button id="btn-prev" class="btn btn-outline-cerulean-blue-800">
                  <i class="fa-solid fa-chevron-left me-2"></i>
                  <span class="d-none d-sm-inline">Regresar</span>
                </button>
                <button id="btn-next" class="btn btn-cerulean-blue-800 btn-generar-solicitud" data-bs-toggle="modal" disabled step-rel="${idx+1}">
                  <span class="d-none d-sm-inline">Firmar contratos</span>
                  <i class="fa-solid fa-chevron-right ms-2"></i>
                </button>`;
                {{-- <button id="btn-next" class="btn btn-cerulean-blue-800" data-bs-toggle="modal" data-bs-target="#verificationCodeModal" disabled step-rel="${idx+1}">
                  <span class="d-none d-sm-inline">Firmar contratos</span>
                  <i class="fa-solid fa-chevron-right ms-2"></i>
                </button> --}}
        }
        if(total == 4){
            validateFields(); 
        }
        const btnPrev = document.getElementById('btn-prev');
        const btnNext = document.getElementById('btn-next');
        if (btnPrev && idx > 0 && idx < total - 1) btnPrev.addEventListener('click', () => stepper.previous());
        if (btnNext && idx < total - 1) btnNext.addEventListener('click', async () => {
            let couldNext = true;
            //stepper.next();
            console.log('Siguiente paso activado');
            let step = $('#btn-next').attr('step-rel');
            let tipoIdentificacionFactura = $('#tipoIdentificacionFactura option:selected').val();
            let nombresFactura = $('#nombresFactura').val();
            let telefonoFactura = $('#telefonoFactura').val();
            let direccionFactura = $('#direccionFactura').val();

            console.log(step);
            
            if(step == 2){
                detalleSuscripcion.datosFactura = {
                    "tipoIdentificacion": tipoIdentificacionFactura,
                    "numeroIdentificacion": $('#numeroIdentificacionFactura').val(),
                    "nombres": nombresFactura,
                    "telefono": telefonoFactura,
                    "correo": $('#emailFactura').val(),
                    "direccion": direccionFactura
                }
            }
            console.log("STEEEEP: "+step)
            if(step == 3){
                $('.colaboradores-registrados').html(detalleSuscripcion.pacientes.length);
                $('.metodo-pago').html($('.nav-metodo-pago button.active').attr('descripcion-rel').toLowerCase());
                $('.frecuencia-pago').html(detalleSuscripcion.detallePlan.tipo.toLowerCase());
                $('.valor-total').html(`$${(detalleSuscripcion.detallePlan.valorFinal * detalleSuscripcion.pacientes.length ).toFixed(2)}`);
                couldNext = true;//validar
                await generarSolicitudFirma();
                return;
            }

            if(couldNext){
                stepper.next();
            }else{
                alert("Error")
            }
            localStorage.setItem(`suscripcion-{{ $params }}`, JSON.stringify(detalleSuscripcion));
        });
    }

    stepperEl.addEventListener('show.bs-stepper', function(event) {
        const idx = event.detail.indexStep;
        disableAllTriggers();
        enableTrigger(idx);
        updateCircles(idx);
        const target = steps[idx].getAttribute('data-target').slice(1);
        showContent(target);
        renderButtons(idx);
    });

    // Inicialización
    disableAllTriggers();
    enableTrigger(0);
    updateCircles(0);
    showContent(steps[0].getAttribute('data-target').slice(1));
    renderButtons(0);

    let numeroIdentificacionFacturaValido = false;
    let emailFacturaValido = false;
 
    const detalleSuscripcion = JSON.parse(localStorage.getItem('suscripcion-{{ $params }}'));
    document.addEventListener('DOMContentLoaded', async () => {

        @if(!Session::get('infoCliente')->informacionCliente->aplicaCredito)
            $('.box-tiene-credito').remove('d-none');
        @endif

        $('.nombrePlanTransferencia').html(`Compra - ${detalleSuscripcion.detallePlan.nombre}`)

        const beneficios = detalleSuscripcion.detallePlan.beneficios;
        const beneficiosHTML = beneficios.map((beneficio, index) => {
        const claseIcono = index === 0 ? 'text-primary-veris' : 'text-blue-zodiac-950';
        return `
            <li class="mb-2 d-flex align-items-start lh-sm">
                <i class="bi bi-patch-check-fill ${claseIcono} me-2"></i>
                ${beneficio.descripcion}
            </li>`;
        }).join('');
        $('.lista-beneficios').html(beneficiosHTML);

        $('.info-plan').html(`<div class="option-info">
                <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRASTE ${detalleSuscripcion.detallePlan.porcentajeDescuento}%</span>
                <h4 class="option-title mb-0 nombrePlan">${detalleSuscripcion.detallePlan.nombre}</h4>
            </div>
            <div class="price-block text-start">
                <h4 class="fw-semibold mb-0">$${ (detalleSuscripcion.detallePlan.valorFinal * detalleSuscripcion.pacientes.length ).toFixed(2) } <small class="fw-normal fs-14p">/${detalleSuscripcion.pacientes.length} plan${ (detalleSuscripcion.pacientes.length == 1) ? `` : `es` }</small></h4>
                <p class="text-fiord-700 text-decoration-line-through small mb-0">PVP $${ (detalleSuscripcion.detallePlan.precio * detalleSuscripcion.pacientes.length ).toFixed(2) } </p>
            </div>`)

        $('#frecuenciaPago').val(detalleSuscripcion.detallePlan.tipo.toLowerCase())

        $('#nombreEmpresa').val("{{ Session::get('infoCliente')->informacionCliente->nombreCliente }}")
        $('#ruc').val("{{ Session::get('infoCliente')->informacionCliente->identificacionCliente }}")

        $('.valor-pagar').html(`$${ (detalleSuscripcion.detallePlan.valorFinal * detalleSuscripcion.pacientes.length ).toFixed(2) } <small class="fw-normal fs-12p">/${detalleSuscripcion.pacientes.length} PLAN${ (detalleSuscripcion.pacientes.length == 1) ? `` : `ES` }</small>`)

        const tipoIdentificacionSelect = document.getElementById('tipoIdentificacionFactura');
        tipoIdentificacionSelect.innerHTML = '<option value="" selected>Seleccionar tipo de identificación</option>';

        const tiposIdentificacion = await obtenerTiposIdentificacion();

        tiposIdentificacion.forEach(item => {
            const option = document.createElement('option');
            option.value = item.codigoTipoIdentificacion;
            option.textContent = item.nombreTipoIdentificacion;
            tipoIdentificacionSelect.appendChild(option);
        });

        tipoIdentificacionSelect.disabled = false;

        const nombreBancoSelect = document.getElementById('nombreBanco');
        nombreBancoSelect.innerHTML = '<option value="" selected>Seleccionar Banco</option>';
        const institucionesBancarias = await obtenerInstitucionesBancarias();

        institucionesBancarias.forEach(item => {
            const option = document.createElement('option');
            option.value = item.codigoInstitucion;
            option.textContent = item.nombreInstitucion;
            nombreBancoSelect.appendChild(option);
        });

        nombreBancoSelect.disabled = false;
        $('#nombreBanco').select2()

        $('body').on('click', '.link-comprobante-pago', async function(){
            await mostrarComprobante();
        })

        $('body').on('change', '#numeroIdentificacionFactura', async function(){
            await validarIdentificacionFactura();
        })

        $('body').on('change', '#emailFactura', async function(){
            let email = $(this).val();
            await validarCorreoElectronico(email);
        })

        $('body').on('input change', 'input, select', async function(){
            validateFields();
        })

        $('body').on('click', '.btn-generar-solicitud', async function(){
            // await generarSolicitudFirma();
        })

        $('body').on('click', '.btn-previsualizar', async function(){
            let datos = JSON.parse($(this).attr('data-rel'));
            await obtenerDocumentoContrato(datos);
        })

        $('body').on('input', '#input1, #input2, #input3, #input4, #input5, #input6', async function(){
            if( $('#input1').val() != "" && $('#input2').val() != "" && $('#input3').val() != "" && $('#input4').val() != "" && $('#input5').val() != "" && $('#input6').val() != ""){
                $('.btn-verificar-otp').attr('disabled',false)
            }else{
                $('.btn-verificar-otp').attr('disabled',true)
                // showMessage('warning','Atención','Debe ingresar el código OTP recibido mediante SMS');
            }
        })

        $('body').on('click', '.btn-verificar-otp', async function(){
            await confirmarOtp();
        })

        {{-- $('body').on('click', '#btn-next', async function(){
            let step = $(this).attr('step-rel');
            let tipoIdentificacionFactura = $('#tipoIdentificacionFactura option:selected').val();
            let nombresFactura = $('#nombresFactura').val();
            let telefonoFactura = $('#telefonoFactura').val();
            let direccionFactura = $('#direccionFactura').val();
            
            if(step == 1){
                detalleSuscripcion.datosFactura = {
                    "tipoIdentificacion": tipoIdentificacionFactura,
                    "numeroIdentificacion": $('#numeroIdentificacionFactura').val(),
                    "nombres": nombresFactura,
                    "telefono": telefonoFactura,
                    "correo": $('#emailFactura').val(),
                    "direccion": direccionFactura
                }
            }
            if(step == 3){
                await crearSuscripcion();
            }
            localStorage.setItem(`suscripcion-{{ $params }}`, JSON.stringify(detalleSuscripcion));
        }) --}}

        await cargarMediosPago();
        await cargarTiposCuenta();
    });

    async function obtenerListadoDocumentosFirma(){
        let args = [];
        args["endpoint"] = api_url + `/empresarial/v1/util/suscripcion/tipos_documentos?estado=ACTIVO&aplicaFirma=true`;
        args["method"] = "GET";
        args["showLoader"] = true;
        args["token"] = _token;
        const data = await call(args);

        if(data.code == 200){
            let elem = ``
            $.each(data.data, function(key, value){
                elem += `<div class="col-12 d-flex justify-content-between align-items-center py-2 px-3 rounded-3" style="border: 1px solid #D0D3D9">
                        <span class="flex-grow-1 text-capitalize">${value.descripcion.toLowerCase()}</span>
                        <button data-rel='${JSON.stringify(value)}' class="btn bg-transparent border-0 btn-outline-cerulean-blue-800 fw-normal btn-previsualizar">
                            <i class="fa-solid fa-eye me-1"></i>Previsualizar
                        </button>
                    </div>`;
            })

            //data-bs-toggle="modal" data-bs-target="#documentoModal"

            $('#lista-documentos').html(elem);
        }
    }

    async function obtenerDocumentoContrato(datos){
        console.log(datos);
        $('.titulo-documento').html(`${datos.descripcion}`);
        let args = [];
        
        if(datos.nemonico == "AUTORIZACION_DEBITO"){
            let codigoInstitucion = $('#nombreBanco option:selected').val();
            let numeroCuenta = $('#numeroCuenta').val();
            let nombreTitular = $('#nombreTitular').val();
            let tipoCuenta = (parseInt($('input[name="tipoCuenta"]:checked').val()) == 1) ? "AHORROS" : "CORRIENTE";
            args["endpoint"] = api_url + `/empresarial/v1/reportes/autorizacion_debito_cuenta?codigoCliente={{ Session::get('infoCliente')->informacionCliente->codigoCliente }}&codigoInstitucion=${codigoInstitucion}&tipoCuenta=${tipoCuenta}&numeroCuenta=${numeroCuenta}&periodo=${detalleSuscripcion.detallePlan.tipo}`;
        }else{
            args["endpoint"] = api_url + `/empresarial/v1/suscripcion/documentos?nemonicoDocumento=${datos.nemonico}`;
        }
        args["method"] = "GET";
        args["showLoader"] = true;
        args["token"] = _token;

        const blob = await callDocumento(args);
        const pdfUrl = URL.createObjectURL(blob);
        //window.open(pdfUrl, '_blank');
        $('#documentPreview').attr('src', `${pdfUrl}#view=FitH&toolbar=0&navpanes=0&scrollbar=0`);
        setTimeout(() => {
            URL.revokeObjectURL(pdfUrl);
        }, 100);

        $('#documentoModal').modal('show');
    }

    function validateFields(){
        let step = $('#btn-next').attr('step-rel');
        if(step == 1){
            let tipoIdentificacionFactura = $('#tipoIdentificacionFactura option:selected').val();
            let nombresFactura = $('#nombresFactura').val();
            let telefonoFactura = $('#telefonoFactura').val();
            let direccionFactura = $('#direccionFactura').val();
            if(tipoIdentificacionFactura !== '' && nombresFactura.length > 4 && telefonoFactura.length > 6 && direccionFactura.length > 5 && numeroIdentificacionFacturaValido && emailFacturaValido){
                $('#btn-next').attr('disabled', false);
            }else{
                $('#btn-next').attr('disabled', true);
            }
        }

        if(step == 2){
            let frecuenciaPago = $('#frecuenciaPago').val();
            let nombreBanco = $('#nombreBanco').val();
            let numeroCuenta = $('#numeroCuenta').val();
            let nombreTitular = $('#nombreTitular').val();
            let autorizacionCobro = $('#autorizacionCobro').is(':checked')
            if(nombreBanco !== '' && frecuenciaPago.length > 4 && numeroCuenta.length > 4 && nombreTitular && autorizacionCobro){
                $('#btn-next').attr('disabled', false);
            }else{
                $('#btn-next').attr('disabled', true);
            }
        }

        if(step == 3){
            let aceptaContrato = $('#aceptaContrato').is(':checked')
            
            if(aceptaContrato){
                $('#btn-next').attr('disabled', false);
            }else{
                $('#btn-next').attr('disabled', true);
            }
        }
    }

    async function cargarTiposCuenta(){
        let args = [];
        args["endpoint"] = api_url + `/facturacion/v1/util/tipos_cuenta_bancaria`;
        args["method"] = "GET";
        args["showLoader"] = false;
        args["token"] = _token;

        const data = await call(args);
        if(data.code == 200){
            let elem = ``;
            $.each(data.data, function(key, value){
                let activeAttribute = (value.codigoTipoCuenta == 1) ? `checked` : ``;
                elem += `<div class="form-check form-check-inline">
                        <input ${activeAttribute} class="form-check-input" type="radio" name="tipoCuenta" id="tipoCuenta${value.nombreTipoCuenta.toLowerCase()}" value="${value.codigoTipoCuenta}" />
                        <label class="form-check-label fw-medium" for="tipoCuenta${value.nombreTipoCuenta.toLowerCase()}">Cuenta ${value.nombreTipoCuenta.toLowerCase()}</label>
                    </div>`;
            })
            $('#listTiposCuenta').html(elem);
            // $('input[name="tipoCuenta"]:checked').val();
        }
    }

    async function cargarMediosPago(){
        let args = [];
        args["endpoint"] = `${api_url}/empresarial/v1/util/suscripcion/medios_pago?estado=ACTIVO&flujoSuscripcion=EMPRESA
    `;
        args["method"] = "GET";
        args["showLoader"] = true;
        args["token"] = _token;
        const data = await call(args);
        console.log(data);
        let isSettedActive = false;
        
        $.each(data.data, function(key, value){
            let classTab = ``
            let classTabContent = ``
            if(value.activo == true){
                if(!isSettedActive){
                    isSettedActive = true;
                    classTab = `active`;
                    classTabContent = `show active`;
                }
                console.log(value.nemonico)
                console.log(classTab,classTabContent)
                $(`.${value.nemonico.toLowerCase()}`).removeClass('d-none');
                $(`.${value.nemonico.toLowerCase()} button`).addClass(`${classTab}`).attr('idMedioPago-rel',value.idMedioPago).attr('descripcion-rel',value.descripcion);
                console.log(`.${value.nemonico.toLowerCase()} button`);
                $(`.tab-${value.nemonico.toLowerCase()}`).removeClass('d-none').addClass(`${classTabContent}`);
            }

        })
    }

    async function validarIdentificacionFactura(){
        let tipoIdentificacion = $('#tipoIdentificacionFactura option:selected').val();
        let numeroIdentificacion = $('#numeroIdentificacionFactura').val();
        let args = [];
        args["endpoint"] = `${api_url}/general/v1/util/validar_identificacion?codigoTipoIdentificacion=${tipoIdentificacion}&codigoEmpresa=1&numeroIdentificacion=${numeroIdentificacion}`;
        args["method"] = "GET";
        args["showLoader"] = true;
        args["token"] = _token;
        const data = await call(args);
        if(data.code == 200){
            numeroIdentificacionFacturaValido = data.data.esIdentificacionValida;
            validateFields();
        }
    }

    async function validarCorreoElectronico(email){
        let args = [];
        args["endpoint"] = `${api_url}/general/v1/util/validacion_correo_electronico?canalOrigenInvocaion=COMERCIAL`;
        args["method"] = "POST";
        args["showLoader"] = true;
        args["token"] = _token;
        args["bodyType"] = "json";
        args["data"] = JSON.stringify({
            "idPaciente": 0,
            "correoElectronico": email
        });
        const data = await call(args);
        console.log(data);
        if(data.code == 200){
            emailFacturaValido = data.data.correoValido
            validateFields();
        }
    }

    async function obtenerTiposIdentificacion() {
        const baseUrl = `${api_url}/general/v1/tipos_identificacion`;
        const queryParams = new URLSearchParams({
            codigoEmpresa: '1',
            usoTipoIdentificacion: 'GESTION_FACTURACION'
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: true,
        });

        return response?.data || [];
    }

    async function obtenerInstitucionesBancarias() {
        const baseUrl = `${api_url}/general/v1/instituciones/bancarias`;
        const queryParams = new URLSearchParams({
            tipoProposito: '',
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: true,
        });

        return response?.data || [];
    }

    async function crearSuscripcion(){
        $('#signedDocumentModal').modal('hide')
        {{-- console.log("crearSuscripcion");
        let generarSolicitud = await generarSolicitudFirma(); --}}

        let codigoInstitucion = $('#nombreBanco option:selected').val();
        let numeroCuenta = $('#numeroCuenta').val();
        let nombreTitular = $('#nombreTitular').val();
        let tipoCuenta = (parseInt($('input[name="tipoCuenta"]:checked').val()) == 1) ? "AH" : "CC";
        let tipoFlujo = "{{ Session::get('infoCliente')->tipoFlujo }}";


        let tipoIdentificacionFactura = $('#tipoIdentificacionFactura option:selected').val();
        let numeroIdentificacionFactura = $('#numeroIdentificacionFactura').val();
        let nombresFactura = $('#nombresFactura').val();
        let telefonoFactura = $('#telefonoFactura').val();
        let emailFactura = $('#emailFactura').val();
        let direccionFactura = $('#direccionFactura').val();

        let args = [];
        args["endpoint"] = `${api_url}/empresarial/v1/suscripcion/registro`;
        args["method"] = "POST";
        args["showLoader"] = true;
        args["token"] = _token;
        args["bodyType"] = "json";
        args["data"] = JSON.stringify({
            "codigoCliente": {{ Session::get('infoCliente')->informacionCliente->codigoCliente }},
            "secuenciaAfiliado": "",//"{{ Session::get('userData')->secuenciaUsuario }}",
            "codigoSolicitudFirma": codigoSolicitudFirma,
            "codigoConvenio": detalleSuscripcion.detallePlan.codigoConvenio,
            "secuenciaFrecuencia": detalleSuscripcion.detallePlan.secuenciaFrecuencia,
            "tipoFlujo": tipoFlujo,
            "pago": {
                "idMedioPago": parseInt($('.nav-metodo-pago button.active').attr('idMedioPago-rel')),
                "montoTotal": (detalleSuscripcion.detallePlan.valorFinal * detalleSuscripcion.pacientes.length).toFixed(2),
                "detalle": {
                    // "numeroTarjeta": "",
                    // "mesExpiracion": 0,
                    // "anioExpiracion": 0,
                    // "codigoSeguridad": 0,
                    // "tipoCobro": "CORRIENTE",
                    "numeroCuenta": numeroCuenta,
                    "nombreTitular": nombreTitular,
                    "tipoCuenta": tipoCuenta,
                    "codigoInstitucion": codigoInstitucion,
                    "autorizaDebitoCargado": true,
                    "autorizaAcuerdoCargado": true,
                    "comprobantePagoCargado": true
                }
            },
            "datosFirmaDocumentos": {
                "nombreEmpresa": "{{ Session::get('infoCliente')->informacionCliente->nombreCliente }}",
                "codigoTipoIdentificacion": 3,//cambiar
                "numeroIdentificacion": "0923796304",//$('#ruc').val(),
                "representanteLegal": "Michael Rosero",//$('#titular').val(),
                "telefono": "0988302580",//$('#telefono').val(),
                "email": "mwrosero@gmail.com",//$('#emailContacto').val(),
                "direccion": "Mi casa"
            },
            "datosFacturacion": {
                "codigoTipoIdentificacion": tipoIdentificacionFactura,
                "numeroIdentificacion": numeroIdentificacionFactura,
                "nombres": nombresFactura,
                "telefono": telefonoFactura,
                "email": emailFactura,
                "direccion": direccionFactura
            },
            "terminosCondiciones": {
                "aceptaPolitica": true,
                "aceptaTratamientoDatos": true,
                "aceptaConsentimientoDependiente": true
            }
        });
        const data = await call(args);
        console.log(data);
        detalleSuscripcion.suscripcion = data.data;
        if(data.code == 200){
            stepper.next();
            await cargaAfiliadosSuscripcion();
            $('#successSignatureModal').modal('show')
        }else{
            showMessage('error','Atención',data.message);
        }
    }

    async function mostrarComprobante(){
        let args = [];
        args["endpoint"] = api_url + `/reportes/v1/financiero/comprobante_financiero?format=pdf&codigoEmpresa=1&secuenciaComprobante=${detalleSuscripcion.suscripcion.secuenciaComprobante}`;
        args["method"] = "GET";
        args["showLoader"] = false;
        args["token"] = _token;
        const blob = await callDocumento(args);
        const pdfUrl = URL.createObjectURL(blob);
        window.open(pdfUrl, '_blank');
        setTimeout(() => {
            URL.revokeObjectURL(pdfUrl);
        }, 100);
    }

    let codigoSolicitudFirma;
    async function generarSolicitudFirma(){
        // E - Empresa, C - Colaborador, I - Individual
        let tipoFlujo = "{{ Session::get('infoCliente')->tipoFlujo }}";
        let tiposDocumentos = ["AUTORIZACION_DEBITO"];

        let codigoInstitucion = $('#nombreBanco option:selected').val();
        let numeroCuenta = $('#numeroCuenta').val();
        let nombreTitular = $('#nombreTitular').val();
        let tipoCuenta = (parseInt($('input[name="tipoCuenta"]:checked').val()) == 1) ? "AHORROS" : "CORRIENTE";

        let args = [];
        args["endpoint"] = `${api_url}/empresarial/v1/suscripcion/firma/genera_solicitud`;
        args["method"] = "POST";
        args["showLoader"] = true;
        args["token"] = _token;
        args["bodyType"] = "json";

        args["data"] = JSON.stringify({
            "tipoFlujo": tipoFlujo,
            "nombres": "{{ Session::get('infoCliente')->informacionCliente->nombreCliente }}",
            "apellidos": "{{ Session::get('infoCliente')->informacionCliente->nombreCliente }}",
            "codigoTipoIdentificacion": 3,//"{{ Session::get('infoCliente')->informacionCliente->tipoIdentificacionCliente }}",
            "numeroIdentificacion": "{{ Session::get('infoCliente')->informacionCliente->identificacionCliente }}",
            "correo": "mwrosero@gmail.com",
            "telefono": "0988302580",
            "datosDocumentoDebito" : {
                "codigoCliente": parseInt("{{ Session::get('infoCliente')->informacionCliente->codigoCliente }}"),
                "codigoInstitucion": parseInt(codigoInstitucion),
                "tipoCuenta": tipoCuenta,
                "numeroCuenta": numeroCuenta,
                "periodo": detalleSuscripcion.detallePlan.tipo,
            },
            "tiposDocumentos": tiposDocumentos
        });
        const data = await call(args);
        
        if(data.code == 200){
            codigoSolicitudFirma = data.data.codigoSolicitud;
            if(tipoFlujo == "E"){
                await confirmarOtp();
            }else{
                $('#verificationCodeModal').modal('show');
            }
        }else{
            showMessage('error','Atención',data.message);
        }
    }

    async function confirmarOtp(){
        $('#signedDocumentModal').modal('show')
        let tipoFlujo = "{{ Session::get('infoCliente')->tipoFlujo }}";
        let codigoOtp = `${$('#input1').val()}${$('#input2').val()}${$('#input3').val()}${$('#input4').val()}${$('#input5').val()}${$('#input6').val()}`;
        let payload = {}
        if(tipoFlujo !== "E"){
            //codigoOtp = 0;
            payload.codigoOtp = codigoOtp
        }
        let args = [];
        args["endpoint"] = `${api_url}/empresarial/v1/suscripcion/firma/${codigoSolicitudFirma}/confirmacion?tipoFlujo=${tipoFlujo}`;
        args["method"] = "POST";
        args["showLoader"] = true;
        args["token"] = _token;
        args["bodyType"] = "json";
        args["data"] = JSON.stringify(payload);
        const data = await call(args);
        $('#signedDocumentModal').modal('hide')
        if(data.code == 200){
            $('#verificationCodeModal').modal('hide');
            await crearSuscripcion();
        }else{
            showMessage('warning','Atención',data.message);
        }
    }

    async function cargaAfiliadosSuscripcion(){
        let args = [];
        args["endpoint"] = `${api_url}/comercial/v1/afiliados/carga_afiliados_credito_fidelizacion?codigoEmpresa=1`;
        args["method"] = "POST";
        args["showLoader"] = true;
        args["token"] = _token;
        args["bodyType"] = "json";
        args["data"] = JSON.stringify({
            "codigoConvenio": detalleSuscripcion.detallePlan.codigoConvenio,
            "secuenciaSuscripcion": detalleSuscripcion.suscripcion.secuenciaSuscripcion,
            "afiliados": detalleSuscripcion.pacientes
        });
        const data = await call(args);
        console.log(data);
    }
</script>
@endpush