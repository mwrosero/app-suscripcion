@extends('template.app-template')
@section('title')
Veris
@endsection
@section('title-section')
Registro
@endsection

@section('content')
<!-- Firma exitisa -->
<div class="modal fade" id="successComprobanteUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successComprobanteUploadLabel" aria-hidden="true">
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
</div>
<div class="flex-grow-1 container-p-y">
    <section class="mb-4 p-3">
        <div class="text-center mb-4">
            <h1 class="fw-semibold h4 text-primary-veris">Revisa aquí tus documentos</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <ul class="nav nav-tabs radio-navs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a href="#comprobantes" role="tab" data-bs-toggle="tab" class="nav-link fs-14p text-blue-zodiac-950 active"><i class="fa-solid fa-file-pdf me-2"></i> Comprobantes de pago</a>
                    </li>
                    <li class="nav-item d-none">
                        <a href="#facturas" role="tab" data-bs-toggle="tab" class="nav-link fs-14p text-blue-zodiac-950 disabled"><i class="fa-solid fa-file-invoice me-2"></i> Facturas</a>
                    </li>
                </ul>
                
                <div class="tab-content radio-folder">
                    <div class="tab-pane active" role="tabpanel" id="comprobantes">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h3 class="fs-20p fw-medium">Comprobantes de transferencia</h3>
                            </div>
                            <div class="col-12 col-md-3">
                                <select class="form-control form-select" name="year" id="year">
                                    @php
                                        $months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
                                        $initYear = 2025;
                                        $currentYear = (int) date('Y');
                                        $currentMonthNumber = (int) date('n');
                                        $endYear = $currentYear + 5;
                                        $maxYearToShow = $currentYear;
                                    @endphp

                                    @for ($year = $initYear; $year <= $maxYearToShow; $year++)
                                        @php
                                        $selected = ($year === $currentYear) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $year }}" {{ $selected }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <select class="form-control form-select" name="month" id="month">
                                    @for ($month = 1; $month <= 12; $month++)
                                        @php
                                        $selected = ($month === $currentMonthNumber) ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $month }}" {{ $selected }}>
                                            {{ $months[ $month-1 ] }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row" id="listado-comprobantes">
                            {{-- <div class="col-3 mb-3">
                                <div class="card rounded-3" style="box-shadow: 0px 0px 8px 0px #0000001A;">
                                    <div class="card-header text-center">
                                        <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/logo-veris.svg" width="100" alt="veris">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="fw-bold text-primary-veris mb-1 fs-20p">Esencial</h4>
                                        <h5 class="fw-medium text-blue-zodiac-950 mb-1 fs-14p">100 opciones</h5>
                                        <h6 class="fw-normal mb-1 fs-12p">Mes: Octubre</h6>
                                    </div>
                                    <div class="card-footer">
                                        <label for="archivo_oculto" class="btn btn-blue-veris fs-14p w-100 mb-2">
                                            Cargar
                                        </label>
                                        <input type="file" class="form-control fileComprobante d-none" id="archivo_oculto">
                                        <span class="fw-light fs-10p">Formatos: PDF,PNG,JPEG</span>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="facturas">
                        <h3 class="fs-20p">Facturas</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    let codigoCliente = {{ Session::get('infoCliente')->informacionCliente->codigoCliente }};
    let finalFile = null;
    let months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    document.addEventListener('DOMContentLoaded', async () => {
        await listadoComprobantes();

        $('body').on('change', '.fileComprobante', async function (e) {
            console.log(0)
            $('#btn-next').attr('disabled', true);
            finalFile = e.target.files[0];
            if (!finalFile) return;
            console.log("Eligió")
            let value = JSON.parse($(this).attr('data-rel'));
            let eliminarPreviamente = $(this).attr('eliminar-rel')
            await uploadComprobante(value, eliminarPreviamente);
        });

        $('body').on('change', '#year, #month', async function () {
            await listadoComprobantes();
        })
    })

    async function listadoComprobantes(mostrarLoader = true){
        let year = parseInt(getInput('year'));
        let month = parseInt(getInput('month'));
        let args = [];
        args["endpoint"] = api_url + `/empresarial/v1/suscripcion/${codigoCliente}/documentos_comprobantes?codigoEmpresa=1&tipoDocumento=COBROS&anio=${year}&mes=${month}`;
        args["method"] = "GET";
        args["showLoader"] = mostrarLoader;
        args["token"] = _token;

        const data = await call(args);
        console.log(data)

        if(data.code == 200){
            if(data.data.comprobantesPago.length > 0){
                let elem = ``;
                $.each(data.data.comprobantesPago, function(key, value){
                    elem += drawCard(value);
                })
                $('#listado-comprobantes').html(elem);
            }else{
                let elem = `<div class="col-12 mb-3 text-center">No tienes comprobantes en la fecha seleccionada.</div>`;
                $('#listado-comprobantes').html(elem);
            }
        }
    }

    function drawCard(value){
        let logoNombre = 'logo-veris.svg';
        if (value.lineaNegocio === 'PMF') logoNombre = 'parami.png';
        const logoSrc = `${url_site}/assets/img/veris/${logoNombre}`;

        let cardFooter = ``;
        if(value.estadoComprobante !== "ING"){
            cardFooter += `<a href="${value.urlSoporte}" target="_blank" class="btn btn-blue-veris fs-14p w-100 mb-2 text-decoration-none">
                    Visualizar
                </a>`;
        }else if(value.estadoComprobante === "ING" && value.urlSoporte !== null){
            cardFooter += `<a href="${value.urlSoporte}" target="_blank" class="btn btn-blue-veris fs-14p w-100 mb-2 text-decoration-none">
                    Visualizar
                </a>
                <label style="cursor: pointer;" for="archivo_oculto_${value.secuenciaPago}" class="text-primary-veris text-decoration-underline text-center fs-14p w-100 mb-2">
                    Reenviar Comprobante
                </label>
                <input eliminar-rel='S' data-rel='${JSON.stringify(value)}' type="file" class="form-control fileComprobante d-none" id="archivo_oculto_${value.secuenciaPago}">`;
        }else{
            cardFooter += `<label for="archivo_oculto_${value.secuenciaPago}" class="btn btn-blue-veris fs-14p w-100 mb-2">
                Cargar
            </label>
            <input eliminar-rel='N' data-rel='${JSON.stringify(value)}' type="file" class="form-control fileComprobante d-none" id="archivo_oculto_${value.secuenciaPago}">
            <span class="fw-light fs-10p">Formatos: PDF,PNG,JPEG</span>`;
        }

        let elem = `<div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3">
            <div class="card rounded-3" style="box-shadow: 0px 0px 8px 0px #0000001A;">
                <div class="card-header text-center">
                    <img src="${logoSrc}" width="100" alt="veris">
                </div>
                <div class="card-body">
                    <h4 class="fw-bold text-primary-veris mb-1 fs-20p text-capitalize">${value.nombrePlan.toLowerCase()}</h4>
                    <h5 class="d-none fw-medium text-blue-zodiac-950 mb-1 fs-14p">100 opciones</h5>
                    <h6 class="fw-normal mb-1 fs-12p">Mes: ${months[value.mes - 1]}</h6>
                </div>
                <div class="card-footer">
                    ${cardFooter}
                </div>
            </div>
        </div>`;
        return elem;
    }

    async function eliminarComprobante(value){
        let args = [];
        args["endpoint"] = api_url + `/empresarial/v1/suscripcion/${value.secuenciaPago}/documento_pago`;
        args["method"] = "DELETE";
        args["token"] = _token;
        args["showLoader"] = true;
        args["bodyType"] = "json";
        const data = await call(args);
            console.log(data);
    }

    async function uploadComprobante(value, eliminarPreviamente){
        //console.log(value, eliminarPreviamente);
        if(eliminarPreviamente === "S"){
            await eliminarComprobante(value);
        }

        let secuenciaSuscripcion = value.secuenciaSuscripcion;
        const formData = new FormData();
        formData.append("file", finalFile);

        let args = [];
        args["endpoint"] = api_url + `/empresarial/v1/suscripcion/${value.secuenciaPago}/documento_pago`;
        args["method"] = "POST";
        args["token"] = _token;
        args["showLoader"] = true;
        args["data"] = formData;
        args["bodyType"] = "formdata";
        try {
            const data = await call(args);
            console.log(data);
            finalFile = undefined;
            if (data.code == 200) {
                //detalleSuscripcion.comprobante = data.data;
                $('#successComprobanteUpload').modal('show');
                await listadoComprobantes(false);
            } else {
                showMessage('error','Atención', data.message)
                console.log("Error en respuesta:", data);
            }
        } catch (error) {
            console.error("Error en uploadFile:", error);
        }
    }
</script>
@endsection