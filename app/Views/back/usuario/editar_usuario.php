<div class="container form-productos">
    <h2 class="mt-4">EDITAR USUARIO</h4>
    <form method="POST" action="<?php echo base_url('actualizar_user');?>" autocomplete="off">
    <?php $validation =  \Config\Services::validation(); ?>

        <?= csrf_field() ?>
        <input type="hidden" value=" <?php echo $datos['id']; ?> "name="id"/>
    
        <div class="form-group p-5 pt-1">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label> NOMBRE </label>
                    <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombre']; ?>" autofocus> 
                    <?php if($validation->getError('nombre')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('nombre')?>
                    </div>
                    <?php }?>
                    
                </div>
                <div class="col-12 col-sm-6">
                    <label> APELLIDO </label>
                    <input class="form-control" id="apellido" name="apellido" type="text" value="<?php echo $datos['apellido']; ?>" >
                    <?php if($validation->getError('apellido')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('apellido')?>
                    </div>
                    <?php }?>    
                </div>
                <div class="col-12 col-sm-6">
                    <label> DIRECCION </label>
                    <input class="form-control" id="direccion" name="direccion" type="text" value="<?php echo $datos['direccion']; ?>" >
                    <?php if($validation->getError('direccion')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('direccion')?>
                    </div>
                    <?php }?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> USUARIO </label>
                    <input class="form-control" id="usuario" name="usuario" type="text" value="<?php echo $datos['usuario']; ?>" >
                    <?php if($validation->getError('usuario')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('usuario')?>
                    </div>
                    <?php }?>
                </div>
                
                <div class="col-12 col-sm-6">
                    <label> EMAIL </label>
                    <input class="form-control" id="email" name="email" type="email" value="<?php echo $datos['email']; ?>" >
                    <?php if($validation->getError('email')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('email')?>
                    </div>
                    <?php }?>
                </div>
            <!-- SEGUIR -->
            </div><br>
            <a href=" <?php echo base_url('panel_usuarios'); ?> " class="btn btn-primary">VOLVER</a>
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
    </form>
</div>