@extends('source.index')

@section('contentR')
    <div class="content-wrapper">
        <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
                <div class="d-flex align-items-center mb-5 pb-1">
                    <i class="fas fa-users fa-2x me-3" style="color:rgb(25, 171, 255);"></i>
                    <span class="h1 fw-bold mb-0">Tarea {{ $task->id }}</span>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="title">Titulo:</label>
                        <input class="form-control" type="text" name="title_t" id="title_t" value="{{ $task->title }}"
                            disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="priority">Prioridad:</label>
                        <input class="form-control" type="text" name="pri_t" id="pri_t"
                            value="{{ $task->priority->type }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="descripcion">Fecha de vencimiento:</label>
                        <input class="form-control" type="text" name="date_t" id="date_t"
                            value="{{ $task->due_date }}" disabled>
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="desc_t" id="desc_t" rows="2" disabled>{{ $task->description }}</textarea>
                    </div>
                </div>
                @if ($task->state == 1)
                    <div class="container-white container-white mb-5">
                        <div id="filePreview" class="border rounded p-3 text-center mb-3 bg-light"
                            style="min-height: 150px;">
                            <div class="d-flex flex-wrap justify-content-center">
                                @foreach ($docs as $doc)
                                    @php
                                        $fullPath = asset('/storage/' . $doc->path . $doc->name_doc);
                                        $extension = strtolower(pathinfo($doc->name_doc, PATHINFO_EXTENSION));
                                    @endphp

                                    @if (in_array($extension, ['jpg', 'jpeg', 'png']))
                                        <div class="m-2 text-center">
                                            <a href="{{ $fullPath }}" download>
                                                <img src="{{ $fullPath }}" class="img-fluid rounded"
                                                    style="max-height: 150px;" alt="{{ $doc->name_doc }}"
                                                    title="{{ $doc->name_doc }}">
                                            </a>
                                        </div>
                                    @elseif ($extension === 'pdf')
                                        <div class="d-flex flex-column align-items-center m-2">
                                            <i class="fas fa-file-pdf fa-3x text-danger mb-2"></i>
                                            <a href="{{ $fullPath }}" target="_blank"
                                                class="text-decoration-none small">{{ $doc->name_doc }}</a>
                                        </div>
                                    @else
                                        <p class="text-danger">Archivo no soportado: {{ $doc->name_doc }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row justify-content-center mb-5">
                    <div class="col-3">
                        <a href="{{ route('taskList') }}" class="btn btn-danger w-100">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
