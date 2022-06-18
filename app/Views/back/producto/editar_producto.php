<div class="container form-productos">
    <?php $validation =  \Config\Services::validation(); ?>

    <?php
                        if(session()->getFlashdata('success')):?>
                            <div class="alert alert-success alert-dismissible">
                                <img src="<?php echo base_url('assets/uploads/'.session()->getFlashdata('previewImage'));?>" class="img-fluid" width="100" height="100"/>
                                <?php echo session()->getFlashdata('success')?>
                                <strong><?= $validation->listErrors() ?></strong>
                                <button type="button" class="btn-close flex-row-reverse" data-bs-dismiss="alert"></button>
                            </div>
                        <?php elseif(session()->getFlashdata('failed_editar')):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close flex-row-reverse" data-bs-dismiss="alert"></button>
                                <?php echo session()->getFlashdata('failed_editar') ?>
                            </div>
                    <?php endif; ?>
    <h2 class="mt-4">EDITAR PRODUCTOS</h2>
    <form method="POST" enctype='multipart/form-data' action="<?php echo base_url('actualizar_producto');?>" autocomplete="off">
        <?php   ?>
        <?= csrf_field() ?>
        <input type="hidden" value=" <?php echo $datos['id_producto']; ?> "name="id_producto"/>
        <input type="hidden" value=" <?php echo $datos['img_producto']; ?> "name="img_producto"/>
        <input type="hidden" value=" <?php echo $datos['categoria_id']; ?> "name="categoria_id"/>
        <div class="form-group p-5 pt-1">
            <div class="row">
                
                <div class="col-12 col-sm-6">
                    <label> NOMBRE </label>
                    <input class="form-control" id="nombre_producto" name="nombre_producto" type="text" value="<?php echo $datos['nombre_producto']; ?>">

                    <?php if($validation->getError('nombre_producto')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('nombre_producto')?>
                    </div>
                    <?php }?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> PRECIO </label>
                    <input class="form-control" id="precio_producto" name="precio_producto" type="text" value="<?php echo $datos['precio_producto']; ?>">

                    <?php if($validation->getError('precio_producto')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('precio_producto')?>
                    </div>
                    <?php }?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> STOCK </label>
                    <input class="form-control" id="stock_producto" name="stock_producto" type="text" value="<?php echo $datos['stock_producto']; ?>">

                    <?php if($validation->getError('stock_producto')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('stock_producto')?>
                    </div>
                    <?php }?>
                </div>

                <div class="col-12 col-sm-6">
                    <label> DESCRIPCION </label>
                    <input class="form-control" id="descripcion_producto" name="descripcion_producto" type="text" value="<?php echo $datos['descripcion_producto']; ?>">
                    <?php if($validation->getError('descripcion_producto')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('descripcion_producto')?>
                    </div>
                    <?php }?>
                </div>


                
                <div class="col-12 col-sm-6">
                    <label> IMG  </label>
                    <input name="img_producto" id="img_producto" type="file" class="form-control" placeholder="Imagen">
                
                    <?php if($validation->getError('img_producto')) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $validation->getError('img_producto')?>
                    </div>
                    
                    <?php }?>
                </div>
               
            </div>
            <br>
            <a href=" <?php echo base_url('panel_productos'); ?> " class="btn btn-primary">VOLVER</a>
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
    </form>
</div>