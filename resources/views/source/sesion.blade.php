@extends('app')

@section('message')
    <div class="col-lg-6 mb-5 mb-lg-0 welcome">
        <h1 class="my-5 display-6 fw-bold titulo">
            Bienvenido a la mejor plataforma <br>
            <span>organizacional Online</span>
        </h1>
    </div>
@endsection

@section('content')
    <div class="card bg-glass">
        <div class="card-body px-4 py-5 px-md-5">
            <form action="{{ route('login') }}" method='post'>
                @csrf
                <div class="text-center mb-3">
                    <img class="img-logo-s" src="{{ asset('images/plataforma.png') }}" alt="Logo">
                </div>
                <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h1 fw-bold mb-0">Iniciar Sesion</span>
                </div>
                <div data-mdb-input-init class="form-outline mb-3">
                    <input type="username" id="username" name="username" class="form-control" required>
                    <label class="form-label" for="form3Example3">Usuario</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control" required>
                    <label class="form-label" for="form3Example4">Contraseña</label>
                </div>
                <div class="row mb-4">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block mb-4">
                        Ingresar
                    </button>
                    <label for="noUser" class="form-label text-center"> ¿Aun no tiene usuario? Registrese aqui.</label>
                </div>
            </form>
            <div id="reguser" popover class="popover-bootstrap">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow">
                        <div class="modal-body">
                            @include('source.register')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <button popovertarget="reguser" popovertargetaction="show" class="btn btn-primary" data-form="formRegUser"
                    onclick="mostrarFormulario(this)"> Resgitrarse
                </button>
            </div>
        </div>
    </div>
@endsection
