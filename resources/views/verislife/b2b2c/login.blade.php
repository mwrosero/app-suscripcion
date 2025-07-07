@extends('template.app-blank')

@section('title', 'VerisLife - Login')

@section('body-class', 'login-page')

@section('content')
<div class="w-100 h-100 position-relative d-flex flex-column justify-content-center align-items-start px-4 px-md-5">
    <div class="position-absolute top-0 start-0 mt-4 ms-4 d-flex align-items-center gap-3 z-1">
        <img src="{{ asset('assets/img/veris/logo-veris.svg') }}" alt="Veris" height="40">
        <img src="{{ asset('assets/img/veris/parami.png') }}" alt="ParaMi" height="40">
    </div>


    <div class="row g-3 g-xl-5 gap-4 flex-column justify-content-start">
        <div class="col-12">
            <img src="{{ asset('assets/img/veris/titular.svg') }}" alt="Sé parte de Veris Care" class="img-fluid" />
        </div>
        <div class="col-12">
            <form action="#!" method="POST" class="row g-3 justify-content-start align-items-end">
                @csrf
                <div class="col-12 col-lg-8">
                    <label for="dni" class="form-label text-blue-zodiac-950 fw-medium">Número de Identificación*</label>
                    <input type="text" id="dni" name="dni" class="form-control form-control-lg rounded-3" placeholder="0999999999" required />
                </div>
                <div class="col-12 col-lg-4">
                    <button type="submit" class="btn btn-lg btn-blue-veris btn-lg rounded-3 w-100 d-flex align-items-center justify-content-center gap-2">
                        Continuar <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection