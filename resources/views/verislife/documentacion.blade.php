{{-- @extends('template.app-template') --}}
@extends('template.app-blank')
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
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#comprobantes" role="tab" data-bs-toggle="tab" class="nav-link active"><i class="fa-solid fa-file-pdf me-2"></i> Comprobantes de pago</a>
                    </li>
                    <li class="nav-item">
                        <a href="#facturas" role="tab" data-bs-toggle="tab" class="nav-link"><i class="fa-solid fa-file-invoice me-2"></i> Facturas</a>
                    </li>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="comprobantes">
                        <h3>Comprobantes de transferencia</h3>
                        <div class="row">
                            <div class="col-3">
                                <div class="card shadow-sm rounded-3">
                                    <div class="card-header text-center">
                                        <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/logo-veris.svg" width="100" alt="veris">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="fw-bold text-primary-veris mb-1">Esencial</h4>
                                        <h5 class="fw-medium text-blue-zodiac-950 mb-1">100 opciones</h5>
                                        <h6 class="fw-normal mb-1">Mes: Octubre</h6>
                                    </div>
                                    <div class="card-footer">
                                        <label for="archivo_oculto" class="btn btn-blue-veris fs-14p w-100 mb-2">
                                            Cargar
                                        </label>
                                        <input type="file" class="form-control fileComprobante d-none" id="archivo_oculto">
                                        <small><span class="fw-light">Formatos: PDF,PNG,JPEG</span></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="facturas">
                        <h3>Facturas</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    let finalFile = null;
    document.addEventListener('DOMContentLoaded', async () => {
        $('.fileComprobante').on('change', async function (e) {
            console.log(0)
            $('#btn-next').attr('disabled', true);
            finalFile = e.target.files[0];
            if (!finalFile) return;
            console.log("Eligió")
            await uploadComprobante();
        });
    })
    
    async function uploadComprobante(){
        const formData = new FormData();
        formData.append("archivo", finalFile);

        let args = [];
        args["endpoint"] = api_url + `/empresarial/v1/suscripcion/documentos?codigoEmpresa=1&nemonicoDocumento=COMPROBANTE_TRANSFERENCIA&secuenciaSuscripcion=123`;
        args["method"] = "POST";
        args["token"] = _token;
        args["showLoader"] = true;
        args["data"] = formData;
        args["bodyType"] = "formdata";
        try {
            const data = await call(args);
            console.log(data);
            if (data.code == 200) {
                detalleSuscripcion.comprobante = data.data;
                $('#successComprobanteUpload').modal('show');
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