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
    <section class="bg-athens-gray mb-4 p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="fw-medium border-start-blue ps-3 fs-18 mb-0">Planes contratados</h5>
            <a href="#!" class="fw-medium me-1">Ver todos</a>
        </div>
    </section>
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
                        <div class="col-12 col-lg-10 col-xxl-8">
                            <div class="card border-silver-chalice-400 rounded-5 shadow-none">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-md-5">
                                            <div class="list-group list-group-radio d-grid gap-4 border-0">
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="verisPlanAnual" checked data-bs-toggle="collapse" data-bs-target="#detalle-veris-plan-anual-1">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 1</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/anual</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="verisPlanAnual" data-bs-toggle="collapse" data-bs-target=".detalle-veris-plan-anual-2">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 2</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/anual</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="verisPlanAnual" data-bs-toggle="collapse" data-bs-target=".detalle-veris-plan-anual-3">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 3</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/anual</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="verisPlanAnual" data-bs-toggle="collapse" data-bs-target=".detalle-veris-plan-anual-4">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 4</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/anual</small></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <!-- Detalles Opción 1 -->
                                            <div class="card bg-gallery-100 border-0 rounded-4 collapse show detalle-veris-plan-anual" id="detalle-veris-plan-anual-1">
                                                <div class="card-body">
                                                    <h5 class="card-title">Opción 1</h5>
                                                    <div class="card-body shadow-none rounded-3 bg-white">
                                                        <span class="badge bg-blue-ribbon-600 fw-medium rounded-4 mb-2">AHORRA 30%</span>
                                                        <h2 class="fw-bold mb-0">$8,25 <small class="fw-medium text-mirage-950">/mes</small></h2>
                                                        <p class="text-decoration-line-through text-muted fs-10p">PVP: $11,90</p>
                                                        <h6>Beneficios</h6>
                                                        <ul class="list-unstyled">
                                                            <li><i class="bi bi-patch-check-fill text-primary-veris me-2"></i> 4 consultas al año (1 por trimestre)</li>
                                                            <li><i class="bi bi-patch-check-fill text-dark me-2"></i> 1 Profilaxis</li>
                                                            <li><i class="bi bi-patch-check-fill text-dark me-2"></i> Consulta Optométrica y Odontológica</li>
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
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                            <div class="card border-silver-chalice-400 rounded-5 shadow-none">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-md-5">
                                            <div class="list-group list-group-radio d-grid gap-4 border-0">
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="verisPlanMesual" checked data-bs-toggle="collapse" data-bs-target="#detalle-veris-plan-mes-1">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 1</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/mes</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="verisPlanMesual" data-bs-toggle="collapse" data-bs-target=".detalle-veris-plan-mes-2">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 2</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/mes</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="verisPlanMesual" data-bs-toggle="collapse" data-bs-target=".detalle-veris-plan-mes-3">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 3</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/mes</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="verisPlanMesual" data-bs-toggle="collapse" data-bs-target=".detalle-veris-plan-mes-4">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 4</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/mes</small></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card bg-gallery-100 border-0 rounded-4 collapse show detalle-veris-plan-mes" id="detalle-veris-plan-mes-1">
                                                <div class="card-body">
                                                    <h5 class="card-title">Opción 1</h5>
                                                    <div class="card-body shadow-none rounded-3 bg-white">
                                                        <span class="badge bg-blue-ribbon-600 fw-medium rounded-4 mb-2">AHORRA 30%</span>
                                                        <h2 class="fw-bold mb-0">$8,25 <small class="fw-medium text-mirage-950">/mes</small></h2>
                                                        <p class="text-decoration-line-through text-muted fs-10p">PVP: $11,90</p>
                                                        <h6>Beneficios</h6>
                                                        <ul class="list-unstyled">
                                                            <li><i class="bi bi-patch-check-fill text-primary-veris me-2"></i> 4 consultas al año (1 por trimestre)</li>
                                                            <li><i class="bi bi-patch-check-fill text-dark me-2"></i> 1 Profilaxis</li>
                                                            <li><i class="bi bi-patch-check-fill text-dark me-2"></i> Consulta Optométrica y Odontológica</li>
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
            </div>
            <div class="col-12 col-lg-3 text-center">
                <a href="/planes-informacion" class="btn btn-lg btn-blue-veris px-5">Más información</a>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <h3 class="fw-bold">Plan Para Mi</h3>
        </div>
        <div class="row justify-content-center pb-5">
            <ul class="nav nav-pills justify-content-center bg-white w-auto p-1 rounded-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 px-lg-5 active" id="pills-anual-parami-tab" data-bs-toggle="pill" data-bs-target="#pills-anual-parami" type="button" role="tab" aria-controls="pills-anual-parami" aria-selected="true">Anual</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 px-lg-5" id="pills-mensual-parami-tab" data-bs-toggle="pill" data-bs-target="#pills-mensual-parami" type="button" role="tab" aria-controls="pills-mensual-parami" aria-selected="false">Mensual</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-anual-parami" role="tabpanel" aria-labelledby="pills-anual-parami-tab" tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xxl-8">
                            <div class="card border-silver-chalice-400 rounded-5 shadow-none">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-md-5">
                                            <!-- Opciones -->
                                            <div class="list-group list-group-radio d-grid gap-4 border-0">
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="paramiPlanAnual" checked data-bs-toggle="collapse" data-bs-target="#detalle-parami-plan-anual-1">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 1</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/anual</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="paramiPlanAnual" data-bs-toggle="collapse" data-bs-target=".detalle-parami-plan-anual-2">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 2</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/anual</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="paramiPlanAnual" data-bs-toggle="collapse" data-bs-target=".detalle-parami-plan-anual-3">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 3</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/anual</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="paramiPlanAnual" data-bs-toggle="collapse" data-bs-target=".detalle-parami-plan-anual-4">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 4</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/anual</small></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <!-- Detalles Opción 1 -->
                                            <div class="card bg-gallery-100 border-0 rounded-4 collapse show detalle-parami-plan-anual" id="detalle-parami-plan-anual-1">
                                                <div class="card-body">
                                                    <h5 class="card-title">Opción 1</h5>
                                                    <div class="card-body shadow-none rounded-3 bg-white">
                                                        <span class="badge bg-blue-ribbon-600 fw-medium rounded-4 mb-2">AHORRA 30%</span>
                                                        <h2 class="fw-bold mb-0">$8,25 <small class="fw-medium text-mirage-950">/mes</small></h2>
                                                        <p class="text-decoration-line-through text-muted fs-10p">PVP: $11,90</p>
                                                        <h6>Beneficios</h6>
                                                        <ul class="list-unstyled">
                                                            <li><i class="bi bi-patch-check-fill text-primary-veris me-2"></i> 4 consultas al año (1 por trimestre)</li>
                                                            <li><i class="bi bi-patch-check-fill text-dark me-2"></i> 1 Profilaxis</li>
                                                            <li><i class="bi bi-patch-check-fill text-dark me-2"></i> Consulta Optométrica y Odontológica</li>
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
                <div class="tab-pane fade" id="pills-mensual-parami" role="tabpanel" aria-labelledby="pills-mensual-parami-tab" tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                            <div class="card border-silver-chalice-400 rounded-5 shadow-none">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-md-5">
                                            <div class="list-group list-group-radio d-grid gap-4 border-0">
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="paramiPlanMesual" checked data-bs-toggle="collapse" data-bs-target="#detalle-parami-plan-mensual-1">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 1</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/mes</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="paramiPlanMesual" data-bs-toggle="collapse" data-bs-target=".detalle-parami-plan-mensual-2">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 2</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/mes</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="paramiPlanMesual" data-bs-toggle="collapse" data-bs-target=".detalle-parami-plan-mensual-3">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 3</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/mes</small></span>
                                                </label>
                                                <label class="list-group-item bg-gallery-100 border-0 d-flex justify-content-between align-items-center rounded-10p py-3">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input me-2" type="radio" name="paramiPlanMesual" data-bs-toggle="collapse" data-bs-target=".detalle-parami-plan-mensual-4">
                                                        <span class="text-mirage-950 fw-medium h4 mb-0">Opción 4</span>
                                                    </div>
                                                    <span class="fw-semibold text-mirage-950 h5 mb-0">$8,25 <small class="text-mirage-950 fw-medium">/mes</small></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card bg-gallery-100 border-0 rounded-4 collapse show detalle-parami-plan-mensual" id="detalle-parami-plan-mensual-1">
                                                <div class="card-body">
                                                    <h5 class="card-title">Opción 1</h5>
                                                    <div class="card-body shadow-none rounded-3 bg-white">
                                                        <span class="badge bg-blue-ribbon-600 fw-medium rounded-4 mb-2">AHORRA 30%</span>
                                                        <h2 class="fw-bold mb-0">$8,25 <small class="fw-medium text-mirage-950">/mes</small></h2>
                                                        <p class="text-decoration-line-through text-muted fs-10p">PVP: $11,90</p>
                                                        <h6>Beneficios</h6>
                                                        <ul class="list-unstyled">
                                                            <li><i class="bi bi-patch-check-fill text-primary-veris me-2"></i> 4 consultas al año (1 por trimestre)</li>
                                                            <li><i class="bi bi-patch-check-fill text-dark me-2"></i> 1 Profilaxis</li>
                                                            <li><i class="bi bi-patch-check-fill text-dark me-2"></i> Consulta Optométrica y Odontológica</li>
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
            </div>
            <div class="col-12 col-lg-3 text-center">
                <a href="/planes-informacion" class="btn btn-lg btn-blue-veris px-5">Más información</a>
            </div>
        </div>
    </section>
</div>
@endsection