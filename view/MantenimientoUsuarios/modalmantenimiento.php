<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo">Modal title</h4>
            </div>

            <form method="post" id="usuario_form">
                <div class="modal-body">

                    <input type="hidden" name="usu_id" id="usu_id">


                    <div class="form-group">
                        <label class="form-label" for="usu_nom">Nombre</label>
                        <input type="text" class="form-control" id="usu_nombre" name="usu_nombre" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_ape">Apellido</label>
                        <input type="text" class="form-control" id="usu_apellido" name="usu_apellido"  placeholder="Ingrese los apellidos" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_correo">Correo</label>
                        <input type="email" class="form-control" id="usu_correo" name="usu_correo" placeholder="example@example.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_pass">Contraseña</label>
                        <input type="text" class="form-control" id="usu_password"  name="usu_password" placeholder="Ingrese la contraseña" required>
                    </div>
                    <div class="form-group">
                            <label class="form-label" for="rol_id">Rol</label>
                            <select class="select2" id="rol_id" name="rol_id">
                                <option value="1">Usuario</option>
                                <option value="2">Soporte</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_celular">Celular</label>
                        <input type="text" class="form-control" id="usu_celular" name="usu_celular" placeholder="Ingrese la contraseña" required>
                    </div>

                    <div class="form-group">
                            <label class="form-label" for="usu_tipo_documento">Tipo de documento</label>
                            <select class="select2" id="usu_tipo_documento" name="usu_tipo_documento">
                                <option value="DNI">DNI</option>
                                <option value="CEDULA">CEDULA</option>
                                <option value="CARNET_DE_EXTRANJERIA">CARNET_DE_EXTRANJERIA</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_numero_documento">N° de documento</label>
                        <input type="text" class="form-control" id="usu_numero_documento" name="usu_numero_documento"  placeholder="Ingrese los apellidos" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="fech_nacimiento">Fecha de Nac.</label>
                        <input type="date" class="form-control" id="fech_nacimiento" name="fech_nacimiento"  placeholder="Ingrese los apellidos" required>
                    </div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>