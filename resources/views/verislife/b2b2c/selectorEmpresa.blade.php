@extends('template.app-blank')
@section('title')
Veris Care - Selecciona la empresa
@endsection

@section('body-class', 'bg-pattens-blue-100-gradient')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-6">
            <div class="row g-0 gap-4 justify-content-center align-items-center mb-5">
                <div class="col-auto">
                    <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/icono-veris-vertical.svg" width="138" alt="Veris Logo">
                </div>
                <div class="col-auto">
                    <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/veris/parami.svg" width="256" alt="ParaMí Logo">
                </div>
            </div>

            <div class="text-center">
                <h5 class="mb-4 fw-semibold text-fiord-700">Hola <span class="nombrePersona text-capitalize"></span>, elige la empresa en la que trabajas</h5>
            </div>

            <div class="row g-3 justify-content-center mb-5">
                <div class="col-12 col-xl-7">
                    <label for="empresa" class="form-label fw-medium text-blue-zodiac-950">Empresas <span class="text-danger">*</span></label>
                    <select id="empresa" class="form-select form-select-lg fs-14p" required>
                    </select>
                </div>
                <div class="col-12 col-xl-7 d-none">
                    <button type="submit" class="btn btn-lg btn-blue-veris w-100">Continuar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    const detalleSuscripcion = JSON.parse(localStorage.getItem('suscripcion'));
    document.addEventListener('DOMContentLoaded', async () => {
        await obtenerEmpresas();

        if(detalleSuscripcion.persona !== {}){
            $('.nombrePersona').html(detalleSuscripcion.persona.primerNombre.toLowerCase())
        }

        $('body').on('change', '#empresa', async function() {
            detalleSuscripcion.empresa = {
                "codigoEmpresa": $('#empresa option:selected').val(),
                "nombreEmpresa": $('#empresa option:selected').html()
            }
            localStorage.setItem(`suscripcion`, JSON.stringify(detalleSuscripcion));
            location.href = '/centro-medico';
        })
    })

    async function obtenerEmpresas(){
        let args = [];
        args["endpoint"] = api_url + `/empresarial/v1/suscripcion/empresas`;
        args["method"] = "GET";
        args["showLoader"] = true;
        args["token"] = _token;
        const data = await call(args);
        if(data.code == 200){
            let elem = `<option></option>`;
            $.each(data.data, function(key, value){
                elem += `<option value='${value.codigoCliente}'>${value.nombreCliente}</option>`;
            })
            $('#empresa').html(elem).select2({
                placeholder: "Seleccione una empresa",
                allowClear: true
            });
            {{-- if(data.data.esIdentificacionValida){
                let suscripcion = {
                    "tipoIdentificacion": 2,
                    "numeroIdentificacion": numeroIdentificacion
                }
                localStorage.setItem(`suscripcion`, JSON.stringify(suscripcion));
                location.href = '/selecciona-empresa';
            }else{
                showMessage('warning','Atención',data.message)
            } --}}
        }else{
            showMessage('warning','Atención',data.message)
        }
    }
</script>
@endpush