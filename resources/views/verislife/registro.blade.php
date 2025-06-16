@extends('template.verisLife.app-template')
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
    <div class="modal-dialog modal-md modal-simple modal-dialog-centered">
        <div class="modal-content p-3 py-md-4 px-md-2">
            <div class="modal-body p-0">
                <div id="addBeneficiaryForm" class="pt-3">
                    <h5 class="fw-semibold">Registrar colaborador</h5>
                    <hr>
                    <div class="row g-3 px-3">
                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="tipoIdentificacion" class="form-label fs-14p fw-medium">Tipo de identificación <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p text-capitalize" id="tipoIdentificacion" name="tipoIdentificacion" required>
                                <option value="" selected disabled>Selecciona el tipo de identificación</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="numeroIdentificacion" class="form-label fs-14p fw-medium">Número de identificación <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="numeroIdentificacion" name="numeroIdentificacion" placeholder="Número de identificación" required>
                        </div>
                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="primerNombre" class="form-label fs-14p fw-medium">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="primerNombre" name="primerNombre" placeholder="Primer nombre" required>
                        </div>
                        <!-- <div class="col-12 col-md-8 offset-md-2">">
                            <label for="segundoNombre" class="form-label fs-14p fw-medium d-flex justify-content-between">Segundo nombre <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="segundoNombre" name="segundoNombre" placeholder="Segundo nombre">
                        </div> -->

                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="primerApellido" class="form-label fs-14p fw-medium">Primer apellido <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="primerApellido" name="primerApellido" placeholder="Primer apellido" required>
                        </div>
                        <!-- <div class="col-12 col-md-8 offset-md-2">">
                            <label for="segundoApellido" class="form-label fs-14p fw-medium d-flex justify-content-between">Segundo apellido <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="segundoApellido" name="segundoApellido" placeholder="Segundo apellido">
                        </div> -->
                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="fechaNacimiento" class="form-label fs-14p fw-medium">Fecha de nacimiento <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-lg fs-14p" id="fechaNacimiento" name="fechaNacimiento" required>
                        </div>
                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="genero" class="form-label fs-14p fw-medium">Género <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p" id="genero" name="genero" required>
                                <option value="" selected disabled>Selecciona un género</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <!-- <div class="col-12 col-md-8 offset-md-2">">
                            <label for="parentesco" class="form-label fs-14p fw-medium">Parentesco <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p text-capitalize" id="parentesco" name="parentesco" required>
                                <option value="" selected disabled>Selecciona una opción</option>
                            </select>
                        </div> -->
                        <!-- <div class="col-12 col-md-8 offset-md-2">">
                            <label for="estadoCivil" class="form-label fs-14p fw-medium">Estado Civil <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p text-capitalize" id="estadoCivil" name="estadoCivil" required>
                                <option value="" selected disabled>Selecciona estado civil</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="direccion" class="form-label fs-14p fw-medium d-flex justify-content-between">Dirección <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="direccion" name="direccion" placeholder="Ingresa la dirección">
                        </div>

                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="sector" class="form-label fs-14p fw-medium d-flex justify-content-between">Sector <small class="text-muted fs-12p">(Opcional)</small></label>
                            <select class="form-select form-select-lg fs-14p text-capitalize" id="sector" name="sector" required>
                            </select>
                        </div>
                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="numeroContratoAfiliado" class="form-label fs-14p fw-medium">Número de contrato afiliado</label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="numeroContratoAfiliado" name="numeroContratoAfiliado" placeholder="Número de contrato">
                        </div> -->
                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="telefonoMovil" class="form-label fs-14p fw-medium d-flex justify-content-between">Teléfono móvil <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="tel" class="form-control form-control-lg fs-14p" id="telefonoMovil" name="telefonoMovil" placeholder="Ingresa el número de teléfono">
                        </div>
                        <div class="col-12 col-md-8 offset-md-2">
                            <label for="email" class="form-label fs-14p fw-medium d-flex justify-content-between">Correo <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="email" class="form-control form-control-lg fs-14p" id="email" name="email" placeholder="Ingresa el correo">
                        </div>
                        
                    </div>
                    <!-- <div class="mt-4">
                        <h5 class="fw-semibold">Contacto</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="telefonoFijo" class="form-label fs-14p fw-medium d-flex justify-content-between">Teléfono fijo <small class="text-muted fs-12p">(Opcional)</small></label>
                                <input type="tel" class="form-control form-control-lg fs-14p" id="telefonoFijo" name="telefonoFijo" placeholder="Ingresa el número de teléfono">
                            </div>
                            <div class="col-md-4">
                                <label for="telefonoMovil" class="form-label fs-14p fw-medium d-flex justify-content-between">Teléfono móvil <small class="text-muted fs-12p">(Opcional)</small></label>
                                <input type="tel" class="form-control form-control-lg fs-14p" id="telefonoMovil" name="telefonoMovil" placeholder="Ingresa el número de teléfono">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label fs-14p fw-medium d-flex justify-content-between">Correo <small class="text-muted fs-12p">(Opcional)</small></label>
                                <input type="email" class="form-control form-control-lg fs-14p" id="email" name="email" placeholder="Ingresa el correo">
                            </div>
                        </div>
                    </div> -->
                    <div class="mt-4">
                        <div class="row g-3 px-3">
                            <div class="col-12 col-md-8 offset-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label fs-10p" for="terms">
                                        Acepto <a href="#!" class="text-mariner-600 text-decoration-underline link-documento" nemonico-rel="TERMINOS_CONDICIONES">Términos y Condiciones</a> <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 offset-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy" name="privacy">
                                    <label class="form-check-label fs-10p" for="privacy">
                                        He leído y comprendo la autorización para el <a href="#!" class="text-mariner-600 text-decoration-underline link-documento" nemonico-rel="TRATAMIENTO_DATOS">Tratamiento de mis datos personales</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer border-0 p-0">
                        <button type="button" class="btn btn-outline-cerulean-blue-800" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-cerulean-blue-800" id="btn-add" disabled>Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="improveBeneficiaryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="improveBeneficiaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-dialog-centered">
        <div class="modal-content p-3 py-md-4 px-md-2">
            <div class="modal-body p-0">
                <h5 class="fw-semibold text-center">Opción en la que estás registrado</h5>
                <div class="row justify-content-center mb-3">
                    <div class="col-12 col-lg-3">
                        <div class="card border-perano-300 border-2 shadow-none">
                            <div class="card-body p-3">
                                <h5>Esencial</h5>
                                <div class="mt-1">
                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 36%</span>
                                </div>
                                <div class="my-1">
                                    <h5 class="fw-semibold text-blue-zodiac-950 m-0">$90,00 <small class="fw-normal fs-12p">/anual</small></h5>
                                    <small class="text-muted text-decoration-line-through text-xs">PVP: $140</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="fw-semibold text-center">Descubre más beneficios</h5>
                
                <div class="row justify-content-center">
                    <ul class="nav nav-pills justify-content-center bg-wild-sand-50 w-auto px-2 p-1 rounded-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 px-lg-5 active" id="pills-anual-veris-tab" data-bs-toggle="pill" data-bs-target="#pills-anual-veris" type="button" role="tab" aria-controls="pills-anual-veris" aria-selected="true">Anual</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 px-lg-5" id="pills-mensual-veris-tab" data-bs-toggle="pill" data-bs-target="#pills-mensual-veris" type="button" role="tab" aria-controls="pills-mensual-veris" aria-selected="false">Mensual</button>
                        </li>
                    </ul>
                    <div class="tab-content bg-transparent" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-anual-veris" role="tabpanel" aria-labelledby="pills-anual-veris-tab" tabindex="0">
                            <div class="row g-3">
                                <div class="slider-anual position-relative">
                                    <div class="swiper my-swiper" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 3 }}'>
                                        <div class="swiper-wrapper" id="planesVerisAnual">

                                            <div class="swiper-slide">
                                                <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                                    <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                        Bienestar
                                                    </h5>
                                                    <div class="px-3 py-2">
                                                        <div class="mt-1">
                                                            <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 36%</span>
                                                        </div>
                                                        <div class="my-1">
                                                            <h2 class="fw-bold text-blue-zodiac-950 m-0">$90 <small class="fw-medium fs-5">/anual</small></h2>
                                                            <small class="text-muted text-decoration-line-through text-xs">PVP: $140</small>
                                                        </div>
                                                    </div>
                                                    <hr class="my-1">
                                                    <div class="card-body p-3">
                                                        <h6 class="fw-bold">Beneficios</h6>
                                                        <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                                <span>4 consultas al año<br><small>Uso inmediato</small></span>
                                                            </li>
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                1 Profilaxis
                                                            </li>
                                                            <li class="d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                Consulta Optométrica<br>y Odontológica
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer p-0 text-center">
                                                        <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Cambiar ahora</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                                    <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                        Plenitud
                                                    </h5>
                                                    <div class="px-3 py-2">
                                                        <div class="mt-1">
                                                            <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 39%</span>
                                                        </div>
                                                        <div class="my-1">
                                                            <h2 class="fw-bold text-blue-zodiac-950 m-0">$129 <small class="fw-medium fs-5">/anual</small></h2>
                                                            <small class="text-muted text-decoration-line-through text-xs">PVP: $210</small>
                                                        </div>
                                                    </div>
                                                    <hr class="my-1">
                                                    <div class="card-body p-3">
                                                        <h6 class="fw-bold">Beneficios</h6>
                                                        <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                                <span>6 consultas al año<br><small>Uso inmediato</small></span>
                                                            </li>
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                2 Profilaxis
                                                            </li>
                                                            <li class="d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                Consulta Optométrica<br>y Odontológica
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer p-0 text-center">
                                                        <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Cambiar ahora</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                                    <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                        Familiar
                                                    </h5>
                                                    <div class="px-3 py-2">
                                                        <div class="mt-1">
                                                            <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 39%</span>
                                                        </div>
                                                        <div class="my-1">
                                                            <h2 class="fw-bold text-blue-zodiac-950 m-0">$172 <small class="fw-medium fs-5">/anual</small></h2>
                                                            <small class="text-muted text-decoration-line-through text-xs">PVP: $180</small>
                                                        </div>
                                                    </div>
                                                    <hr class="my-1">
                                                    <div class="card-body p-3">
                                                        <h6 class="fw-bold">Beneficios</h6>
                                                        <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                                <span>4 consultas al año<br><small>Uso inmediato</small></span>
                                                            </li>
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                1 Profilaxis
                                                            </li>
                                                            <li class="d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                Consulta Optométrica<br>y Odontológica
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer p-0 text-center">
                                                        <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Cambiar ahora</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="swiper-button-next mt-n5 me-n2 me-lg-n3 box-shadow-2 d-none"></div>
                                    <div class="swiper-button-prev mt-n5 ms-n2 ms-lg-n3 box-shadow-2 d-none"></div>
                                    <div class="swiper-pagination position-absolute bottom-0"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-mensual-veris" role="tabpanel" aria-labelledby="pills-mensual-veris-tab" tabindex="0">
                            <div class="row g-3">
                                <div class="slider-mensual position-relative">
                                    <div class="swiper my-swiper" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 3 }}'>
                                        <div class="swiper-wrapper" id="planesVerisMensual">

                                            <div class="swiper-slide">
                                                <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                                    <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                        Bienestar
                                                    </h5>
                                                    <div class="px-3 py-2">
                                                        <div class="mt-1">
                                                            <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 30%</span>
                                                        </div>
                                                        <div class="my-1">
                                                            <h2 class="fw-bold text-blue-zodiac-950 m-0">$8,25 <small class="fw-medium fs-5">/mes</small></h2>
                                                            <small class="text-muted text-decoration-line-through text-xs">PVP: $140</small>
                                                        </div>
                                                    </div>
                                                    <hr class="my-1">
                                                    <div class="card-body p-3">
                                                        <h6 class="fw-bold">Beneficios</h6>
                                                        <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                                <span>4 consultas al año<br><small>1 consulta por trimestre</small></span>
                                                            </li>
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                1 Profilaxis
                                                            </li>
                                                            <li class="d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                Consulta Optométrica<br>y Odontológica
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer p-0 text-center">
                                                        <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Cambiar ahora</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                                    <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                        Plenitud
                                                    </h5>
                                                    <div class="px-3 py-2">
                                                        <div class="mt-1">
                                                            <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 32%</span>
                                                        </div>
                                                        <div class="my-1">
                                                            <h2 class="fw-bold text-blue-zodiac-950 m-0">$11,83 <small class="fw-medium fs-5">/mes</small></h2>
                                                            <small class="text-muted text-decoration-line-through text-xs">PVP: $210</small>
                                                        </div>
                                                    </div>
                                                    <hr class="my-1">
                                                    <div class="card-body p-3">
                                                        <h6 class="fw-bold">Beneficios</h6>
                                                        <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                                <span>6 consultas al año<br><small>2 consulta por bimestre</small></span>
                                                            </li>
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                2 Profilaxis
                                                            </li>
                                                            <li class="d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                Consulta Optométrica<br>y Odontológica
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer p-0 text-center">
                                                        <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Cambiar ahora</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                                    <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                                                        Familiar
                                                    </h5>
                                                    <div class="px-3 py-2">
                                                        <div class="mt-1">
                                                            <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 32%</span>
                                                        </div>
                                                        <div class="my-1">
                                                            <h2 class="fw-bold text-blue-zodiac-950 m-0">$15,95 <small class="fw-medium fs-5">/mes</small></h2>
                                                            <small class="text-muted text-decoration-line-through text-xs">PVP: $280</small>
                                                        </div>
                                                    </div>
                                                    <hr class="my-1">
                                                    <div class="card-body p-3">
                                                        <h6 class="fw-bold">Beneficios</h6>
                                                        <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                                                <span>8 consultas al año<br><small>2 consulta por trimestre</small></span>
                                                            </li>
                                                            <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                3 Profilaxis
                                                            </li>
                                                            <li class="d-flex align-items-start fs-14p lh-sm">
                                                                <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                                                Consulta Optométrica<br>y Odontológica
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer p-0 text-center">
                                                        <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Cambiar ahora</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="swiper-button-next mt-n5 me-n2 me-lg-n3 box-shadow-2 d-none"></div>
                                    <div class="swiper-button-prev mt-n5 ms-n2 ms-lg-n3 box-shadow-2 d-none"></div>
                                    <div class="swiper-pagination position-absolute bottom-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-outline-cerulean-blue-800 mx-auto" data-bs-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex-grow-1 container-p-y">
    <section class="mb-4 p-3">
        <div class="row justify-content-center">
            <div class="col-12 mb-4 text-end">
                <button type="button" class="btn btn-blue-veris fw-medium fs-14p shadow-none" data-bs-toggle="modal" data-bs-target="#addBeneficiaryModal">
                    <i class="fa-solid fa-plus me-2"></i> Añadir usuario
                </button>
                <label for="excelFile" class="btn btn-outline-blue-veris fw-medium fs-14p shadow-none" style="cursor: pointer;">
                    <i class="fa-solid fa-users me-2"></i> 
                    <small>Carga masiva de usuarios</small>
                    <input type="file" id="excelFile" name="excelFile" accept=".xls, .xlsx" hidden />
                </label>
                <button download="Plantilla" class="btn text-primary-veris fw-medium shadow-none btn-plantilla">
                    <i class="fa-solid fa-download me-2"></i> 
                    Descargar formato
                </button>
            </div>
            <div class="col-12 mb-4">
                <div class="card shadow-none mb-4">
                    <div class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start gap-4 mb-2 mb-md-0">
                                <div class="input-group">
                                    <span class="input-group-text bg-wild-sand-50 border-end-0 border-0"><i class="ti ti-search"></i></span>
                                    <input type="text" class="form-control form-control-lg fs-14p bg-wild-sand-50 border-start-0 border-0 py-3" placeholder="Apellidos/identificación" aria-label="Buscar">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 justify-content-end">
                                <div class="row justify-content-end">
                                    <div class="col-12 col-lg-6">
                                        <select class="form-select form-select-lg fs-14p" id="grupo" name="grupo" required>
                                            <option value="" selected disabled>Todas las opciones</option>
                                            <option value="">Opcion 1</option>
                                            <option value="">Opcion 2</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <button type="button" class="btn btn-lg btn-blue-veris fw-medium fs-14p shadow-none w-100" data-bs-toggle="modal" data-bs-target="#improveBeneficiaryModal"><i class="fa-solid fa-rocket me-2"></i> Mejora tus beneficios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center" style="width: 50px;"></th>
                                    <th class="text-center">Identificación</th>
                                    <th class="text-center">Nombre y Apellido</th>
                                    <th class="text-center">Teléfono móvil</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Fecha de nacimiento</th>
                                    <th class="text-center">Veris Care</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="contenido-pacientes">
                                <!-- <tr>
                                    <td class="text-nowrap align-middle text-center">
                                        <div class="form-check d-flex justify-content-center align-items-center me-1">
                                            <input class="form-check-input mx-auto" type="checkbox" />
                                        </div>
                                    </td>
                                    <td class="text-center">0999999999</td>
                                    <td class="text-center">Juan Perez</td>
                                    <td class="text-center">0777777777</td>
                                    <td class="text-center">usuariovbe@mail.com</td>
                                    <td class="text-center">15/12/1992</td>
                                    <td class="text-center">Veris Care</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm text-malachite-600 shadow-none px-2"><i class="fa-solid fa-pen"></i></button>
                                        <button type="button" class="btn btn-sm text-grenadier-600 shadow-none px-2"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr> -->
                                <tr id="empty-space">
                                    <td colspan="8">
                                        <div class="text-center">
                                            <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/images/illustration/veris/connecting-teams-amico.svg" alt="sin registro">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row align-items-center justify-content-center justify-content-lg-between py-3 px-5 fs-9 box-pagination d-none">
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
                <div class="d-flex gap-3 justify-content-center">
                    <a href="/portal-fidelizacion/verificacion-plan/{{ $params }}" class="btn btn-outline-cerulean-blue-800"><i class="fa-solid fa-chevron-left me-2"></i> Regresar</a>
                    <button type="button" class="btn btn-cerulean-blue-800" disabled id="btn-continuar">Continuar <i class="fa-solid fa-chevron-right ms-2"></i></button>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
@push('scripts')
<script>
    const detalleSuscripcion = JSON.parse(localStorage.getItem('suscripcion-{{ $params }}'));
    let finalFile = null;
    let pacientes = [];
    document.addEventListener('DOMContentLoaded', async () => {

        if(detalleSuscripcion.hasOwnProperty('pacientes')){
            pacientes = detalleSuscripcion.pacientes;
            fillRegistros();
        }

        $('body').on('click', '.btn-plantilla', async function(){
            await descargarPlantilla();
        })

        $('body').on('click', '.link-documento', async function(){
            let nemonico = $(this).attr('nemonico-rel');
            await cargarDocumento(nemonico);
        })

        $('body').on('click', '.btn-editar-paciente', async function(){
            let paciente = JSON.parse($(this).attr('data-rel'));
            await fillPaciente(paciente);
        })

        $('body').on('click', '.btn-eliminar-paciente', async function(){
            let keyAEliminar = parseInt($(this).attr('paciente-rel'));
            delete pacientes[keyAEliminar];
            fillRegistros();
        })

        $('body').on('click', '#btn-continuar', async function(){
            detalleSuscripcion.pacientes = pacientes;
            localStorage.setItem(`suscripcion-{{ $params }}`, JSON.stringify(detalleSuscripcion));
            location.href = `/portal-fidelizacion/facturacion/{{ $params }}`;
        })

        $('body').on('change', '#terms, #privacy', function(){
            if($('#terms').is(':checked') && $('#privacy').is(':checked')) {
                $('#btn-add').attr('disabled', false);
            } else {
                $('#btn-add').attr('disabled', true);
            }
        });

        $('body').on('click', '#btn-add', async function(){
            let tipoIdentificacionPcte = $('#tipoIdentificacion option:selected').html().toUpperCase();
            let codigoTipoIdentificacionPcte = $('#tipoIdentificacion option:selected').val();
            let numeroIdentificacionPcte = $('#numeroIdentificacion').val();
            let primerNombre = $('#primerNombre').val().toUpperCase();
            // let segundoNombre = $('#segundoNombre').val().toUpperCase();
            let primerApellido = $('#primerApellido').val().toUpperCase();
            // let segundoApellido = $('#segundoApellido').val().toUpperCase();
            let genero = $('#genero option:selected').val();
            
            let fechaNacimiento = $('#fechaNacimiento').val();
            let dateObj = new Date(fechaNacimiento);
            // Obtener día, mes y año
            let dia = String(dateObj.getDate()).padStart(2, '0'); // Asegura 2 dígitos
            let mes = String(dateObj.getMonth() + 1).padStart(2, '0'); // +1 porque los meses van de 0 a 11
            let anio = dateObj.getFullYear();
            // Formatear a dd/mm/yyyy
            let fechaFormateada = `${dia}/${mes}/${anio}`;

            // let codigoEstadoCivil = $('#estadoCivil option:selected').val();
            // let estadoCivil = $('#estadoCivil option:selected').val().toUpperCase();
            // let direccion = $('#direccion').val().toUpperCase();
            // let codigoSector = $('#sector option:selected').val();
            // let sector = $('#sector option:selected').html().toUpperCase();
            // let numeroContratoAfiliado = $('#numeroContratoAfiliado').val();
            // let codigoTipoParentesco = $('#parentesco option:selected').val();
            // let nombreTipoParentesco = $('#parentesco option:selected').html();
            // let telefonoFijo = $('#telefonoFijo').val();
            let telefonoMovil = $('#telefonoMovil').val();
            let email = $('#email').val();
            let terms = $('#terms').val();
            let privacy = $('#privacy').val();

            pacientes.push({
                "codigoTipoIdentificacionPcte": codigoTipoIdentificacionPcte,
                "numeroIdentificacionPcte": numeroIdentificacionPcte,
                "primerApellido": primerApellido,
                // "segundoApellido": segundoApellido,
                "primerNombre": primerNombre,
                // "segundoNombre": segundoNombre,
                "genero": genero,
                // "codigoEstadoCivil": codigoEstadoCivil,
                "fechaNacimiento": fechaFormateada,
                // "direccion": direccion,
                "mail": email,
                // "codigoSector": codigoSector,
                // "telefonoFijo": telefonoFijo,
                "telefonoMovil": telefonoMovil,
                "codigoRegion": 1,
                "codigoCiudad": 1,
                "codigoPais": 1,
                "codigoProvincia": 1,
                // "numeroContrato": numeroContratoAfiliado,
                "titularDependiente": "T",
                // "codigoTipoParentesco": codigoTipoParentesco,
                "codigoConvenio": detalleSuscripcion.detallePlan.codigoConvenio,
                "titularOtroContrato": null,
                "yaEsTitularContrato": null,
                "fechaInicioContrato": "{{ $now->format('d/m/Y') }}",
                "fechaFinContrato": "{{ $nextYear->format('d/m/Y') }}",
                "tipoIdentificacionPcte": tipoIdentificacionPcte,
                // "nombreTipoParentesco": nombreTipoParentesco,
                // "estadoCivil": estadoCivil,
                // "abreviaturaEstadoCivil": estadoCivil.charAt(0),
                // "sector": sector,
                // "regio   n": "COSTA",
                "observacionesError": null
            })

            fillRegistros();
            $('#addBeneficiaryModal').modal('hide')
        })

        $('#excelFile').on('change', async function (e) {
            finalFile = e.target.files[0];
            if (!finalFile) return;

            // Opcional: validar tipo y tamaño
            if (!finalFile.name.match(/\.(xls|xlsx)$/)) {
                alert("Por favor selecciona un archivo Excel válido.");
                return;
            }

            // Aquí llamas a la función que sube el archivo
            await subirPlantilla();
        });

        await cargarTiposIdentificacion();
        await cargarEstadoCivil();
        await cargarTiposParentesco();
        await cargarSectores();
    })

    function fillPaciente(paciente){
        $('#tipoIdentificacion').val(paciente.codigoTipoIdentificacionPcte)
        $('#numeroIdentificacion').val(paciente.numeroIdentificacionPcte)
        $('#primerNombre').val(paciente.primerNombre)
        $('#segundoNombre').val(paciente.segundoNombre)
        $('#primerApellido').val(paciente.primerApellido)
        $('#segundoApellido').val(paciente.segundoApellido)
        $('#genero').val(paciente.genero)

        var partes = paciente.fechaNacimiento.split("/"); // ["09", "06", "2025"]
        var fechaFormateada = partes[2] + "-" + partes[1] + "-" + partes[0]; // "2025-06-09"

        $('#fechaNacimiento').val(fechaFormateada)
        $('#estadoCivil').val(paciente.codigoEstadoCivil)
        $('#direccion').val(paciente.direccion)
        $('#sector').val(paciente.codigoSector)
        $('#numeroContratoAfiliado').val(paciente.numeroContrato)
        $('#parentesco').val(paciente.codigoTipoParentesco)
        $('#telefonoFijo').val(paciente.telefonoFijo)
        $('#telefonoMovil').val(paciente.telefonoMovil)
        $('#email').val(paciente.mail)
    }

    function fillRegistros(){
        //Validar si esta vacio
        let elem = ``;
        $('#empty-space').remove();
        $('#btn-continuar').attr('disabled', false);
        $('.box-pagination').removeClass('d-none');
        $.each(pacientes, function(key, value){
            elem += `<tr id="paciente-${key}">
                <td class="text-nowrap align-middle text-center">
                    <div class="form-check d-flex justify-content-center align-items-center me-1">
                        <input class="form-check-input mx-auto" type="checkbox" />
                    </div>
                </td>
                <td class="text-center">${value.numeroIdentificacionPcte}</td>
                <td class="text-center">${ value.primerApellido ?? '' } ${ value.segundoApellido ?? '' } ${ value.primerNombre ?? '' } ${ value.segundoNombre ?? '' }</td>
                <td class="text-center">${value.telefonoMovil}</td>
                <td class="text-center">${value.mail}</td>
                <td class="text-center">${value.fechaNacimiento}</td>
                <td class="text-center"></td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm text-malachite-600 shadow-none btn-editar-paciente px-2" data-rel='${JSON.stringify(value)}' paciente-rel="${key}" data-bs-toggle="modal" data-bs-target="#addBeneficiaryModal">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="btn btn-sm text-grenadier-600 shadow-none btn-eliminar-paciente px-2" paciente-rel="${key}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>`
        })
        $('#contenido-pacientes').html(elem)
    }

    async function cargarTiposIdentificacion() {
        const baseUrl = `${api_url}/general/v1/tipos_identificacion`;
        const queryParams = new URLSearchParams({
            codigoEmpresa: '1',
            usoTipoIdentificacion: 'GESTION_FACTURACION'
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: false,
        });

        let elem = `<option value="" selected disabled>Seleccionar</option>`;
        response.data.forEach(item => {
            elem += `<option data-rel='${JSON.stringify(item)}' class="text-capitalize" value="${item.codigoTipoIdentificacion}">${item.nombreTipoIdentificacion.toLowerCase()}</option>`
        });
        $('#tipoIdentificacion').html(elem);
    }

    async function cargarEstadoCivil() {
        const baseUrl = `${api_url}/general/v1/estado_civil`;
        const queryParams = new URLSearchParams({
            codigoEmpresa: '1'
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: false,
        });

        let elem = `<option value="" selected disabled>Selecciona un género</option>`;
        response.data.forEach(item => {
            elem += `<option class="text-capitalize" value="${item.codigoEstadoCivil}">${item.nombreEstadoCivil.toLowerCase()}</option>`
        });
        $('#estadoCivil').html(elem);
    }

    async function cargarTiposParentesco() {
        const baseUrl = `${api_url}/general/v1/tipos_parentesco`;
        const queryParams = new URLSearchParams({
            usoTipoParentesco: 'TODOS'
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: false,
        });

        let elem = `<option value="" selected disabled>Selecciona un género</option>`;
        response.data.forEach(item => {
            elem += `<option class="text-capitalize" value="${item.codigoTipoParentesco}">${item.nombreTipoParentesco.toLowerCase()}</option>`
        });
        $('#parentesco').html(elem);
    }

    async function cargarSectores() {
        const baseUrl = `${api_url}/general/v1/sectores_cardinales`;
        const queryParams = new URLSearchParams({
            usoTipoParentesco: 'TODOS'
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: false,
        });

        let elem = `<option value="" selected disabled>Selecciona un sector</option>`;
        response.data.forEach(item => {
            elem += `<option class="text-capitalize" value="${item.codigoSector}">${item.nombreSector.toLowerCase()}</option>`
        });
        $('#sector').html(elem);
    }

    async function subirPlantilla(){
        const formData = new FormData();
        formData.append("file", finalFile);

        let args = [];
        args["endpoint"] = `${api_url}/comercial/v1/afiliados/carga_archivo_afiliados?codigoPais=1&codigoProvincia=1&codigoCiudad=1&tipoCredito=CREDITO_SERVICIOS&codigoConvenio=${detalleSuscripcion.detallePlan.codigoConvenio}`;
        args["method"] = "POST";
        args["token"] = _token;
        args["showLoader"] = true;
        args["data"] = formData;
        args["bodyType"] = "formdata";

        try {
            const data = await call(args);
            console.log(data);
            if (data.code == 200) {
                if(data.data.cargaErronea){
                    const base64 = data.data.binarioCargaErronea;
                    const nombreArchivo = 'errores_carga.xlsx';
                    const byteCharacters = atob(base64);
                    const byteNumbers = new Array(byteCharacters.length);
                    for (let i = 0; i < byteCharacters.length; i++) {
                        byteNumbers[i] = byteCharacters.charCodeAt(i);
                    }
                    const byteArray = new Uint8Array(byteNumbers);
                    const blob = new Blob([byteArray], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });

                    // Crear link de descarga
                    const link = document.createElement('a');
                    link.href = URL.createObjectURL(blob);
                    link.download = nombreArchivo;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                }else{
                    //procesar y dibujar en la tabla
                    $.each(data.data.rows, function(key, value){
                        pacientes.push(value);
                    });
                    fillRegistros()

                    /*let elem = ``;
                    $('#empty-space').remove();
                    $('#btn-continuar').attr('disabled', false);
                    $('.box-pagination').removeClass('d-none');
                    $.each(data.data.rows, function(key, value){
                        pacientes.push(value);
                        elem += `<tr id="paciente-${key}">
                            <td>${value.numeroIdentificacionPcte}</td>
                            <td>${value.primerApellido} ${value.segundoApellido} ${value.primerNombre} ${value.segundoNombre}</td>
                            <td>${value.telefonoMovil}</td>
                            <td>${value.mail}</td>
                            <td>${value.fechaNacimiento}</td>
                            <td>
                                <button type="button" class="btn btn-sm text-aquamarine-300 shadow-none btn-editar-paciente" data-rel='${JSON.stringify(value)}' paciente-rel="${key}" data-bs-toggle="modal" data-bs-target="#addBeneficiaryModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="btn btn-sm text-rose-bud-300 shadow-none btn-eliminar-paciente" paciente-rel="${key}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>`
                    })
                    $('#contenido-pacientes').html(elem)*/
                }
                return data;
            } else {
                console.log("Error en respuesta:", data);
            }
        } catch (error) {
            console.error("Error en uploadFile:", error);
        }
    }

    async function descargarPlantilla(){
        let args = [];
        args["endpoint"] = `${api_url}/comercial/v1/afiliados/plantilla_afiliados?tipoCredito=CREDITO_SERVICIOS`;
        args["method"] = "GET";
        args["showLoader"] = true;
        args["token"] = _token;
        try {
            const blob = await callDocumento(args);
            const pdfUrl = URL.createObjectURL(blob);
            window.open(pdfUrl, '_blank');
            setTimeout(() => {
                URL.revokeObjectURL(pdfUrl);
            }, 100);
        } catch (error) {
            console.error('Error al obtener el PDF:', error);
        }
    }

</script>
@endpush