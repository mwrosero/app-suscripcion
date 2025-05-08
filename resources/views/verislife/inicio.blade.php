@extends('template.verisLife.app-template')
@section('title')
Veris
@endsection
@section('title-section')
Registro
@endsection


@section('content')
<div class="flex-grow-1 container-p-y">
    <div class="bg-white p-3 mb-4">
        <h5 class="mb-0 mt-2">Home</h5>
    </div>

    <section class="bg-white mb-4 p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Planes de suscripcion</h5>
            <a href="#!" class="fw-medium me-1">Ver todos</a>
        </div>

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
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-anual-veris" role="tabpanel" aria-labelledby="pills-anual-veris-tab" tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                            <div class="card border rounded-5 shadow-none">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-md-5">
                                            <!-- Opciones -->
                                            <div class="list-group list-group-radio d-grid gap-4 border-0">
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="plan" checked data-bs-toggle="collapse" data-bs-target="#detalleOpcion1">
                                                        <span class="text-mirage-950 fw-medium h5 mb-0">Opción 1</span>
                                                    </div>
                                                    <span class="fw-semibold">$8,25 <small class="text-muted">/mes</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="plan" data-bs-toggle="collapse" data-bs-target=".detalle-plan">
                                                        <span class="text-mirage-950 fw-medium h5 mb-0">Opción 2</span>
                                                    </div>
                                                    <span class="fw-semibold">$8,25 <small class="text-muted">/mes</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="plan" data-bs-toggle="collapse" data-bs-target=".detalle-plan">
                                                        <span class="text-mirage-950 fw-medium h5 mb-0">Opción 3</span>
                                                    </div>    
                                                    <span class="fw-semibold">$8,25 <small class="text-muted">/mes</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="plan" data-bs-toggle="collapse" data-bs-target=".detalle-plan">
                                                        <span class="text-mirage-950 fw-medium h5 mb-0">Opción 4</span>
                                                    </div>
                                                    <span class="fw-semibold">$8,25 <small class="text-muted">/mes</small></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <!-- Detalles Opción 1 -->
                                            <div class="card bg-gallery-100 border-0 rounded-4 collapse show detalle-plan" id="detalleOpcion1">
                                                <div class="card-body">
                                                    <h5 class="card-title">Opción 1</h5>
                                                    <div class="card-body shadow-none rounded-3 bg-white">
                                                        <span class="badge bg-primary mb-2">AHORRA 30%</span>
                                                        <h2 class="fw-bold">$8,25 <small class="text-muted">/mes</small></h2>
                                                        <p class="text-decoration-line-through text-muted">PVP: $11,90</p>
                                                        <hr>
                                                        <h6>Beneficios</h6>
                                                        <ul class="list-unstyled">
                                                            <li>✔ 4 consultas al año (1 por trimestre)</li>
                                                            <li>✔ 1 Profilaxis</li>
                                                            <li>✔ Consulta Optométrica y Odontológica</li>
                                                        </ul>
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
                <div class="tab-pane fade" id="pills-mensual-veris" role="tabpanel" aria-labelledby="pills-mensual-veris-tab" tabindex="0">
                    <!-- contenido mensual -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection