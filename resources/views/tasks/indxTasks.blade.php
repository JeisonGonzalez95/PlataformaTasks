@extends('source.index')

@section('contentR')
    <div class="content-wrapper">
        <div class="card bg-glass shadow-sm">
            <div class="card-body px-4 py-5 px-md-5 text-center">
                <div class="mb-4">
                    <h1 class="fw-bold mb-0">Bienvenido!<br> {{ session('fullname') }}!</h1>
                </div>
                <p class="fw-semibold mb-4 text-muted">Estas son tus tareas activas asignadas segun prioridad</p>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Urgente</h5>
                                <p class="card-text">{{ $conteos->urgente ?? 0 }} tareas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">Alta</h5>
                                <p class="card-text">{{ $conteos->alta ?? 0 }} tareas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Media</h5>
                                <p class="card-text">{{ $conteos->media ?? 0 }} tareas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Baja</h5>
                                <p class="card-text">{{ $conteos->baja ?? 0 }} tareas</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection