<div class="container">
    <?php
                if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?php echo session()->getFlashdata('success') ?>
    </div>
    <?php elseif (session()->getFlashdata('failed')) : ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?php echo session()->getFlashdata('failed') ?>
    </div>
    <?php endif; ?>



    

    <?php
                if (session()->getFlashdata('compra_ok')) : ?>
    <div class="alert alert-success alert-dismissible text-center">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?php echo session()->getFlashdata('compra_ok') ?>
    </div>
    <?php elseif (session()->getFlashdata('compra_no')) : ?>
    <div class="alert alert-danger alert-dismissible text-center">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?php echo session()->getFlashdata('compra_no') ?>
    </div>
    <?php endif; ?>








    <div class="container d-flex" style="max-width: 1200px; flex-wrap: wrap; justify-content: center;">
        <?php foreach ($productos as $producto) : ?>
        <div id="unProducto" style="margin: 15px; border: 3px solid #000000; border-radius: 30px; padding: 5px;">
            <div id="imgProducto" style="width: 300px; height: 300px; object-fit: cover; ">
                <img style="width: 300px; height: 300px; border-radius: 30px; border: 3px solid #000000; object-fit: cover;" src="<?php echo base_url('assets/uploads/'.$producto['img_producto'])?>"> 
            </div>
            <div id="infoProducto" style="margin: 0 auto; justify-content: center;" >   
                <h5 style="margin: 0 auto; justify-content: center;"><?php echo $producto['nombre_producto']?></h5>
                    <div id="descProducto" style="justify-content: center; max-width: 300px;">
                    <p style="margin: 0 auto;">
                    <?php echo $producto['descripcion_producto']?>
                    </p>
                    </div>
                    <div id="precioProducto">
                        <p style="font-size: 35px; ">
                            $ <?php echo $producto['precio_producto']?>
                        </p>
                    </div>
            </div>
                    <div id="comprarProducto" class="text-center justify-content-center" style="display: flex; margin: 0 auto;">
                         <?php if(session()->get('perfil_id') == 2 && session()->get('loggedIn')) {
                            echo form_open('Carrito_controller/agregar_carrito', "class='magin: 0 auto;'");
                            echo form_hidden('id_producto', $producto['id_producto']);
                            echo form_hidden('nombre_producto', $producto['nombre_producto']);
                            echo form_hidden('precio_producto', $producto['precio_producto']);
                            echo form_hidden('stock_producto', $producto['stock_producto']);
                            echo form_submit('agregar_carrito', 'Agregar al carrito', "class='text-center btn btn-outline-dark btn4'"); 
                            echo form_close();
                        }else{
                            echo form_open('login');  
                            echo form_submit('login', 'Comprar Ya!', "class='text-center btn btn-outline-dark btn4' ");
                            echo form_close();
                        }?>
                    </div>


        </div>






        <?php endforeach ?>

    </div>



</div>