@extends('template.app-blank')

@section('title', 'Veris Care - Acceder')

@section('body-class', 'login-page')

@section('content')
    <div class="w-100 h-100 position-relative d-flex flex-column justify-content-center align-items-start px-4 px-md-5">
        <div class="position-absolute top-0 start-0 mt-4 ms-4 d-flex align-items-center gap-3 z-1">
            <img src="{{ asset('assets/img/veris/logo-veris.svg') }}" alt="Veris" height="40">
            <img src="{{ asset('assets/img/veris/parami.svg') }}" alt="ParaMi" height="40">
        </div>


    <div class="row g-3 g-xl-5 gap-4 flex-column justify-content-start">
        <div class="col-12">
            <img src="{{ asset('assets/img/veris/titular.svg') }}" alt="Sé parte de Veris Care" class="img-fluid" />
        </div>
        <div class="col-12">
            <div class="row g-3 justify-content-start align-items-end">
                <div class="col-12 col-lg-8">
                    <label for="numeroIdentificacion" class="form-label text-blue-zodiac-950 fw-medium">Número de Identificación*</label>
                    <input type="text" id="numeroIdentificacion" name="numeroIdentificacion" class="form-control form-control-lg rounded-3" placeholder="0999999999" required />
                </div>
                <div class="col-12 col-lg-4">
                    <button class="btn btn-lg btn-blue-veris btn-lg rounded-3 w-100 d-flex align-items-center justify-content-center gap-2 btn-acceder">
                        Continuar <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', async () => {
        $('body').on('click', '.btn-acceder', async function() {
            await validateUser()
        })
    })

    async function validateUser(){
        let tipoIdentificacion = 2;
        let numeroIdentificacion = $('#numeroIdentificacion').val();
        let args = [];
        args["endpoint"] = `${api_url}/general/v1/util/validar_identificacion?codigoTipoIdentificacion=${tipoIdentificacion}&codigoEmpresa=1&numeroIdentificacion=${numeroIdentificacion}`;
        args["method"] = "GET";
        args["showLoader"] = true;
        args["token"] = _token;
        const data = await call(args);
        if(data.code == 200){
            if(data.data.esIdentificacionValida){
                {{-- let paciente = await consultarPaciente();
                console.log(paciente)
                return; --}}
                let suscripcion = {
                    "tipoIdentificacion": 2,
                    "numeroIdentificacion": numeroIdentificacion
                }
                localStorage.setItem(`suscripcion`, JSON.stringify(suscripcion));
                location.href = '/selecciona-empresa';
            }else{
                showMessage('warning','Atención','Número de identificación incorrecto.')
            }
        }else{
            showMessage('warning','Atención',data.message)
        }
    }

    async function consultarPaciente(){
        let tipoIdentificacion = 2;
        let numeroIdentificacion = $('#numeroIdentificacion').val();

        let args = [];
        args["endpoint"] = `${api_url}/general/v1/pacientes/consulta_basica?codigoTipoIdentificacion=${tipoIdentificacion}&tipoFiltro=numeroIdentificacion&numeroIdentificacion=${numeroIdentificacion}&page=1&perPage=1`;
        args["method"] = "GET";
        args["showLoader"] = true;
        args["token"] = _token;

        const data = await call(args);
        return data
    }
</script>
@endpush