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

<div class="modal fade" id="addBeneficiaryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addBeneficiaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-simple modal-dialog-centered">
        <div class="modal-content p-3 py-md-4 px-md-4">
            <div class="modal-body p-0">
                <div id="addBeneficiaryForm" class="pt-3">
                    <h5 class="fw-semibold">Registrar dependiente</h5>
                    <hr>
                    <div class="row g-3 justify-content-center">
                        <input type="hidden" id="idPersonaRegistro" autocomplete="off"/>
                        <input type="hidden" id="secuenciaAfiliado" autocomplete="off"/>
                        <input type="hidden" id="codigoEstadoCivil" autocomplete="off"/>
                        <input type="hidden" id="estadoCivil" autocomplete="off"/>
                        <div class="col-12 col-md-10">
                            <label for="tipoIdentificacion" class="form-label fs-14p fw-medium">Tipo de documento <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p text-capitalize" id="tipoIdentificacion" name="tipoIdentificacion" autocomplete="off" required>
                                <option value="" selected disabled>Selecciona el tipo de identificación</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-10">
                            <label for="numeroIdentificacion" class="form-label fs-14p fw-medium">Número de identificación <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="numeroIdentificacion" name="numeroIdentificacion" placeholder="Número de identificación" autocomplete="off" required />
                        </div>
                        <div class="col-12 col-md-10 d-none" id="nombre-col">
                            <label for="primerNombre" class="form-label fs-14p fw-medium">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="primerNombre" name="primerNombre" placeholder="Ingresa tu nombre" required />
                        </div>
                        <!-- <div class="col-12 col-md-10">
                            <label for="segundoNombre" class="form-label fs-14p fw-medium d-flex justify-content-between">Segundo nombre <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="segundoNombre" name="segundoNombre" placeholder="Segundo nombre">
                        </div> -->
                        <div class="col-12 col-md-10 d-none" id="apellido-col">
                            <label for="primerApellido" class="form-label fs-14p fw-medium">Primer apellido <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="primerApellido" name="primerApellido" placeholder="Ingresa tu primer apellido" required />
                        </div>
                        <div class="col-12 col-md-10 d-none" id="sapellido-col">
                            <label for="segundoApellido" class="form-label fs-14p fw-medium d-flex justify-content-between">Segundo apellido <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="segundoApellido" name="segundoApellido" placeholder="Segundo apellido">
                        </div>
                        <div class="col-12 col-md-10 d-none" id="fecha-col">
                            <label for="fechaNacimiento" class="form-label fs-14p fw-medium">Fecha de nacimiento <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-lg fs-14p" id="fechaNacimiento" name="fechaNacimiento" required />
                        </div>
                        <div class="col-12 col-md-10 d-none" id="genero-col">
                            <label for="genero" class="form-label fs-14p fw-medium">Género <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p" id="genero" name="genero" required>
                                <option value="" selected disabled>Elige el genero del paciente</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <!-- <div class="col-12 col-md-10">
                            <label for="parentesco" class="form-label fs-14p fw-medium">Parentesco <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p text-capitalize" id="parentesco" name="parentesco" required>
                                <option value="" selected disabled>Selecciona una opción</option>
                            </select>
                        </div> -->
                        <!-- <div class="col-12 col-md-10">
                            <label for="estadoCivil" class="form-label fs-14p fw-medium">Estado Civil <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fs-14p text-capitalize" id="estadoCivil" name="estadoCivil" required>
                                <option value="" selected disabled>Selecciona estado civil</option>
                            </select>
                        </div> -->
                        <!-- <div class="col-md-12">
                            <label for="direccion" class="form-label fs-14p fw-medium d-flex justify-content-between">Dirección <small class="text-muted fs-12p">(Opcional)</small></label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="direccion" name="direccion" placeholder="Ingresa la dirección">
                        </div> -->
                        <!-- <div class="col-12 col-md-10">
                            <label for="sector" class="form-label fs-14p fw-medium d-flex justify-content-between">Sector <small class="text-muted fs-12p">(Opcional)</small></label>
                            <select class="form-select form-select-lg fs-14p text-capitalize" id="sector" name="sector" required>
                            </select>
                        </div> -->
                        <!-- <div class="col-12 col-md-10">
                            <label for="numeroContratoAfiliado" class="form-label fs-14p fw-medium">Número de contrato afiliado</label>
                            <input type="text" class="form-control form-control-lg fs-14p" id="numeroContratoAfiliado" name="numeroContratoAfiliado" placeholder="Número de contrato">
                        </div> -->
                        <div class="col-12 col-md-10 d-none" id="email-col">
                            <label for="email" class="form-label fs-14p fw-medium">Correo <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-lg fs-14p" id="email" name="email" placeholder="Ingresa el correo electrónico"/>
                        </div>
                        <div class="col-12 col-md-10 d-none" id="telefono-col">
                            <label for="telefonoMovil" class="form-label fs-14p fw-medium">Celular <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control form-control-lg fs-14p" id="telefonoMovil" name="telefonoMovil" placeholder="Ingresa el número celular"/>
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
                        <div class="row g-3 justify-content-center">
                            <div class="col-12 col-md-10 d-none" id="terms-col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label fs-10p" for="terms">
                                        Acepto <a href="#!" class="text-mariner-600 text-decoration-underline link-documento" nemonico-rel="TERMINOS_CONDICIONES">Términos y Condiciones</a> <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-10 d-none" id="privacy-col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy" name="privacy">
                                    <label class="form-check-label fs-10p">
                                        He leído y comprendo la autorización para el <a href="https://www.veris.com.ec/politicas/" target="_blank" class="text-mariner-600 text-decoration-underline" nemonico-rel="TRATAMIENTO_DATOS">Tratamiento de mis datos personales</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="modal-footer justify-content-center border-0 p-0">
                        <button type="button" class="btn btn-outline-cerulean-blue-800" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-cerulean-blue-800" id="btn-add">Validar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

<div class="modal fade" id="successfullyUploadMasivedModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successfullyUploadMasivedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <h3 class="text-primary-veris fw-medium title-qty-masivo"></h3>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/success-ok.svg" />
                <div class="text-center">
                    <button type="button" class="btn btn-cerulean-blue-800 text-nowrap fs-14p" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successfullyAddedModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successfullyAddedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center p-3">
                <h4 class="text-blue-zodiac-950 fw-bold">Beneficiario agregado con éxito.</h4>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/success-ok.svg" />
                <h5 class="text-blue-zodiac-950 fw-bold">¿Deseas añadir un nuevo beneficiario?</h5>
                <div class="d-flex gap-3">
                    <button type="button" class="btn btn-cerulean-blue-800 text-nowrap fs-14p col" data-bs-toggle="modal" data-bs-target="#addBeneficiaryModal">Añadir nuevo</button>
                    <button type="button" class="btn btn-outline-cerulean-blue-800 text-nowrap fs-14p" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successfullyUpdatedModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successfullyUpdatedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <h3 class="text-primary-veris fw-medium">Actualización exitosa</h3>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/success-ok.svg" />
                <h5 class="text-blue-zodiac-950 fw-bold">Has cambiado a <b class="number-collaborator">3</b> colaboradores a la opción Bienestar</h5>
                <div class="text-center">
                    <button type="button" class="btn btn-cerulean-blue-800 text-nowrap fs-14p" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteCollaboratorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteCollaboratorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <h5 class="text-blue-zodiac-950 text-center fw-bold">¿Estás seguro de que deseas borrar este colaborador?</h5>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/man-thinking.svg" />
                <h6 class="text-blue-zodiac-950 text-center fw-bold">¿Cúal es el motivo principal para eliminar a este colaborador?</h6>
                <div class="text-start d-flex flex-column gap-2 mb-4" id="contentMotivosInactivacion"></div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-cerulean-blue-800 text-nowrap fs-14p col" id="btnDeleteCollaborador">Borrar colaborador</button>
                    <button type="button" class="btn btn-outline-cerulean-blue-800 text-nowrap fs-14p" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="collaboratorSuccessRemovedModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="collaboratorSuccessRemovedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered mx-auto">
        <div class="modal-content">
            <div class="modal-body text-center px-5 py-4">
                <h6 class="text-blue-zodiac-950 text-center fw-bold">El colaborador ha sido borrado con éxito</h6>
                <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/svg/advantages.svg" class="mb-3"/>
                <div class="text-center">
                    <button type="button" class="btn btn-cerulean-blue-800 text-nowrap fs-14p" data-bs-dismiss="modal">Cerrar</button>
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
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-perano-300 border-2 shadow-none">
                            <div class="card-body p-3">
                                <h5 class="fw-semibodl" id="nombrePlanActual">Esencial</h5>
                                <div class="mt-1">
                                    <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" id="descuentoPlanaAtual" style="font-size: 0.625rem;">AHORRA 36%</span>
                                </div>
                                <div class="my-1">
                                    <h5 class="fw-semibold text-blue-zodiac-950 m-0" >
                                        $<span id="precioFinalPlanActual">90,00</span>
                                        <small class="fw-normal fs-12p">/anual</small>
                                    </h5>
                                    <small class="text-muted text-decoration-line-through text-xs">
                                        PVP: $<span id="precioPlanActual">140</span>
                                    </small>
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
                                    <div class="swiper my-swiper pb-4" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 3 }}'>
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

                                        </div>
                                    </div>
                                    <div class="swiper-button-next mt-n5 me-n2 me-lg-n3 box-shadow-2 d-none"></div>
                                    <div class="swiper-button-prev mt-n5 ms-n2 ms-lg-n3 box-shadow-2 d-none"></div>
                                    <div class="swiper-pagination position-absolute bottom-0"></div>
                                </div>
                                <div class="content-message text-center d-none" id="empty-space-planes-anual">
                                    <h4 class="text-primary-veris">No hay planes disponibles en esta categoría.</h4>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-mensual-veris" role="tabpanel" aria-labelledby="pills-mensual-veris-tab" tabindex="0">
                            <div class="row g-3">
                                <div class="slider-mensual position-relative">
                                    <div class="swiper my-swiper pb-4" data-slides-per-view="1" data-autoplay='{"delay": 2500,"disableOnInteraction": false}' data-has-navigation="true" data-breakpoints='{"360": { "slidesPerView": 1.2 },"640": { "slidesPerView": 2 },"1024": { "slidesPerView": 3 },"1280": { "slidesPerView": 3 }}'>
                                        <div class="swiper-wrapper" id="planesVerisMensual">

                                            <!-- <div class="swiper-slide">
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
                                            </div> -->

                                        </div>
                                    </div>
                                    <div class="swiper-button-next mt-n5 me-n2 me-lg-n3 box-shadow-2 d-none"></div>
                                    <div class="swiper-button-prev mt-n5 ms-n2 ms-lg-n3 box-shadow-2 d-none"></div>
                                    <div class="swiper-pagination position-absolute bottom-0"></div>
                                </div>
                                <div class="content-message text-center d-none" id="empty-space-planes-mensual">
                                    <h4 class="text-primary-veris">No hay planes disponibles en esta categoría.</h4>
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
        <div class="row g-3 justify-content-center">
            <div class="col-12 mb-4 text-end">
                <button type="button" class="btn btn-blue-veris fw-medium fs-14p shadow-none mb-3" data-bs-toggle="modal" data-bs-target="#addBeneficiaryModal">
                    <i class="fa-solid fa-plus me-2"></i> Añadir usuario
                </button>
                <label for="excelFile" class="btn btn-outline-blue-veris fw-medium fs-14p shadow-none mb-3" style="cursor: pointer;">
                    <i class="fa-solid fa-users me-2"></i> 
                    <small>Carga masiva de usuarios</small>
                    <input type="file" id="excelFile" name="excelFile" accept=".xls, .xlsx" hidden />
                </label>
                <button download="Plantilla" class="btn text-primary-veris fw-medium shadow-none btn-plantilla mb-3">
                    <i class="fa-solid fa-download me-2"></i> 
                    Descargar formato
                </button>
            </div>
            <div class="col-12 mb-4">
                <div class="card shadow-none mb-4">
                    <div class="card-header">
                        <div class="row g-3 align-items-center justify-content-between">
                            <div class="col-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start gap-4 mb-2 mb-md-0">
                                <div class="input-group">
                                    <span class="input-group-text bg-wild-sand-50 border-end-0 border-0"><i class="ti ti-search"></i></span>
                                    <input type="search" class="form-control form-control-lg fs-14p bg-wild-sand-50 border-start-0 border-0 py-3" id="valorFiltro" placeholder="Apellidos/identificación" aria-label="Buscar">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 justify-content-end d-none box-options">
                                <div class="row g-3 justify-content-end">
                                    <div class="col-12 col-lg-6">
                                        <select class="form-select form-select-lg fs-14p" id="tipoFiltro" name="tipoFiltro" required>
                                            <option value="" selected disabled>Todas las opciones</option>
                                            <option value="identificacion">Identificación</option>
                                            <option value="nombreAfiliado">Nombre de Afiliado</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <button type="button" class="btn btn-lg btn-blue-veris fw-medium fs-14p shadow-none w-100 filter-grayscale" disabled data-bs-toggle="modal" data-bs-target="#improveBeneficiaryModal"><i class="fa-solid fa-rocket me-2"></i> Mejora tus beneficios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap" id="registros">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center item-action" style="width: 50px;"></th>
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
                                        <button type="button" class="btn btn-sm text-grenadier-600 shadow-none px-2" data-bs-toggle="modal" data-bs-target="#deleteCollaboratorModal"><i class="fa-solid fa-trash"></i></button>
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
                    <div class="row align-items-center py-3 px-3 px-lg-5 fs-9 box-pagination d-none">
                        <div class="col-6 col-md-5 text-start mb-2 mb-md-0">
                            <p class="mb-0 me-3 fs-10p text-body" data-list-info="data-list-info"></p>
                        </div>
                        <div class="col-6 col-md-7 d-flex justify-content-start">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm ms-lg-5 mb-0"></ul>
                            </nav>
                        </div>
                    </div>

                </div>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="javascript:history.back()" class="btn btn-outline-cerulean-blue-800"><i class="fa-solid fa-chevron-left me-2"></i> Regresar</a>
                    <button type="button" class="btn btn-cerulean-blue-800" disabled id="btn-continuar">Continuar <i class="fa-solid fa-chevron-right ms-2"></i></button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('scripts')
<script>
    const uploadedModal = new bootstrap.Modal(document.getElementById('uploadedModal'));
    const successModal = new bootstrap.Modal(document.getElementById('successfullyAddedModal'));
    const collaboratorSuccessRemovedModal = new bootstrap.Modal(document.getElementById('collaboratorSuccessRemovedModal'));
    const detalleSuscripcion = JSON.parse(localStorage.getItem('suscripcion-{{ $params }}'));
    const btnDeleteCollaborador = document.getElementById('btnDeleteCollaborador');

    let finalFile = null;
    let validado = false;
    let pacientes = [];
    let pacientesAgregados = [];
    let page = 1;
    let perPage = 7;
    let trDelete = null;
    let pacienteExistente = false

    document.addEventListener('DOMContentLoaded', async () => {

        if(detalleSuscripcion.hasOwnProperty('origen') && detalleSuscripcion.origen == "suscripcion"){
            $('.item-action').addClass('d-none')
        }else if(detalleSuscripcion.hasOwnProperty('origen') && detalleSuscripcion.origen == "edicion"){
            $('.box-options').removeClass('d-none')
            await cargarAfiliados();
        }

        if(detalleSuscripcion.hasOwnProperty('pacientes')){
            pacientes = detalleSuscripcion.pacientes;
            fillRegistros();
        }

        $("#valorFiltro").on("input", function() {
            var valor = $(this).val().toLowerCase().trim();
            
            $("#registros tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1 || valor === "");
            });
        });

        $('body').on('click', '.btn-pagination-page', function (e) {
            e.preventDefault();

            const targetPage = parseInt($(this).data('page'));
            const totalPages = Math.ceil(pacientes.filter(p => p.activo).length / perPage);

            if (!isNaN(targetPage) && targetPage >= 1 && targetPage <= totalPages && targetPage !== page) {
                page = targetPage;
                fillRegistros();

                const pacientesActivos = pacientes.filter(p => p.activo);
                drawPaginationAfiliados({ totalRows: pacientesActivos.length }, page);
            }
        });

        $('body').on('click', '.btn-mejorar-plan', async function(){
            let planNuevo = JSON.parse($(this).attr('data-rel'));
            let beneficiarios = [];
            $('.item-beneficiario:checked').each(function(index) {
                let beneficiario = JSON.parse($(this).attr('data-rel'));
                beneficiarios.push(beneficiario);
            });
            detalleSuscripcion.origen = "mejora";
            detalleSuscripcion.detallePlanOriginal = detalleSuscripcion.detallePlan;
            detalleSuscripcion.detallePlan = planNuevo;
            detalleSuscripcion.pacientes = beneficiarios;
            localStorage.setItem(`suscripcion-{{ $params }}`, JSON.stringify(detalleSuscripcion));
            location.href = `/portal-fidelizacion/facturacion/{{ $params }}`;
        });

        $('body').on('click', '.btn-plantilla', async function(){
            await descargarPlantilla();
        });

        $('body').on('click', '.link-documento', async function(){
            let nemonico = $(this).attr('nemonico-rel');
            await cargarDocumento(nemonico);
        });

        $('body').on('change', '#contenido-pacientes .form-check-input', function () {
            actualizarEstadoBotonesAccion();
        });

        $('body').on('click', '.btn-editar-paciente', async function(){
            let paciente = JSON.parse($(this).attr('data-rel'));
            validado = true;
            mostrarCamposAdicionales();
            await fillPaciente(paciente);
            $('#btn-add').text('Actualizar').attr('disabled', false);
        });

        $('body').on('click', '.btn-eliminar-paciente', async function(){
            let keyAEliminar = parseInt($(this).attr('paciente-rel'));
            trDelete = keyAEliminar;
            console.log(keyAEliminar);
            // delete pacientes[keyAEliminar];
            // pacientes.splice(keyAEliminar, 1);
            fillRegistros();
        });

        $('body').on('click', '#btn-continuar', async function(){
            if(detalleSuscripcion.hasOwnProperty('origen') && detalleSuscripcion.origen == "suscripcion"){
                detalleSuscripcion.pacientes = pacientes;
                localStorage.setItem(`suscripcion-{{ $params }}`, JSON.stringify(detalleSuscripcion));
                location.href = `/portal-fidelizacion/facturacion/{{ $params }}`;
            }else if(detalleSuscripcion.hasOwnProperty('origen') && detalleSuscripcion.origen == "edicion"){
                await cargaAfiliadosSuscripcion();
            }
        });

        $('body').on('change', '#terms, #privacy', function(){
            if($('#terms').is(':checked') && $('#privacy').is(':checked')) {
                $('#btn-add').attr('disabled', false);
            } else {
                $('#btn-add').attr('disabled', true);
            }
        });

        $('body').on('click', '#btn-add', async function () {
            if (!validado) {
                const fueValidado = await validarIdentidad();
                if (!fueValidado) return;
                mostrarCamposAdicionales();
                $('#btn-add').text('Agregar').attr('disabled', true);
            } else {
                if(pacienteExistente){
                    return;
                }
                let idPersonaRegistro = $('#idPersonaRegistro').val();
                let secuenciaAfiliado = $('#secuenciaAfiliado').val();
                console.log(idPersonaRegistro);
                
                if(idPersonaRegistro === ""){
                    agregarPaciente();
                } else {
                    actualizarPaciente(idPersonaRegistro);
                    fillRegistros();
                    $('#addBeneficiaryModal').modal('hide');
                }
            }
        });

        $('#excelFile').on('change', async function (e) {
            finalFile = e.target.files[0];
            if (!finalFile) return;

            // Opcional: validar tipo y tamaño
            if (!finalFile.name.match(/\.(xls|xlsx)$/)) {
                showMessage('warning','Atención',"Por favor selecciona un archivo Excel válido.");
                return;
            }

            // Aquí llamas a la función que sube el archivo
            await subirPlantilla();
        });

        $('#addBeneficiaryModal').on('show.bs.modal', function () {
            validado = false;

            $('#tipoIdentificacion').prop('disabled', false);
            $('#numeroIdentificacion').prop('readonly', false);
            $('#numeroIdentificacion').val('');
            $('#tipoIdentificacion').val('');

            $('#nombre-col, #apellido-col, #sapellido-col, #fecha-col, #genero-col, #email-col, #telefono-col, #terms-col, #privacy-col')
                .addClass('d-none');

            $('#btn-add').text('Validar').attr('disabled', false);

            $('#primerNombre, #primerApellido, #fechaNacimiento, #telefonoMovil, #email').val('');
            $('#genero').val('');

            $('#privacy').prop('checked', false);
            $('#terms').prop('checked', false);
        });

        $('#addBeneficiaryModal').on('hidden.bs.modal', function () {
            $('#addBeneficiaryForm input, #addBeneficiaryForm select').val('');
            $('#tipoIdentificacion').prop('disabled', false);
            $('#numeroIdentificacion').prop('readonly', false);
            $('#idPersonaRegistro').val('');
            $('#secuenciaAfiliado').val('');

            validado = false;
        })

        btnDeleteCollaborador.addEventListener('click', async () => {
            const secuenciaAfiliado = deleteCollaboratorModal.getAttribute('data-secuencia-afiliado');
            const selectedRadio = document.querySelector('input[name="motivo"]:checked');
            if (!selectedRadio) {
                showMessage('warning','Atención','Debes seleccionar un motivo para eliminar al colaborador.');
                return;
            }

            const codigoMotivo = selectedRadio.value;

            await deleteAfiliado(secuenciaAfiliado, codigoMotivo);
        });

        improveBeneficiaryModal.addEventListener('show.bs.modal', async () => {
            if (!detalleSuscripcion || !detalleSuscripcion.detallePlan) return;

            const planActual = detalleSuscripcion.detallePlan;
            const descuento = planActual.porcentajeDescuento ?? 0;
            const tipo = planActual.tipo?.toLowerCase() === 'anual' ? '/anual' : `/${planActual.tipo?.toLowerCase()}`;
            
            document.getElementById('nombrePlanActual').textContent = planActual.nombre ?? '---';
            document.getElementById('descuentoPlanaAtual').textContent = `AHORRA ${descuento}%`;
            document.querySelector('#precioFinalPlanActual').textContent = parseFloat(planActual.valorFinal).toFixed(2);
            document.querySelector('#precioPlanActual').textContent = parseFloat(planActual.precio).toFixed(2);
            document.querySelector('#precioFinalPlanActual').closest('h5').querySelector('small').textContent = tipo;

            const planes = await obtenerTodosLosPlanes(planActual);
            if (!planes) return;

            const planesAnuales = planes.filter(p =>
                p.tipo === 'ANUAL' &&
                p.codigoConvenio !== planActual.codigoConvenio &&
                p.valorFinal > planActual.valorFinal
            );

            const planesMensuales = planes.filter(p =>
                p.tipo === 'MENSUAL' &&
                p.codigoConvenio !== planActual.codigoConvenio &&
                p.valorFinal > planActual.valorFinal
            );

            renderPlanesEnSwiper(planesAnuales, 'planesVerisAnual');
            renderPlanesEnSwiper(planesMensuales, 'planesVerisMensual');

        });

        deleteCollaboratorModal.addEventListener('show.bs.modal', async () => {
            const button = event.relatedTarget;
            const secuenciaAfiliado = button.getAttribute('data-secuencia-afiliado');
            deleteCollaboratorModal.setAttribute('data-secuencia-afiliado', secuenciaAfiliado);
            cargarMotivosInactivacion();
        });

        await cargarTiposIdentificacion();
        $('#tipoIdentificacion option[value="1"]').remove();
        await cargarEstadoCivil();
        await cargarTiposParentesco();
        await cargarSectores();
    });

    async function cargaAfiliadosSuscripcion(){
        let args = [];
        args["endpoint"] = `${api_url}/comercial/v1/afiliados/carga_afiliados_credito_fidelizacion?codigoEmpresa=1`;
        args["method"] = "POST";
        args["showLoader"] = true;
        args["token"] = _token;
        args["bodyType"] = "json";
        args["data"] = JSON.stringify({
            "codigoConvenio": detalleSuscripcion.detallePlan.codigoConvenio,
            "secuenciaSuscripcion": detalleSuscripcion.detallePlan.secuenciaSuscripcion,
            "afiliados": pacientesAgregados
        });
        const data = await call(args);
        console.log(data);
        if(data.code == 200){
            detalleSuscripcion.pacientes = pacientesAgregados;
            localStorage.setItem(`suscripcion-{{ $params }}`, JSON.stringify(detalleSuscripcion));
            location.href = `/portal-fidelizacion/confirmacion/{{ $params }}`;
        }else{
            showMessage('warning','Atención',data.message);
        }
    }

    async function cargarAfiliados() {
        if (pacientes.length > 0) {
            $('.box-pagination').removeClass('d-none');
            fillRegistros();
            drawPaginationAfiliados({ totalRows: pacientes.length }, page);
            return;
        }

        origenDatos = 'api';

        const baseUrl = `${api_url}/comercial/v1/afiliados/lista_afiliados_cargados`;
        const queryParams = new URLSearchParams({
            codigoEmpresa: 1,
            codigoConvenio: detalleSuscripcion.detallePlan.codigoConvenio,
            tipoCredito: 'CREDITO_FIDELIZACION',
            tipoFiltro: $('#tipoFiltro option:selected').val(),
            valorFiltro: $('#valorFiltro').val(),
            page: 1,
            perPage: 9999
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: true,
        });

        if (response.code === 200) {
            if(response.data !== null){
                let filtrados = $.grep(response.data.rows, function(item) {
                    return item.activo === true;
                });
                console.log(filtrados)
                //pacientes = response.data.rows;
                pacientes = filtrados;
                console.log(pacientes)
                page = 1;
                const pacientesActivos = pacientes.filter(p => p.activo);

                fillRegistros();
                drawPaginationAfiliados({ totalRows: pacientesActivos.length }, page);
            }
        }
    }

    function fillPaciente(paciente){
        $('#tipoIdentificacion').val(paciente.codigoTipoIdentificacionPcte)
        $('#numeroIdentificacion').val(paciente.numeroIdentificacionPcte)
        $('#primerNombre').val(paciente.primerNombre)
        $('#segundoNombre').val(paciente.segundoNombre)
        $('#primerApellido').val(paciente.primerApellido)
        $('#segundoApellido').val(paciente.segundoApellido)
        $('#genero').val(paciente.genero)

        $('#idPersonaRegistro').val(paciente.numeroIdentificacionPcte);
        $('#secuenciaAfiliado').val(paciente.secuenciaAfiliado);

        var partes = paciente.fechaNacimiento.split("/"); // ["09", "06", "2025"]
        var fechaFormateada = partes[2] + "-" + partes[1] + "-" + partes[0]; // "2025-06-09"

        $('#fechaNacimiento').val(fechaFormateada)
        $('#codigoEstadoCivil').val(paciente.codigoEstadoCivil)
        $('#estadoCivil').val(paciente.estadoCivil)
        $('#direccion').val(paciente.direccion)
        $('#sector').val(paciente.codigoSector)
        $('#numeroContratoAfiliado').val(paciente.numeroContrato)
        $('#parentesco').val(paciente.codigoTipoParentesco)
        $('#telefonoFijo').val(paciente.telefonoFijo)
        $('#telefonoMovil').val(paciente.telefonoMovil)
        $('#email').val(paciente.mail)
    }

    function fillRegistros() {
        
        const pacientesActivos = pacientes.filter(p => p.activo);
        if (pacientesActivos.length === 0) {
            $('.box-pagination').addClass('d-none');
            return;
        }

        if(pacientesAgregados.length > 0){
            $('#btn-continuar').attr('disabled', false);
        }else{
            $('#btn-continuar').attr('disabled', true);
        }
        $('.box-pagination').removeClass('d-none');

        $('#empty-space').remove();
        const start = (page - 1) * perPage;
        const end = page * perPage;
        const registrosPaginados = pacientesActivos.slice(start, end);

        let elem = '';
        $.each(registrosPaginados, function (key, value) {
            let disabled = ``;
            if(value.hasOwnProperty('permiteUpgrade') && !value.permiteUpgrade){
                disabled = `disabled`;
            }
            let actionTd = `<td class="text-nowrap align-middle text-center">
                <div class="form-check d-flex justify-content-center align-items-center me-1">
                    <input ${disabled} class="form-check-input mx-auto item-beneficiario" type="checkbox" data-rel='${JSON.stringify(value)}'/>
                </div>
            </td>`;
            if (detalleSuscripcion.origen === "suscripcion") {
                actionTd = ``;
            }

            elem += `<tr id="paciente-${key}">
                ${actionTd}
                <td class="text-center">${value.numeroIdentificacionPcte}</td>
                <td class="text-center">${value.primerApellido ?? ''} ${value.segundoApellido ?? ''} ${value.primerNombre ?? ''} ${value.segundoNombre ?? ''}</td>
                <td class="text-center">${value.telefonoMovil}</td>
                <td class="text-center">${value.mail ?? value.correo}</td>
                <td class="text-center">${value.fechaNacimiento}</td>
                <td class="text-center">${detalleSuscripcion.detallePlan.nombre}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm text-malachite-600 shadow-none btn-editar-paciente px-2" data-rel='${JSON.stringify(value)}' paciente-rel="${key}" data-bs-toggle="modal" data-bs-target="#addBeneficiaryModal">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="btn btn-sm text-grenadier-600 shadow-none btn-eliminar-paciente px-2" data-rel='${JSON.stringify(value)}' data-secuencia-afiliado="${value.secuenciaAfiliado}" paciente-rel="${key}" data-bs-toggle="modal" data-bs-target="#deleteCollaboratorModal">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>`;
        });

        $('#contenido-pacientes').html(elem);
    }

    async function drawPaginationAfiliados(data, currentPage = 1) {
        const totalItems = data.totalRows;
        const totalPages = Math.ceil(totalItems / perPage);
        const page = Math.max(1, Math.min(currentPage, totalPages));
        const startItem = ((page - 1) * perPage) + 1;
        const endItem = Math.min(page * perPage, totalItems);

        $('[data-list-info]').text(`${startItem}-${endItem} de ${totalItems}`);

        let paginationHtml = `
            <li class="page-item ${page === 1 ? 'disabled' : ''}">
                <a class="page-link bg-transparent btn-pagination-page" href="#" data-page="1">
                    <i class="bi bi-chevron-double-left"></i>
                </a>
            </li>
            <li class="page-item ${page === 1 ? 'disabled' : ''}">
                <a class="page-link bg-transparent btn-pagination-page" href="#" data-page="${page - 1}">
                    <i class="bi bi-chevron-left"></i>
                </a>
            </li>
            <li class="page-item"><a class="page-link bg-transparent disabled" href="#">${page}</a></li>
            <li class="page-item"><span class="page-link border-0">de</span></li>
            <li class="page-item"><a class="page-link bg-transparent disabled" href="#">${totalPages}</a></li>
            <li class="page-item ${page === totalPages ? 'disabled' : ''}">
                <a class="page-link bg-transparent btn-pagination-page" href="#" data-page="${page + 1}">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
            <li class="page-item ${page === totalPages ? 'disabled' : ''}">
                <a class="page-link bg-transparent btn-pagination-page" href="#" data-page="${totalPages}">
                    <i class="bi bi-chevron-double-right"></i>
                </a>
            </li>
        `;

        $('.pagination').html(paginationHtml);
    }

    async function actualizarPaciente(id) {
        let secuenciaAfiliado = $('#secuenciaAfiliado').val();

        if (secuenciaAfiliado && !isNaN(secuenciaAfiliado)) {
            await actualizarAfiliados(Number(secuenciaAfiliado));
        } else {
            actualizarPacienteLocal(id);
        }
    }

    async function actualizarAfiliados(secuenciaAfiliado) {
        let primerNombre = $('#primerNombre').val().toUpperCase();
        let segundoNombre = $('#segundoNombre').val()?.toUpperCase() || '';
        let primerApellido = $('#primerApellido').val().toUpperCase();
        let segundoApellido = $('#segundoApellido').val()?.toUpperCase() || '';
        let codigoEstadoCivil = $('#codigoEstadoCivil').val();
        let estadoCivil	 = $('#estadoCivil').val();

        const body = [{
            secuenciaAfiliado: secuenciaAfiliado,
            activo: true,
            primerApellido: primerApellido,
            segundoApellido: segundoApellido,
            primerNombre: primerNombre,
            segundoNombre: segundoNombre,
            codigoEstadoCivil: parseInt(codigoEstadoCivil),
            estadoCivil: estadoCivil
        }];

        const baseUrl = `${api_url}/comercial/v1/afiliados/modificacion_afiliados_cargados`;
        try {
            const queryParams = new URLSearchParams({
                codigoEmpresa: '1',
            });
    
            const response = await call({
                method: 'PUT',
                endpoint: `${baseUrl}?${queryParams.toString()}`,
                bodyType: 'json',
                showLoader: false,
                data: JSON.stringify(body),
            });
            
            if (response.code === 200) {
                showMessage('warning','Atención','Actualización de datos con éxito');
            } else {
                showMessage('warning','Atención','Error al actualizar en servidor');
            }
        } catch (error) {
            console.error('Error al actualizar paciente', error);
            showMessage('error','Atención','Error inesperado')
        }

    }

    async function deleteAfiliado(secuenciaAfiliado, codigoMotivo) {
        const baseUrl = `${api_url}/comercial/v1/afiliados/${secuenciaAfiliado}`;

        const queryParams = new URLSearchParams({
            codigoMotivoInactivacion: codigoMotivo,
        });

        const response = await call({
            method: 'DELETE',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: true,
        });

        if (response.code === 200) {

            bootstrap.Modal.getInstance(document.getElementById('deleteCollaboratorModal')).hide();
            collaboratorSuccessRemovedModal.show();
            $(`#paciente-${trDelete}`).remove();
            pacientes.splice(trDelete, 1);
            trDelete = null;
            // fillRegistros();
        } else {
            console.error('Error al eleminar el afiliado:', response);
        }
    }

    function actualizarPacienteLocal(id) {
        const index = pacientes.findIndex(p => p.numeroIdentificacionPcte === id);
        if (index === -1) return;

        let primerNombre = $('#primerNombre').val().toUpperCase();
        // let segundoNombre = $('#segundoNombre').val().toUpperCase();
        let primerApellido = $('#primerApellido').val().toUpperCase();
        // let segundoApellido = $('#segundoApellido').val().toUpperCase();
        let genero = $('#genero').val();
        let fechaNacimiento = $('#fechaNacimiento').val();
        // let estadoCivil = $('#estadoCivil').val();
        // let direccion = $('#direccion').val();
        // let sector = $('#sector').val();
        // let numeroContrato = $('#numeroContratoAfiliado').val();
        // let parentesco = $('#parentesco').val();
        // let telefonoFijo = $('#telefonoFijo').val();
        let telefonoMovil = $('#telefonoMovil').val();
        let email = $('#email').val();

        let dateObj = new Date(fechaNacimiento);
        let dia = String(dateObj.getDate()).padStart(2, '0');
        let mes = String(dateObj.getMonth() + 1).padStart(2, '0');
        let anio = dateObj.getFullYear();
        let fechaFormateada = `${dia}/${mes}/${anio}`;

        pacientes[index] = {
            ...pacientes[index], // mantiene campos como identificación, etc.
            primerNombre,
            // segundoNombre,
            primerApellido,
            // segundoApellido,
            genero,
            fechaNacimiento: fechaFormateada,
            // codigoEstadoCivil: estadoCivil,
            // direccion,
            // codigoSector: sector,
            // numeroContrato,
            // codigoTipoParentesco: parentesco,
            // telefonoFijo,
            telefonoMovil,
            mail: email
        };
    }

    function actualizarEstadoBotonesAccion() {
        const totalSeleccionados = $('#contenido-pacientes .form-check-input:checked').length;

        const btnMejorar = $('[data-bs-target="#improveBeneficiaryModal"]');
        const botonesAccion = $('#contenido-pacientes .btn-editar-paciente, #contenido-pacientes .btn-eliminar-paciente');

        if (totalSeleccionados > 0) {
            btnMejorar.removeClass('filter-grayscale').prop('disabled', false);
            botonesAccion.addClass('filter-grayscale').prop('disabled', true);
        } else {
            btnMejorar.addClass('filter-grayscale').prop('disabled', true);
            botonesAccion.removeClass('filter-grayscale').prop('disabled', false);
        }
    }

    async function existeIdentificacion(codigo, numero) {
        console.log(codigo, numero)
        return pacientes.some(item => 
            parseInt(item.codigoTipoIdentificacionPcte) === parseInt(codigo) &&
            item.numeroIdentificacionPcte === numero
        );
    }

    async function existeIdentificionSuscrita(numero){
        const baseUrl = `${api_url}/comercial/v1/afiliados/lista_afiliados_cargados`;
        const queryParams = new URLSearchParams({
            codigoEmpresa: 1,
            codigoConvenio: detalleSuscripcion.detallePlan.codigoConvenio,
            tipoCredito: 'CREDITO_FIDELIZACION',
            tipoFiltro: 'identificacion',
            valorFiltro: numero,
            page: 1,
            perPage: 9999 // obtener todos, si luego vamos a paginar localmente
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: true,
        });
        
        if(response.data.totalRows == 0){
            return false;
        }

        return true;
    }

    async function validarIdentidad() {
        const tipo = $('#tipoIdentificacion').val();
        const numero = $('#numeroIdentificacion').val();

        if (!tipo || !numero) {
            showMessage('warning','Atención','Debes seleccionar tipo y número de identificación');
            return false;
        }

        let existeMemoria = await existeIdentificacion(tipo, numero)
        if(existeMemoria){
            showMessage('warning','Atención','Paciente con esa identificación ya se encuentra suscrito');
            return false;
        }

        if(detalleSuscripcion.hasOwnProperty('origen') && detalleSuscripcion.origen == "edicion"){
            let existeWS = await existeIdentificionSuscrita(numero);
            if(existeWS){
                showMessage('warning','Atención','Paciente con esa identificación ya se encuentra suscrito');
                return false;
            }
        }

        try {
            const baseUrl = `${api_url}/general/v1/util/validar_identificacion`;
            const queryParams = new URLSearchParams({
                codigoTipoIdentificacion: tipo,
                codigoEmpresa: '1',
                numeroIdentificacion: numero,
                idPacienteTitular: numero
            });

            const response = await call({
                method: 'GET',
                endpoint: `${baseUrl}?${queryParams.toString()}`,
                bodyType: 'json',
                showLoader: true,
            });

            if (response.data?.esIdentificacionValida === true) {
                validado = true;
                pacienteExistente = false;

                const paciente = await consultarPaciente();
                const fueAsignado = await validaInfoAfiliado();
                if(fueAsignado){
                    validado = false;
                    pacienteExistente = true;
                    showMessage('warning','Atención','Paciente con esa identificación ya se encuentra suscrito');
                    return;
                }
                mostrarCamposAdicionales();
                if (paciente) {
                    llenarCamposPaciente(paciente);
                }

                return true;
            } else {
                showMessage('warning','Atención','Identificación no válida');
                return false;
            }
        } catch (error) {
            console.error('Error al validar', error);
            //showMessage('warning','Atención','Error al validar identificación');
            return false;
        }
    }

    async function consultarPaciente() {
        const tipoIdentificacion = $('#tipoIdentificacion').val();
        const numeroIdentificacion = $('#numeroIdentificacion').val();

        if (!tipoIdentificacion || !numeroIdentificacion) {
            showMessage('warning','Atención','Debes seleccionar tipo identificacion y número de identificación');
            return false;
        }

        try {
            const baseUrl = `${api_url}/general/v1/pacientes/consulta_basica`;
            const queryParams = new URLSearchParams({
                tipoFiltro: 'numeroIdentificacion',
                codigoTipoIdentificacion: tipoIdentificacion,
                valorFiltro: numeroIdentificacion,
                page: page,
                perPage: 1,
            });

            const response = await call({
                method: 'GET',
                endpoint: `${baseUrl}?${queryParams.toString()}`,
                bodyType: 'json',
                showLoader: true,
            });

            const paciente = response.data?.rows?.[0];
            return paciente || null;

        } catch (error) {
            console.error('Error al consultar datos del paciente', error);
            showMessage('error','Atención','Error al obtener datos del paciente');
            return false;
        }
    }

    function llenarCamposPaciente(paciente) {
        $('#primerNombre').val(paciente.primerNombre || '');
        $('#primerApellido').val(paciente.primerApellido || '');
        $('#segundoApellido').val(paciente.segundoApellido || '');
        $('#fechaNacimiento').val(formatearFechaInput(paciente.fechaNacimiento));
        $('#genero').val(paciente.genero || '');
        $('#email').val(paciente.correoElectronico || '');
        $('#telefonoMovil').val(paciente.telefonoCelular.replace(/^\+593/, '').replace(/\D/g, '') || '');
    }

    function formatearFechaInput(fecha) {
        const partes = fecha.split('/');
        if (partes.length !== 3) return '';
        const [dia, mes, anio] = partes;
        return `${anio}-${mes.padStart(2, '0')}-${dia.padStart(2, '0')}`;
    }

    function mostrarCamposAdicionales() {
        $('#nombre-col, #apellido-col, #sapellido-col, #fecha-col, #genero-col, #email-col, #telefono-col, #terms-col, #privacy-col')
            .removeClass('d-none');

        $('#tipoIdentificacion').prop('disabled', true);
        $('#numeroIdentificacion').prop('readonly', true);
    }

    function agregarPaciente() {
        let tipoIdentificacionPcte = $('#tipoIdentificacion option:selected').html().toUpperCase();
        let codigoTipoIdentificacionPcte = $('#tipoIdentificacion option:selected').val();
        let numeroIdentificacionPcte = $('#numeroIdentificacion').val();
        let primerNombre = $('#primerNombre').val().toUpperCase();
        let primerApellido = $('#primerApellido').val().toUpperCase();
        let segundoApellido = $('#segundoApellido').val().toUpperCase();
        let genero = $('#genero option:selected').val();
        let fechaNacimiento = $('#fechaNacimiento').val();
        let telefonoMovil = $('#telefonoMovil').val();
        let email = $('#email').val();

        let dateObj = new Date(fechaNacimiento);
        let dia = String(dateObj.getDate()).padStart(2, '0');
        let mes = String(dateObj.getMonth() + 1).padStart(2, '0');
        let anio = dateObj.getFullYear();
        let fechaFormateada = `${dia}/${mes}/${anio}`;

        const pacienteRegistrado = pacientes.some(paciente => 
            paciente.codigoTipoIdentificacionPcte === codigoTipoIdentificacionPcte && 
            paciente.numeroIdentificacionPcte === numeroIdentificacionPcte
        );

        if (pacienteRegistrado) {
            showMessage('warning','Atención','Este paciente ya ha sido agregado.');
            return;
        }

        let itemPaciente = {
            "activo": true,
            "permiteUpgrade": false,
            "codigoTipoIdentificacionPcte": codigoTipoIdentificacionPcte,
            "codigoTipoIdentificacion": codigoTipoIdentificacionPcte,
            "numeroIdentificacionPcte": numeroIdentificacionPcte,
            "primerApellido": primerApellido,
            "segundoApellido": segundoApellido,
            "primerNombre": primerNombre,
            "genero": genero,
            "fechaNacimiento": fechaFormateada,
            "mail": email,
            "telefonoMovil": parseInt(telefonoMovil.replace(/\D/g, '')),
            "codigoRegion": 1,
            "codigoCiudad": 1,
            "codigoPais": 1,
            "codigoProvincia": 1,
            "titularDependiente": "T",
            "codigoConvenio": detalleSuscripcion.detallePlan.codigoConvenio,
            "titularOtroContrato": null,
            "yaEsTitularContrato": null,
            "fechaInicioContrato": "{{ $now->format('d/m/Y') }}",
            "fechaFinContrato": "{{ $nextYear->format('d/m/Y') }}",
            "tipoIdentificacionPcte": tipoIdentificacionPcte,
            "observacionesError": null
        };

        pacientes.push(itemPaciente);

        pacientesAgregados.push(itemPaciente);

        fillRegistros();
        $('#addBeneficiaryModal').modal('hide');
        successModal.show();
        
    }

    async function validaInfoAfiliado(){
        let tipoIdentificacion = $('#tipoIdentificacion').val();
        let numeroIdentificacion = $('#numeroIdentificacion').val();
        let args = [];
        args["endpoint"] = `${api_url}/comercial/v1/afiliados/valida_informacion_afiliado?codigoEmpresa=1&tipoCredito=CREDITO_FIDELIZACION&validaPlanPaciente=true`;
        args["method"] = "POST";
        args["showLoader"] = true;
        args["token"] = _token;
        args["bodyType"] = "json";
        args["data"] = JSON.stringify({
            "codigoTipoIdentificacionPcte": tipoIdentificacion,
            "numeroIdentificacionPcte": numeroIdentificacion,
            "titularDependiente": "T"
        });
        const data = await call(args);
        const mensajeBuscado = "El afiliado {0} ya tiene un contrato de fidelización activo.";
        return data.data.includes(mensajeBuscado);
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

    async function cargarMotivosInactivacion() {
        const baseUrl = `${api_url}/comercial/v1/convenios/motivos_inactivacion`;

        const response = await call({
            method: 'GET',
            endpoint: baseUrl,
            bodyType: 'json',
            showLoader: true,
        });

        if (response.code === 200 && Array.isArray(response.data)) {
            const motivos = response.data;
            const content = document.getElementById('contentMotivosInactivacion');

            content.innerHTML = '';

            let item = '';
            motivos.forEach((motivo, index) => {
                const id = `motivo${index + 1}`;
                item += `
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="motivo" id="${id}" value="${motivo.codigoMotivo}" />
                        <label class="form-check-label fs-14p fw-semibold" for="${id}">
                            ${motivo.nombreMotivo}
                        </label>
                    </div>
                `;
            });
            content.innerHTML = item;
        } else {
            console.error('Error al cargar motivos:', response);
        }
    }

    async function subirPlantilla(){
        const formData = new FormData();
        formData.append("file", finalFile);

        let args = [];
        args["endpoint"] = `${api_url}/comercial/v1/afiliados/carga_archivo_afiliados?codigoPais=1&codigoProvincia=1&codigoCiudad=1&tipoCredito=CREDITO_FIDELIZACION&codigoConvenio=${detalleSuscripcion.detallePlan.codigoConvenio}`;
        args["method"] = "POST";
        args["token"] = _token;
        args["showLoader"] = true;
        args["data"] = formData;
        args["bodyType"] = "formdata";

        uploadedModal.show();
        try {
            const data = await call(args);
            console.log(data);
            if (data.code == 200) {
                uploadedModal.hide();
                if(data.data.cargaErronea){
                    showMessage('error','Atención', 'Descargando archivo con errores para su corrección')
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
                    if (data.code === 200 && !data.data.cargaErronea) {
                        origenDatos = 'local';

                        const nuevos = data.data.rows;
                        nuevos.forEach(item => {
                            item.permiteUpgrade = false;
                            item.activo = true;
                            pacientesAgregados.push(item);
                        });

                        $('.title-qty-masivo').html(`Se han cargado ${data.data.rows.length} usuarios con éxito`);


                        const existentes = new Set(pacientes.map(p => p.numeroIdentificacionPcte));
                        const noDuplicados = nuevos.filter(p => !existentes.has(p.numeroIdentificacionPcte));

                        pacientes = pacientes.concat(noDuplicados);

                        page = 1;
                        fillRegistros();
                        drawPaginationAfiliados({ totalRows: pacientes.length }, page);

                        // successModal.show();
                        $('#successfullyUploadMasivedModal').modal('show');
                    }
                }
                return data;
            } else {
                showMessage('error','Atención', data.message)
                console.log("Error en respuesta:", data);
                uploadedModal.hide();
            }
        } catch (error) {
            console.error("Error en uploadFile:", error);
            uploadedModal.hide();
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

    async function obtenerTodosLosPlanes(planActual) {
        if (!api_url || !_application || !_idOrganizacion || !_token) {
            console.error('Faltan variables globales.');
            return [];
        }

        const baseUrl = `${api_url}/empresarial/v1/suscripcion/planes/detalle_empresa`;

        const queryParams = new URLSearchParams({
            estado: 'ACTIVO',
            frecuencia: 'TODOS',
            lineaNegocio: planActual.lineaNegocio,
            codigoCliente: planActual.codigoCliente
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: true,
        });

        return response?.data || [];
    }

    function renderPlanesEnSwiper(planes, contenedorId) {
        const contenedor = document.getElementById(contenedorId);
        const mensajeId = contenedorId === 'planesVerisAnual' 
            ? 'empty-space-planes-anual' 
            : 'empty-space-planes-mensual';

        const mensajeVacio = document.getElementById(mensajeId);

        contenedor.innerHTML = '';

        if (!planes || planes.length === 0) {
            mensajeVacio.classList.remove('d-none');
            return;
        }

        mensajeVacio.classList.add('d-none');

        planes.forEach(value => {
            const beneficiosHtml = value.beneficios.map(beneficio => `
                <li class="mb-2 d-flex align-items-start fs-14p lh-sm">
                    <i class="bi bi-patch-check-fill text-dark me-2"></i>
                    ${beneficio.descripcion}
                </li>
            `).join('');

            let logoNombre = 'logo-veris.svg';
            if (value.lineaNegocio === 'PMF') logoNombre = 'parami.png';
            const logoSrc = `${url_site}/assets/img/veris/${logoNombre}`;

            const slide = document.createElement('div');
            slide.classList.add('swiper-slide');

            slide.innerHTML = `
                <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                    <img src="${logoSrc}" class="img-fluid mx-auto mb-3" alt="${value.lineaNegocio}" width="128">
                    <h5 class="bg-zumthor-50 text-blue-zodiac-950 fw-medium text-start px-3 py-2 rounded">
                        ${value.nombre}
                    </h5>
                    <div class="px-3 py-2">
                        <div class="mt-1">
                            <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">
                                AHORRA ${value.porcentajeDescuento}%
                            </span>
                        </div>
                        <div class="my-1">
                            <h2 class="fw-bold text-blue-zodiac-950 m-0">
                                $${parseFloat(value.valorFinal).toFixed(2)} <small class="fw-medium fs-14p">/${value.tipo.toLowerCase()}</small>
                            </h2>
                            <small class="text-muted text-decoration-line-through text-xs">
                                PVP: $${parseFloat(value.precio).toFixed(2)}
                            </small>
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="card-body p-3">
                        <h6 class="fw-bold">Beneficios</h6>
                        <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                            ${beneficiosHtml}
                        </ul>
                    </div>
                    <div class="card-footer p-0 text-center">
                        <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100 btn-mejorar-plan" data-rel='${JSON.stringify(value)}'>Cambiar ahora</a>
                    </div>
                </div>
            `;

            contenedor.appendChild(slide);
        });
    }

</script>
@endpush