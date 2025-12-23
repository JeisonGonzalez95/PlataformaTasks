<div class="card bg-glass shadow-sm">
    <div class="card-body px-4 py-5 px-md-5">
        <div class="bg-glass shadow-sm position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Cerrar"
                popovertarget="taskAdd" popovertargetaction="hide"></button>
        </div>
        <div id="formTaskAdd" class="formulario" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-users fa-2x me-3" style="color:rgb(25, 171, 255);"></i>
                    <h2 class="fw-bold mb-0"><span name='ttl'></span> Agregar Tarea</h2>
                </div>
            </div>
            <form action="{{ route('addTask') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="title">Titulo:</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Ingrese el Titulo de la tarea">
                    </div>
                    <div class="col-md-4">
                        <label for="priority">Prioridad:</label>
                        <select name="priority" id="priority" class="form-select">
                            <option value="">Seleccione Uno...</option>
                            <option value="1">Urgente</option>
                            <option value="2">Alta</option>
                            <option value="3">Media</option>
                            <option value="4">Baja</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="descripcion">Fecha de vencimiento:</label>
                        <input class="form-control" type="date" name="date_vic" id="date_vic" required>
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="description" id="description" rows="2"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <button class="btn btn-success w-100" type="submit">Registrar Tarea</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
