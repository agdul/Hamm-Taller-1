<div class="container form-productos">
    <h4 class="mt-4">EDITAR PRODUCTOS</h4>
    <form method="POST" action="<?php echo base_url('actualizar_producto');?>" autocomplete="off">

        <input type="hidden" value=" <?php echo $datos['id_producto']; ?> "name="id_producto"/>

        <div class="form-group p-5 pt-1">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label> CATEGORIA </label>
                    <input class="form-control" id="descripcion_producto" name="descripcion_producto" type="text" value="<?php echo $datos['descripcion_producto']; ?>" autofocus> 

                    <?php if(isset($errores ['descripcion_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['descripcion_producto']?>
                    </div>
                    <?php }?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> NOMBRE </label>
                    <input class="form-control" id="nombre_producto" name="nombre_producto" type="text" value="<?php echo $datos['nombre_producto']; ?>">

                    <?php if(isset($errores ['nombre_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['nombre_producto']?>
                    </div>
                    <?php }?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> PRECIO </label>
                    <input class="form-control" id="precio_producto" name="precio_producto" type="text" value="<?php echo $datos['precio_producto']; ?>">

                    <?php if(isset($errores ['precio_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['precio_producto']?>
                    </div>
                    <?php }?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> STOCK </label>
                    <input class="form-control" id="stock_producto" name="stock_producto" type="text" value="<?php echo $datos['stock_producto']; ?>">

                    <?php if(isset($errores ['stock_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['stock_producto']?>
                    </div>
                    <?php }?>
                </div>

                <div class="col-12 col-sm-6">
                    <label> DESCRIPCION </label>
                    <input class="form-control" id="descripcion_producto" name="descripcion_producto" type="text" value="<?php echo $datos['descripcion_producto']; ?>">
                    <?php if(isset($errores ['descripcion_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['descripcion_producto']?>
                    </div>
                    <?php }?>
                </div>
                
                <div class="col-12 col-sm-6">
                    <label> IMG  </label>
                    <input name="img_producto" id="img_producto" type="file" class="form-control" placeholder="Imagen" value="<?php echo $datos['img_producto']; ?> ">
                    
                    <?php if(isset($errores ['img_producto'])) {?>
                    <div class='alert alert-danger mt-2'>
                        <?= $errores ['img_producto']?>
                    </div>
                    <?php }?>
                </div>

            </div>
            <br>
            <a href=" <?php echo base_url('panel_producto'); ?> " class="btn btn-primary">VOLVER</a>
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
    </form>
</div>