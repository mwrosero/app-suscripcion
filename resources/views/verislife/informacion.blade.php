@extends('template.verisLife.app-template')
@section('title')
Veris
@endsection
@section('title-section')
Registro
@endsection

@section('content')
<div class="flex-grow-1 container-p-y">
    <section class="mb-4 p-3">
        <div class="text-center">
            <h3 class="fw-bold">Plan Veris</h3>
        </div>
        <div class="row justify-content-center pb-5">
            <ul class="nav nav-pills justify-content-center bg-white w-auto p-1 rounded-3" id="pills-tab" role="tablist">
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
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                <h5 class="bg-zumthor-50 text-dark-blue fw-medium text-start px-3 py-2 rounded">
                                    Opción 1
                                </h5>
                                <div class="px-3 py-2">
                                    <div class="mt-1">
                                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 36%</span>
                                    </div>
                                    <div class="my-1">
                                        <h1 class="fw-bold text-dark-blue m-0">$90 <small class="fw-medium fs-5">/anual</small></h1>
                                        <small class="text-muted text-decoration-line-through text-xs">PVP: $140</small>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="p-3">
                                    <h6 class="fw-bold">Beneficios</h6>
                                    <ul class="list-unstyled text-sm text-dark-blue mb-3">
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                            <span>4 consultas al año<br><small>Uso inmediato</small></span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            1 Profilaxis
                                        </li>
                                        <li class="d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            Consulta Optométrica<br>y Odontológica
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#!" class="btn btn-zest-veris rounded-3 py-2 w-100">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                <h5 class="bg-zumthor-50 text-dark-blue fw-medium text-start px-3 py-2 rounded">
                                    Opción 2
                                </h5>
                                <div class="px-3 py-2">
                                    <div class="mt-1">
                                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 39%</span>
                                    </div>
                                    <div class="my-1">
                                        <h1 class="fw-bold text-dark-blue m-0">$129 <small class="fw-medium fs-5">/anual</small></h1>
                                        <small class="text-muted text-decoration-line-through text-xs">PVP: $210</small>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="p-3">
                                    <h6 class="fw-bold">Beneficios</h6>
                                    <ul class="list-unstyled text-sm text-dark-blue mb-3">
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                            <span>6 consultas al año<br><small>Uso inmediato</small></span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            2 Profilaxis
                                        </li>
                                        <li class="d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            Consulta Optométrica<br>y Odontológica
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#!" class="btn btn-zest-veris rounded-3 py-2 w-100">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                <h5 class="bg-zumthor-50 text-dark-blue fw-medium text-start px-3 py-2 rounded">
                                    Opción 3
                                </h5>
                                <div class="px-3 py-2">
                                    <div class="mt-1">
                                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 39%</span>
                                    </div>
                                    <div class="my-1">
                                        <h1 class="fw-bold text-dark-blue m-0">$172 <small class="fw-medium fs-5">/anual</small></h1>
                                        <small class="text-muted text-decoration-line-through text-xs">PVP: $180</small>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="p-3">
                                    <h6 class="fw-bold">Beneficios</h6>
                                    <ul class="list-unstyled text-sm text-dark-blue mb-3">
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                            <span>4 consultas al año<br><small>Uso inmediato</small></span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            1 Profilaxis
                                        </li>
                                        <li class="d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            Consulta Optométrica<br>y Odontológica
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#!" class="btn btn-zest-veris rounded-3 py-2 w-100">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                <h5 class="bg-zumthor-50 text-dark-blue fw-medium text-start px-3 py-2 rounded">
                                    Opción 4
                                </h5>
                                <div class="px-3 py-2">
                                    <div class="mt-1">
                                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 36%</span>
                                    </div>
                                    <div class="my-1">
                                        <h1 class="fw-bold text-dark-blue m-0">$228 <small class="fw-medium fs-5">/anual</small></h1>
                                        <small class="text-muted text-decoration-line-through text-xs">PVP: $240</small>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="p-3">
                                    <h6 class="fw-bold">Beneficios</h6>
                                    <ul class="list-unstyled text-sm text-dark-blue mb-3">
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                            <span>12 consultas al año<br><small>Uso inmediato</small></span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            4 Profilaxis
                                        </li>
                                        <li class="d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            Consulta Optométrica<br>y Odontológica
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#!" class="btn btn-zest-veris rounded-3 py-2 w-100">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-mensual-veris" role="tabpanel" aria-labelledby="pills-mensual-veris-tab" tabindex="0">
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                <h5 class="bg-zumthor-50 text-dark-blue fw-medium text-start px-3 py-2 rounded">
                                    Opción 1
                                </h5>
                                <div class="px-3 py-2">
                                    <div class="mt-1">
                                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 30%</span>
                                    </div>
                                    <div class="my-1">
                                        <h1 class="fw-bold text-dark-blue m-0">$8,25 <small class="fw-medium fs-5">/mes</small></h1>
                                        <small class="text-muted text-decoration-line-through text-xs">PVP: $140</small>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="p-3">
                                    <h6 class="fw-bold">Beneficios</h6>
                                    <ul class="list-unstyled text-sm text-dark-blue mb-3">
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                            <span>4 consultas al año<br><small>1 consulta por trimestre</small></span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            1 Profilaxis
                                        </li>
                                        <li class="d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            Consulta Optométrica<br>y Odontológica
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#!" class="btn btn-zest-veris rounded-3 py-2 w-100">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                <h5 class="bg-zumthor-50 text-dark-blue fw-medium text-start px-3 py-2 rounded">
                                    Opción 2
                                </h5>
                                <div class="px-3 py-2">
                                    <div class="mt-1">
                                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 32%</span>
                                    </div>
                                    <div class="my-1">
                                        <h1 class="fw-bold text-dark-blue m-0">$11,83 <small class="fw-medium fs-5">/mes</small></h1>
                                        <small class="text-muted text-decoration-line-through text-xs">PVP: $210</small>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="p-3">
                                    <h6 class="fw-bold">Beneficios</h6>
                                    <ul class="list-unstyled text-sm text-dark-blue mb-3">
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                            <span>6 consultas al año<br><small>2 consulta por bimestre</small></span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            2 Profilaxis
                                        </li>
                                        <li class="d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            Consulta Optométrica<br>y Odontológica
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#!" class="btn btn-zest-veris rounded-3 py-2 w-100">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                <h5 class="bg-zumthor-50 text-dark-blue fw-medium text-start px-3 py-2 rounded">
                                    Opción 3
                                </h5>
                                <div class="px-3 py-2">
                                    <div class="mt-1">
                                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 32%</span>
                                    </div>
                                    <div class="my-1">
                                        <h1 class="fw-bold text-dark-blue m-0">$15,95 <small class="fw-medium fs-5">/mes</small></h1>
                                        <small class="text-muted text-decoration-line-through text-xs">PVP: $280</small>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="p-3">
                                    <h6 class="fw-bold">Beneficios</h6>
                                    <ul class="list-unstyled text-sm text-dark-blue mb-3">
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                            <span>8 consultas al año<br><small>2 consulta por trimestre</small></span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            3 Profilaxis
                                        </li>
                                        <li class="d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            Consulta Optométrica<br>y Odontológica
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#!" class="btn btn-zest-veris rounded-3 py-2 w-100">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
                                <h5 class="bg-zumthor-50 text-dark-blue fw-medium text-start px-3 py-2 rounded">
                                    Opción 4
                                </h5>
                                <div class="px-3 py-2">
                                    <div class="mt-1">
                                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA 40%</span>
                                    </div>
                                    <div class="my-1">
                                        <h1 class="fw-bold text-dark-blue m-0">$20,89 <small class="fw-medium fs-5">/mes</small></h1>
                                        <small class="text-muted text-decoration-line-through text-xs">PVP: $240</small>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="p-3">
                                    <h6 class="fw-bold">Beneficios</h6>
                                    <ul class="list-unstyled text-sm text-dark-blue mb-3">
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                            <span>12 consultas al año<br><small>1 consulta mensual</small></span>
                                        </li>
                                        <li class="mb-2 d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            4 Profilaxis
                                        </li>
                                        <li class="d-flex align-items-start lh-sm">
                                            <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                            Consulta Optométrica<br>y Odontológica
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="#!" class="btn btn-zest-veris rounded-3 py-2 w-100">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-3">
            <div class="text-center mb-4">
                <h3 class="fw-bold mb-3">Todos incluyen</h3>
            </div>
            <div class="card bg-transparent table-responsive rounded-4 border-perano-300 mb-4">
                <table class="table text-center text-dark-blue align-middle bg-transparent mb-0" style="overflow: hidden;">
                    <thead class="bc-perano">
                        <tr>
                            <th class="bg-transparent text-blue-mariner py-3">Descuentos en servicios</th>
                            <th class="bg-transparent py-3">Veris</th>
                            <th class="bg-transparent py-3">Para mi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr>
                            <td class="py-3">
                                <i class="fa-solid fa-stethoscope fs-2 d-block mb-1 text-dark"></i>
                                <span class="fs-6 fw-medium">Consultas</span>
                            </td>
                            <td class="py-3">
                                <div class="fw-medium">20%</div>
                                <small class="text-xs text-muted lh-sm">*en cada consulta adicional</small>
                            </td>
                            <td class="py-3">
                                <div class="fw-medium">General: $8,50 (15%)</div>
                                <div class="fw-medium">Especialidad: $12 (20%)</div>
                                <small class="text-xs text-muted lh-sm">*en cada consulta adicional</small>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                <i class="fa-solid fa-pills fs-2 d-block mb-1 text-dark"></i>
                                <span class="fs-6 fw-medium">Farmacia</span>
                            </td>
                            <td class="fs-6 fw-medium py-3">5%</td>
                            <td class="fs-6 fw-medium py-3">5%</td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                <i class="fa-solid fa-flask fs-2 d-block mb-1 text-dark"></i>
                                <span class="fs-6 fw-medium">Laboratorio clínico</span>
                            </td>
                            <td class="fs-6 fw-medium py-3">15%</td>
                            <td class="fs-6 fw-medium py-3">20%</td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                <i class="fa-solid fa-x-ray fs-2 d-block mb-1 text-dark"></i>
                                <span class="fs-6 fw-medium">Imágenes</span>
                            </td>
                            <td class="fs-6 fw-medium py-3">Hasta 15%</td>
                            <td class="fs-6 fw-medium py-3">Hasta 20%</td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                <i class="fa-solid fa-prescription fs-2 d-block mb-1 text-dark"></i>
                                <span class="fs-6 fw-medium">Procedimientos</span>
                            </td>
                            <td class="fs-6 fw-medium py-3">15%</td>
                            <td class="fs-6 fw-medium py-3">20%</td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                <i class="fa-solid fa-crutch fs-2 d-block mb-1 text-dark"></i>
                                <span class="fs-6 fw-medium">Terapias</span>
                            </td>
                            <td class="fs-6 fw-medium py-3">15%</td>
                            <td class="fs-6 fw-medium py-3">20%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card border-perano-300 rounded-4 text-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-zodiac-blue h4">Veris Urgencias</strong><br>
                            <small>Hasta 15% de descuento (Gye)</small>
                        </div>
                        <div class="col-md-6 border-start">
                            <strong class="text-zodiac-blue h4">Asesoría Médica</strong><br>
                            <small>Asesoría médica ilimitada a través del contact center</small>
                        </div>
                    </div>
                    <div class="mt-2 text-zodiac-blue h6 fw-medium">
                        **NO APLICA PARA VACUNAS NI VITAMINA C**
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection