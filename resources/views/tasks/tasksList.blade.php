@extends('source.index')

@section('contentR')
    <div class="content-wrapper">
        <div class="card bg-glass shadow-sm">
            <div class="card-body px-4 py-5 px-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-list-check fa-2x me-3" style="color:rgb(25, 171, 255);"></i>
                        <h2 class="fw-bold mb-0">Tareas</h2>
                    </div>
                    <button type="button" class="btn btn-outline-primary" title="Agregar Tarea" popovertarget="taskAdd"
                        popovertargetaction="show" data-form="formTaskAdd" onclick="mostrarFormulario(this)">
                        <i class="fa-regular fa-calendar-plus"></i>
                        Agregar Tarea
                    </button>
                </div>

                <div class="table-responsive">
                    <table id="tablaTareas" class="table table-striped table-hover table-bordered text-center align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Prioridad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userTask as $task)
                                <tr onclick="window.location='{{ route('viewTask', ['id' => $task->id]) }}';"
                                    style="cursor:pointer;">
                                    @php
                                        if ($task->state == 0) {
                                            $state = 'Pendiente';
                                            $bst = 'warning';
                                            $val = '';
                                            $colorE = '#E3C578';
                                        } else {
                                            $state = 'Completada';
                                            $bst = 'secondary';
                                            $val = 'disabled';
                                            $colorE = '#78E38B';
                                        }

                                        $priority = $task->priority_id;

                                        if ($priority == 1) {
                                            $color = '#D4372C';
                                        } elseif ($priority == 2) {
                                            $color = '#E3C578';
                                        } elseif ($priority == 3) {
                                            $color = '#47B7BA';
                                        } else {
                                            $color = '#78E38B';
                                        }
                                    @endphp
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td style="background-color: {{ $color }}">{{ $task->priority->type }}</td>
                                    <td style="background-color: {{ $colorE }}">{{ $state }}</td>
                                    @php
                                        $dataTask = [
                                            'id' => $task->id ?? '',
                                            'title' => $task->title ?? '',
                                            'description' => $task->description ?? '',
                                            'due_date' => $task->due_date ?? '',
                                            'priority' => $task->priority->type ?? '',
                                        ];
                                    @endphp
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-link text-{{ $bst }} me-3 p-0"
                                                title="Editar Tarea" popovertarget="taskEdt" popovertargetaction="show"
                                                data-form="formTaskEdit" data-task-id='@json($dataTask)'
                                                onclick="event.stopPropagation();mostrarFormulario(this)" {{ $val }}>
                                                <i class="fa-solid fa-pen"></i> Editar tarea
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="taskAdd" popover class="popover-bootstrap">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow">
                    <div class="modal-body">
                        @include('tasks.addTask')
                    </div>
                </div>
            </div>
        </div>
        <div id="taskEdt" popover class="popover-bootstrap">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow">
                    <div class="modal-body">
                        @include('tasks.editTask')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
