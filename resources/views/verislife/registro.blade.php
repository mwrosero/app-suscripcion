@extends('template.verisLife.app-template')
@section('title')
Veris - Registro
@endsection
@section('title-section')
Registro
@endsection

@section('content')

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

<div class="flex-grow-1 container-p-y">
    <section class="mb-4 p-3">
        <div class="row justify-content-center">
            <div class="col-12 mb-4">
                <div id="wizard-validation" class="bs-stepper wizard-modern mt-2 mb-4">
                    <div class="bs-stepper-header justify-content-center pb-5">
                        <div class="step" data-target="#registo-usuarios-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">1</span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">Registrar usuarios</span>
                                    <span class="bs-stepper-subtitle">Lista de usuarios</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"><i class="ti ti-chevron-right"></i></div>
                        <div class="step" data-target="#dato-facturacion-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Datos de facturación</span>
                                    <span class="bs-stepper-subtitle">Detalles</span>
                                </span>
                            </button>
                        </div>
                        <div class="line"><i class="ti ti-chevron-right"></i></div>
                        <div class="step" data-target="#forma-pago-validation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle rounded-circle bg-blue-zodiac-950">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Forma de pago</span>
                                    <span class="bs-stepper-subtitle">Selecciona el método</span>
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
                        <div id="registo-usuarios-validation" class="content">
                            <div class="card shadow-none">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-4 mb-2 mb-md-0">
                                            <h5 class="text-raven-700 fw-medium mb-0">Beneficiarios</h5>
                                            <div class="input-group">
                                                <span class="input-group-text bg-wild-sand-50 border-end-0 border-0"><i class="ti ti-search"></i></span>
                                                <input type="text" class="form-control form-control-lg fs-14p bg-wild-sand-50 border-start-0 border-0 py-3" placeholder="Buscar" aria-label="Buscar">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row gap-3 pe-3">
                                            <button type="button" class="btn btn-sm text-primary-veris fw-medium fs-14p shadow-none" data-bs-toggle="modal" data-bs-target="#addBeneficiaryModal">+ Usuario</button>
                                            <label for="excelFile" class="btn btn-sm text-primary-veris fw-medium fs-14p shadow-none" style="cursor: pointer;">
                                                + Carga Masiva
                                                <input type="file" id="excelFile" name="excel_file" accept=".xls, .xlsx" hidden />
                                            </label>
                                            <a href="/ruta-a-tu-template/colaboradores.csv" download="Plantilla" class="btn btn-sm fw-medium shadow-none flex-column align-items-start">
                                                <small class="text-primary-veris fs-14p">Descarga template</small>
                                                <small class="text-lochmara-500 fs-10p"><i class="fa-solid fa-download me-2"></i> colaboradores.csv</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="white-space-nowrap fs-9 align-middle ps-0" style="max-width:20px; width:18px;"></th>
                                                <th>Identificación</th>
                                                <th>Nombre y Apellido</th>
                                                <th>Teléfono móvil</th>
                                                <th>Correo</th>
                                                <th>Fecha de nacimiento</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            {{-- <tr>
                                                <td class="fs-9 align-middle">
                                                    <div class="form-check mb-0 fs-8">
                                                        <input class="form-check-input" type="checkbox" />
                                                    </div>
                                                </td>
                                                <td>0999999999</td>
                                                <td>Juan Perez</td>
                                                <td>0777777777</td>
                                                <td>usuariovbe@mail.com</td>
                                                <td>15/12/1992</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm text-aquamarine-300 shadow-none"><i class="fa-solid fa-pen"></i></button>
                                                    <button type="button" class="btn btn-sm text-rose-bud-300 shadow-none"><i class="fa-solid fa-trash-can"></i></button>
                                                </td>
                                            </tr> --}}
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-center">
                                                        <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/images/illustration/veris/connecting-teams-amico.svg" alt="sin registro">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row align-items-center justify-content-center justify-content-lg-between py-3 px-5 fs-9">
                                    <div class="col-12 col-md-6 text-md-start text-center mb-2 mb-md-0">
                                        <p class="mb-0 me-3 fs-10p text-body" data-list-info="data-list-info">1-10 de 1000</p>
                                    </div>
                                    <div class="col-auto d-flex">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination pagination-sm justify-content-center mb-0">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="dato-facturacion-validation" class="content d-none">
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
                                                                    <h2 class="fw-semibold text-cerulean-blue-800 mb-0">$9000 <small class="fw-normal fs-12p">/100 PLANES</small></h2>
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
                                            <form id="facturacionForm">
                                                <div class="row g-3 justify-content-center">
                                                    <div class="col-md-12 col-xl-8">
                                                        <label for="docType" class="form-label fs-14p fw-medium">Elige tu documento <span class="text-danger">*</span></label>
                                                        <select class="form-select form-select-lg fs-14p" id="docType" name="docType" required readonly disabled>
                                                            <option value="ruc" selected>RUC</option>
                                                            <option value="ci">Cédula</option>
                                                            <option value="pasaporte">Pasaporte</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 col-xl-8">
                                                        <label for="docNumber" class="form-label fs-14p fw-medium">Número de documento <span class="text-danger">*</span></label>
                                                        <input
                                                            type="text"
                                                            class="form-control form-control-lg fs-14p"
                                                            id="docNumber"
                                                            name="docNumber"
                                                            placeholder="9999999999999"
                                                            required
                                                            readonly>
                                                    </div>
                                                    <div class="col-md-12 col-xl-8">
                                                        <label for="fullName" class="form-label fs-14p fw-medium">Nombres y Apellidos <span class="text-danger">*</span></label>
                                                        <input
                                                            type="text"
                                                            class="form-control form-control-lg fs-14p"
                                                            id="fullName"
                                                            name="fullName"
                                                            placeholder="Empresa 1"
                                                            required>
                                                    </div>
                                                    <div class="col-md-12 col-xl-8">
                                                        <label for="phone" class="form-label fs-14p fw-medium">Teléfono <span class="text-danger">*</span></label>
                                                        <input
                                                            type="tel"
                                                            class="form-control form-control-lg fs-14p"
                                                            id="phone"
                                                            name="phone"
                                                            placeholder="+593 097 989 3554"
                                                            required>
                                                    </div>
                                                    <div class="col-md-12 col-xl-8">
                                                        <label for="email" class="form-label fs-14p fw-medium">Email <span class="text-danger">*</span></label>
                                                        <input
                                                            type="email"
                                                            class="form-control form-control-lg fs-14p"
                                                            id="email"
                                                            name="email"
                                                            placeholder="micorreo@empresa1.com"
                                                            required>
                                                    </div>
                                                    <div class="col-md-12 col-xl-8">
                                                        <label for="address" class="form-label fs-14p fw-medium">Dirección <span class="text-danger">*</span></label>
                                                        <input
                                                            type="text"
                                                            class="form-control form-control-lg fs-14p"
                                                            id="address"
                                                            name="address"
                                                            placeholder="Colinas de los ceibos, 318"
                                                            required
                                                            readonly>
                                                    </div>
                                                </div>
                                            </form>
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
                                                                        <h2 class="fw-semibold text-cerulean-blue-800 mb-0">$9000 <small class="fw-normal fs-12p">/100 PLANES</small></h2>
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
                                            <div class="row justify-content-center pb-5">
                                                <ul class="nav nav-pills justify-content-center bg-wild-sand-50 w-auto p-1 rounded-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item d-none" role="presentation">
                                                        <button class="nav-link px-lg-4 fs-14p" id="pills-credit-card-tab" data-bs-toggle="pill" data-bs-target="#pills-credit-card" type="button" role="tab" aria-controls="pills-credit-card" aria-selected="true">Tarjeta de crédito/débito</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link px-lg-4 fs-14p active" id="pills-debit-account-tab" data-bs-toggle="pill" data-bs-target="#pills-debit-account" type="button" role="tab" aria-controls="pills-debit-account" aria-selected="false">Débito a mi cuenta</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link px-lg-4 fs-14p" id="pills-bank-transfer-tab" data-bs-toggle="pill" data-bs-target="#pills-bank-transfer" type="button" role="tab" aria-controls="pills-bank-transfer" aria-selected="false">Transferencia bancaria</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content bg-transparent" id="pills-tabContent">
                                                    <div class="tab-pane fade d-none" id="pills-credit-card" role="tabpanel" aria-labelledby="pills-credit-card-tab" tabindex="0">
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
                                                    <div class="tab-pane fade show active" id="pills-debit-account" role="tabpanel" aria-labelledby="pills-debit-account-tab" tabindex="0">
                                                        <div class="text-center mb-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoCuenta" id="tipoCuentaAhorro" />
                                                                <label class="form-check-label fw-medium" for="tipoCuentaAhorro">Cuenta de ahorros</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoCuenta" id="tipoCuentaCorriente" />
                                                                <label class="form-check-label fw-medium" for="tipoCuentaCorriente">Cuenta corriente</label>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 justify-content-center mb-4">
                                                            <div class="col-12 col-lg-8">
                                                                <label for="cardNumber" class="form-label fs-14p fw-medium text-blue-zodiac-950">Número de cuenta</label>
                                                                <input type="text" class="form-control form-control-lg fs-14p" id="cardNumber" placeholder="Ingresa el número de cuenta" required>
                                                                <div class="invalid-feedback">
                                                                    Por favor ingresa un número de cuenta válido.
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <label for="cardHolder" class="form-label fs-14p fw-medium text-blue-zodiac-950">Nombre del titular</label>
                                                                <input type="text" class="form-control form-control-lg fs-14p" id="cardHolder" placeholder="Ingresa el nombre del titular" required>
                                                                <div class="invalid-feedback">
                                                                    Por favor ingresa el nombre del titular.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 justify-content-center text-center mb-4">
                                                            <div class="col-12 col-lg-8">
                                                                <a href="#!" class="text-mariner-600 text-decoration-underline fs-14p">Descargar autorización de débito</a>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <a href="#!" class="text-mariner-600 text-decoration-underline fs-14p">Descargar autorización acuerdo de responsabilidad</a>
                                                            </div>
                                                        </div>
                                                        <div class="row g-4 justify-content-center text-center mb-4">
                                                            <div class="col-12 col-lg-8">
                                                                <h6 class="fs-14p mb-1">Autorización de débito</h6>
                                                                <a href="#!" class="btn btn-cerulean-blue-800 fs-14p">Cargar</a>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <h6 class="fs-14p mb-1">Acuerdo de responsabilidad</h6>
                                                                <a href="#!" class="btn btn-cerulean-blue-800 fs-14p">Cargar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-bank-transfer" role="tabpanel" aria-labelledby="pills-bank-transfer-tab" tabindex="0">
                                                        <div class="row g-3 flex-column justify-content-center align-items-center">
                                                            <div class="col-12 col-lg-8">
                                                                <div class="card bg-zumthor-50">
                                                                    <div class="card-body">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fa-solid fa-circle-info text-havelock-blue-500 fs-1 me-3"></i>
                                                                            <div>
                                                                                <p class="text-blue-zodiac-950 fw-medium mb-0">Concepto de transferencia:</p>
                                                                                <p class="fw-normal mb-0">Compra - Opción 1</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <select class="form-select form-select-lg bg-gray border-0 mb-3">
                                                                    <option value="1">Banco Internacional</option>
                                                                    <option value="2">Banco otro 1</option>
                                                                    <option value="3">Banco otro 2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-lg-8">
                                                                <div class="card shadow-1 rounded-4">
                                                                    <div class="card-body">
                                                                        <div class="text-start mb-3">
                                                                            <h6 class="text-primary-veris mb-0">Veris S.A.</h6>
                                                                            <h6 class="text-primary-veris mb-0" id="numeroCuenta">1792040531001</h6>
                                                                        </div>
                                                                        <h5 class="text-blue-zodiac-950 mb-0" id="tipoBanco">Banco Internacional</h5>
                                                                        <p class="fs-14p text-fiord-700 fw-medium mb-3">Cuenta corriente</p>
                                                                        <h1 class="text-blue-zodiac-950 fw-bold">1000644814</h1>
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
                                                <div class="col-12 col-lg-10">
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
                                                        <div class="d-flex justify-content-between border-perano-300 rounded-4 p-2 mb-4">
                                                            <div class="option-info">
                                                                <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRASTE 36%</span>
                                                                <h4 class="option-title mb-0">Opción 1</h4>
                                                            </div>
                                                            <div class="price-block text-start">
                                                                <h4 class="fw-semibold mb-0">$90,00 <small class="fw-normal fs-14p">/100 planes</small></h4>
                                                                <p class="text-fiord-700 text-decoration-line-through small mb-0">PVP $140</p>
                                                            </div>
                                                        </div>
                                                        <!-- Beneficios -->
                                                        <div class="text-start mb-4">
                                                            <ul class="list-unstyled mb-0">
                                                                <li class="d-flex align-items-start lh-sm mb-3">
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
                                                                </li>
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
                                                    <div class="detail-value">####</div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Nombre de la empresa:</div>
                                                    <div class="detail-value">Nombre de la empresa</div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Método de pago:</div>
                                                    <div class="detail-value">Credito/debito/Transferencia</div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Frecuencia de pago: </div>
                                                    <div class="detail-value">Anual</div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Monto total:</div>
                                                    <div class="detail-value">xxxxxx$</div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Fecha de fin de contrato:</div>
                                                    <div class="detail-value">dd/mm/yy</div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                    <div>Fecha de fin de contrato:</div>
                                                    <div class="detail-value">dd/mm/yy</div>
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
                    <a id="btn-prev" href="/verislife/verificacion-plan" class="btn btn-outline-cerulean-blue-800">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stepperEl = document.querySelector('#wizard-validation');
        const stepper = new Stepper(stepperEl, {
            linear: false,
            animation: true
        });
        const actions = document.getElementById('wizard-actions');
        const steps = Array.from(stepperEl.querySelectorAll('.bs-stepper-header .step'));
        const total = steps.length;

        function disableAllTriggers() {
            steps.forEach(step => {
                const btn = step.querySelector('.step-trigger');
                btn.setAttribute('disabled', '');
            });
        }

        function enableTrigger(idx) {
            const btn = steps[idx].querySelector('.step-trigger');
            btn.removeAttribute('disabled');
        }

        function updateCircles(idx) {
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
            document.querySelectorAll('.bs-stepper-content .content')
                .forEach(el => el.classList.add('d-none'));
            document.getElementById(targetId).classList.remove('d-none');
        }

        function renderButtons(idx) {
            if (idx === 0) {
                actions.innerHTML = `
            <a id="btn-prev" href="/verislife/verificacion-plan" class="btn btn-outline-cerulean-blue-800">
              <i class="fa-solid fa-chevron-left me-2"></i>
              <span class="d-none d-sm-inline">Regresar</span>
            </a>
            <button id="btn-next" class="btn btn-cerulean-blue-800">
              <span class="d-none d-sm-inline">Continuar</span>
              <i class="fa-solid fa-chevron-right ms-2"></i>
            </button>
          `;
            } else if (idx === total - 1) {
                actions.innerHTML = `
            <a href="/verislife/home" class="btn btn-cerulean-blue-800">
              <span class="d-none d-sm-inline">Volver al inicio</span>
            </a>
          `;
            } else {
                actions.innerHTML = `
            <button id="btn-prev" class="btn btn-outline-cerulean-blue-800">
              <i class="fa-solid fa-chevron-left me-2"></i>
              <span class="d-none d-sm-inline">Regresar</span>
            </button>
            <button id="btn-next" class="btn btn-cerulean-blue-800">
              <span class="d-none d-sm-inline">Continuar</span>
              <i class="fa-solid fa-chevron-right ms-2"></i>
            </button>
          `;
            }
            const btnPrev = document.getElementById('btn-prev');
            const btnNext = document.getElementById('btn-next');
            if (btnPrev && idx > 0 && idx < total - 1) btnPrev.addEventListener('click', () => stepper.previous());
            if (btnNext && idx < total - 1) btnNext.addEventListener('click', () => stepper.next());
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
    });
</script>