@extends('app')

@section('contentM')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img class="img-logo" src="{{ asset('images/plataforma.png') }}" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </ul>
                <span class="text-center txt-smll">
                    {{ session('fullname') }} <br>
                    <p id="hora"> </p>
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-success" title="Cerrar Sesión">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <div class="sidebar" id="sidebar">
        <button class="menu-toggle" id="menuToggle">☰</button>
        <a href="{{ route('index') }}" class="menu-item">Inicio</a>
        <a href="{{ route('taskList') }}" class="menu-item">Tareas</a>
    </div>
@endsection




