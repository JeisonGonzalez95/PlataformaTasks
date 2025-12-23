<div class="card bg-glass shadow-sm">
    <div class="card-body px-4 py-5 px-md-5">
        <div class="bg-glass shadow-sm position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Cerrar"
                popovertarget="reguser" popovertargetaction="hide"></button>
        </div>
        <div id="formRegUser" class="formulario" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-users fa-2x me-3" style="color:rgb(25, 171, 255);"></i>
                    <h2 class="fw-bold mb-0"><span name='ttl'></span> Registro de usuario</h2>
                </div>
            </div>
            <form action="{{ route('register_u') }}" method="POST" autocomplete="off">
                @csrf
                <div class="row ">
                    <div class="col-md-12 mb-2">
                        <label class="form-label" for="form3Example1">Nombre Completo</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nombre completo" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label" for="form3Example1">Usuario</label>
                        <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label class="form-label" for="form3Example4">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Correo electronico" required>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label" for="form3Example2">Contraseña</label>
                        <input type="password" id="pass_1" name="pass_1" class="form-control" placeholder="Contraseña" required>
                        <div id="passwordStrengthMeter">
                            <div id="strength-bar" style="height: 5px; width: 0%; background-color: red;"></div>
                        </div>
                        <small id="passwordStrengthMessage" class="form-text text-muted"></small>
                    </div>
                    <div class="col-md-12 mb-5">
                        <label class="form-label" for="form3Example2">Confirmar Contraseña</label>
                        <input type="password" id="pass_2" name="pass_2" class="form-control" placeholder="Confirme Contraseña" required>
                        <small id="passwordMatchMessage" class="text-danger" style="display: none;">Las contraseñas no coinciden.</small>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-3">
                        <button class="btn btn-success w-100" type="submit"> Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
