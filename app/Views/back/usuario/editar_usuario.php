<div class="container form-productos">
    <h2 class="mt-4">EDITAR USUARIO</h4>
    <form method="POST" action="<?php echo base_url('actualizar_user');?>" autocomplete="off">

        <input type="hidden" value=" <?php echo $datos['id']; ?> "name="id"/>

        <div class="form-group p-5 pt-1">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label> NOMBRE </label>
                    <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombre']; ?>" autofocus> 
                    
                </div>
                <div class="col-12 col-sm-6">
                    <label> APELLIDO </label>
                    <input class="form-control" id="apellido" name="apellido" type="text" value="<?php echo $datos['apellido']; ?>" >
                </div>
                <div class="col-12 col-sm-6">
                    <label> DIRECCION </label>
                    <input class="form-control" id="direccion" name="direccion" type="text" value="<?php echo $datos['direccion']; ?>" >
                </div>
                <div class="col-12 col-sm-6">
                    <label> USUARIO </label>
                    <input class="form-control" id="usuario" name="usuario" type="text" value="<?php echo $datos['usuario']; ?>" >
                </div>
                
                <div class="col-12 col-sm-6">
                    <label> EMAIL </label>
                    <input class="form-control" id="email" name="email" type="email" value="<?php echo $datos['email']; ?>" >
                </div>
            <!-- SEGUIR -->
            </div><br>
            <a href=" <?php echo base_url('panel_usuarios'); ?> " class="btn btn-primary">VOLVER</a>
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
    </form>
</div>