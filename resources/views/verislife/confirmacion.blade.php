@extends('template.app-template')
@section('title')Veris - Confirmación @endsection

@section('content')
@php
    use Carbon\Carbon;
    // Establecer zona horaria
    $now = Carbon::now('America/Bogota'); // UTC-5 (también puedes usar 'America/Guayaquil')
    $nextYear = $now->copy()->addYear();
@endphp

<div class="flex-grow-1 container-p-y">
    <section class="mb-4 p-3">
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
                                        <div class="option-info">
                                            <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRASTE 36%</span>
                                            <h4 class="option-title mb-0 nombrePlan">Esencial</h4>
                                        </div>
                                        <div class="price-block text-start">
                                            <h4 class="fw-semibold mb-0">$9000 <small class="fw-normal fs-14p">/100 opciones</small></h4>
                                            <p class="text-fiord-700 text-decoration-line-through small mb-0">PVP $9500.00 </p>
                                        </div>
                                    </div>
                                    <!-- Beneficios -->
                                    <div class="text-start mb-4">
                                        <ul class="list-unstyled mb-0 lista-beneficios">
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
                                <div>Fecha de inicio de contrato:</div>
                                <div class="detail-value">{{ $now->format('d/m/Y') }}</div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start border-0">
                                <div>Fecha de fin de contrato:</div>
                                <div class="detail-value">{{ $nextYear->format('d/m/Y') }}</div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-cerulean-blue-800 px-lg-5">
                            <span class="d-none d-sm-inline">Volver al inicio</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
@endpush