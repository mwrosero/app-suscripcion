@extends('template.verisLife.app-template')
@section('title')
Veris - Verificacion Plan
@endsection
@section('title-section')
Registro
@endsection

@section('content')
<div class="flex-grow-1 container-p-y">

    <div class="modal fade" id="detallePlanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detallePlanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close bg-blue-zodiac-950" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="card bg-transparent table-responsive rounded-4 border-perano-300 mb-4">
                        <table class="table text-center text-blue-zodiac-950 align-middle bg-transparent mb-0" style="overflow: hidden;">
                            <thead class="bg-perano-300">
                                <tr>
                                    <th class="bg-transparent text-primary-veris py-3">Descuentos en servicios</th>
                                    <th class="bg-transparent text-blue-zodiac-950 py-3">Veris</th>
                                    <th class="bg-transparent text-blue-zodiac-950 py-3">Para mi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td class="py-3">
                                        <i class="fa-solid fa-stethoscope fs-3 d-block mb-1 text-blue-zodiac-950"></i>
                                        <span class="fs-6 fw-medium">Consultas</span>
                                    </td>
                                    <td class="py-3">
                                        <div class="fw-medium">20%</div>
                                        <small class="text-xs lh-sm">*en cada consulta adicional</small>
                                    </td>
                                    <td class="py-3">
                                        <div class="fw-medium">General: $8,50 (15%)</div>
                                        <div class="fw-medium">Especialidad: $12 (20%)</div>
                                        <small class="text-xs lh-sm">*en cada consulta adicional</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <i class="fa-solid fa-pills fs-3 d-block mb-1 text-blue-zodiac-950"></i>
                                        <span class="fs-6 fw-medium">Farmacia</span>
                                    </td>
                                    <td class="fs-6 fw-medium py-3">5%</td>
                                    <td class="fs-6 fw-medium py-3">5%</td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <i class="fa-solid fa-flask fs-3 d-block mb-1 text-blue-zodiac-950"></i>
                                        <span class="fs-6 fw-medium">Laboratorio clínico</span>
                                    </td>
                                    <td class="fs-6 fw-medium py-3">15%</td>
                                    <td class="fs-6 fw-medium py-3">20%</td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <i class="fa-solid fa-x-ray fs-3 d-block mb-1 text-blue-zodiac-950"></i>
                                        <span class="fs-6 fw-medium">Imágenes</span>
                                    </td>
                                    <td class="fs-6 fw-medium py-3">Hasta 15%</td>
                                    <td class="fs-6 fw-medium py-3">Hasta 20%</td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <i class="fa-solid fa-prescription fs-3 d-block mb-1 text-blue-zodiac-950"></i>
                                        <span class="fs-6 fw-medium">Procedimientos</span>
                                    </td>
                                    <td class="fs-6 fw-medium py-3">15%</td>
                                    <td class="fs-6 fw-medium py-3">20%</td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <i class="fa-solid fa-crutch fs-3 d-block mb-1 text-blue-zodiac-950"></i>
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
                                    <strong class="text-zodiac-blue h5">Veris Urgencias</strong><br>
                                    <small>Hasta 15% de descuento (Gye)</small>
                                </div>
                                <div class="col-md-6 border-start">
                                    <strong class="text-zodiac-blue h5">Asesoría Médica</strong><br>
                                    <small>Asesoría médica ilimitada a través del contact center</small>
                                </div>
                            </div>
                            <div class="mt-2 text-zodiac-blue h6 fw-medium">
                                **NO APLICA PARA VACUNAS NI VITAMINA C**
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="mb-4 p-3">
        <div class="text-center mb-5">
            <h5 class="fw-semibold">Antes de continuar con el proceso de compra, Verifica los datos .</h5>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card shadow-none border-0 mx-auto mb-4">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold text-center pb-5">Esta es la suscripción que elegiste</h6>

                        <div class="row g-4 border-perano-300 rounded p-3 mb-4">
                            <div class="col-md-6">
                                <h6 class="bg-zumthor-50 text-blue-zodiac-950 fw-semibold text-start px-3 py-2 rounded w-auto">Opción 1</h6>
                                <span class="badge bg-blue-ribbon-600 fw-normal rounded-4 fs-10p mb-2">AHORRA 39%</span>
                                <h2 class="fw-semibold text-blue-zodiac-950 mb-0">$90 <small class="fs-6">/anual</small></h2>
                                <p class="text-fiord-700 text-decoration-line-through small mb-0">PVP $280</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-semibold">Beneficios</h6>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-start lh-sm mb-3">
                                        <i class="bi bi-patch-check-fill text-primary-veris me-2"></i>
                                        <span>4 consultas al año<br><small class="text-fiord-700">Uso inmediato</small></span>
                                    </li>
                                    <li class="d-flex align-items-start lh-sm mb-3">
                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                        <span>1 Profilaxis</span>
                                    </li>
                                    <li class="d-flex align-items-start lh-sm mb-3">
                                        <i class="bi bi-patch-check-fill text-dark me-2"></i>
                                        <span>Consulta Optométrica y Odontológica</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <button type="button" class="btn text-mariner-600 fw-medium" data-bs-toggle="modal" data-bs-target="#detallePlanModal">
                                Ver detalles del plan
                            </button>
                        </div>

                        <h6 class="fw-semibold mb-3">Datos de la empresa</h6>
                        <form id="verificacionPlanForm" class="row g-3 needs-validation" novalidate action="#!" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label text-blue-zodiac-950 fw-semibold">RUC</label>
                                <input type="text" class="form-control" value="9999999999999" required readonly />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-blue-zodiac-950 fw-semibold">Razón Social</label>
                                <input type="text" class="form-control" value="Empresa 1" required readonly />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-blue-zodiac-950 fw-semibold">Código empresa</label>
                                <input type="text" class="form-control" value="ASCO099" required readonly />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-blue-zodiac-950 fw-semibold">Crédito empresa</label>
                                <input type="text" class="form-control" value="Sí/No" required readonly />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-blue-zodiac-950 fw-semibold">Empresa subsidiada</label>
                                <input type="text" class="form-control" value="Sí/No" required readonly />
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Acepto <a href="#!" class="text-mariner-600 text-decoration-none">Términos y Condiciones</a> <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy">
                                    <label class="form-check-label" for="privacy">
                                        He leído y comprendo la autorización para el <a href="#!" class="text-mariner-600 text-decoration-none">Tratamiento de mis datos personales</a>
                                    </label>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="#!" class="btn btn-outline-cerulean-blue-800"><i class="fa-solid fa-chevron-left me-2"></i> Regresar</a>
                    <button type="submit" form="verificacionPlanForm" class="btn btn-cerulean-blue-800">Continuar <i class="fa-solid fa-chevron-right ms-2"></i></button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection