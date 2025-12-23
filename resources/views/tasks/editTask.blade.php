<div class="card bg-glass shadow-sm">
    <div class="card-body px-4 py-5 px-md-5">
        <div class="bg-glass shadow-sm position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Cerrar"
                popovertarget="taskEdt" popovertargetaction="hide"></button>
        </div>
        <div id="formTaskEdit" class="formulario" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-users fa-2x me-3" style="color:rgb(25, 171, 255);"></i>
                    <h2 class="fw-bold mb-0"><span name='ttl'></span> Editar Tarea</h2>
                </div>
            </div>
            <form action="{{ route('editTask') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @php
                    $docs = '';
                @endphp
                <input type="hidden" name="task_id" id="task_id">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="title">Titulo:</label>
                        <input class="form-control" type="text" name="title_t" id="title_t" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="priority">Prioridad:</label>
                        <input class="form-control" type="text" name="pri_t" id="pri_t" disabled>
                    </div>
                    <div class="col-md-4">
                        <label for="descripcion">Fecha de vencimiento:</label>
                        <input class="form-control" type="text" name="date_t" id="date_t" disabled>
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="desc_t" id="desc_t" rows="2" disabled></textarea>
                    </div>
                </div>

                <div class="container-white container-white mb-5">
                    <div class="mb-3 text-center">
                        <label for="document" class="btn btn-outline-primary rounded-pill px-4 py-2">
                            <i class="fas fa-paperclip me-2"></i> Adjuntar archivo
                        </label>
                        <input type="file" name="document[]" id="document" class="d-none" accept="image/*,.pdf"
                            multiple>
                    </div>
                    <div id="filePreview" class="border rounded p-3 text-center mb-3 bg-light"
                        style="min-height: 150px;">
                        <span class="text-muted">Vista previa del archivo seleccionado</span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-6">
                        <button class="btn btn-success w-100" type="submit">Editar Tarea</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
