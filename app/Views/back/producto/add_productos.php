<div class="container mt-1 mb-0 justify-content-center">
    <div class="card d-flex"  id="add_usuario"style="width: 55%;">
    <?php $validation =  \Config\Services::validation(); ?>
    <?php
                        if(session()->getFlashdata('success')):?>
                            <div class="alert alert-success alert-dismissible">
                                <img src="<?php echo base_url('assets/uploads/'.session()->getFlashdata('previewImage'));?>" class="img-fluid" width="100" height="100"/>
                                <?php echo session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close flex-row-reverse" data-bs-dismiss="alert"></button>
                            </div>
                        <?php elseif(session()->getFlashdata('failed')):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close flex-row-reverse" data-bs-dismiss="alert"></button>
                                <?php echo session()->getFlashdata('failed') ?>
                            </div>
                    <?php endif; ?>
        <div class="card-header text-center">

            <h3>Agregar Productos</h3>
        </div>

                    
        <form method="POST" enctype='multipart/form-data' action="<?php echo base_url("insertar_producto"); ?> ">
        <?= csrf_field() ?>
            <div class="card-body " media="(max-width:768px)">

                <div class="mb-2">

                    <label for="exampleFormControlInput1" class="form-label">Categoria</label>
                    <!-- <input name="categoria_producto" type="text" class="form-control" placeholder="Categoria"> -->
                    <select class="select" name="categoria_id" id="">
                        <option selectd disabled="">Selecciona una Categoria</option>
                        <option value="1">Producto</option>
                        <option value="2">Agregados</option>
                    </select>         

                    <!-- Error -->
                    <?php if(isset($errores ['categoria_id'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['categoria_id']?>
                    </div>
                    <?php }?>

                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nombre</label>
                    <input type="text" name="nombre_producto" class="form-control" placeholder="Nombre">
                    <!-- Error -->

                    <?php if(isset($errores ['nombre_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['nombre_producto']?>
                    </div>
                    <?php }?>

                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Precio</label>
                    <input name="precio_producto" type="text" class="form-control" placeholder="Precio">
                    <!-- Error -->
                    <?php if(isset($errores ['precio_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['precio_producto']?>
                    </div>
                    <?php }?>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Stock</label>
                    <input tyupe="text" name="stock_producto" class="form-control" placeholder="Stock">
                    <!-- Error -->
                    <?php if(isset($errores ['stock_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['stock_producto'] ?>
                    </div>
                    <?php }?>
                </div>



                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Descripcion</label>
                    <input name="descripcion_producto" type="text" class="form-control" placeholder="Descripcion">
                    <!-- Error -->
                    <?php if(isset($errores ['descripcion_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['descripcion_producto'] ?>
                    </div>
                    <?php }?>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Imagen</label>
                    <input name="img_producto" <?php if($validation->getError('img_producto')): ?>is-invalid<?php endif ?> type="file" class="form-control" placeholder="Imagen">
                    <div class="form-group py-4">
                    
                    <?php if ($validation->getError('img_producto')): ?>
                    <div class="alert alert-danger mt-2">
                        <?= $validation->getError('img_producto') ?>
                    </div>
                    <?php endif; ?>
                     
                
                </div>

                <input type="submit" value="guardar" class="btn btn-success">
                <a href=" <?php echo base_url('dashboard'); ?> " class="btn btn-primary">VOLVER</a>

            </div>
        </form>
    </div>
</div>