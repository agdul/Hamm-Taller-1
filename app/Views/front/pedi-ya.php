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



    <div class="container productos d-flex" style="max-width: 1281px">
        <?php foreach ($productos as $producto) : ?>
        <?php if($producto['categoria_id'] == '1' && $producto['baja_producto'] == null){?>
        <div class="card-group">
            <div class="card text-center">
                <!-- <img src="<?php echo $producto['img_producto']?>" class="card-img-top" alt="Apolo" /> -->
                <img width="500" src="<?php echo base_url('assets/uploads/'.$producto['img_producto'])?>">
                <div class="card-body">
                    <div id="venta">
                        <b> - <?php echo $producto['nombre_producto']?> - </b>
                        <i> <?php echo $producto['descripcion_producto']?> ----------->
                            $<?php echo $producto['precio_producto']?></i>
                        <!-- <div>
                                                                  <img src="assets/img/iconos/carrito-compras.svg" alt="">
                                                              </div> -->

                        <!-- Cierra condicion de stock -->

                    </div>
                </div>
                <div class="card-footer d-flex flex-row-reverse justify-content-center" style="background-color: #deb;">
                    <?php if(session()->get('perfil_id') == 2 && session()->get('loggedIn')) {
                    echo form_open('Carrito_controller/agregar_carrito');
                    echo form_hidden('id_producto', $producto['id_producto']);
                    echo form_hidden('nombre_producto', $producto['nombre_producto']);
                    echo form_hidden('precio_producto', $producto['precio_producto']);
                    echo form_submit('agregar_carrito', 'Agregar al carrito', "class='btn btn-outline-dark btn4'"); 
                    
                    echo form_close();} else{
                    echo form_open('login');  
                    echo form_submit('login', 'Comprar Ya!', "class='btn btn-outline-dark btn4' ");
                    echo form_close();
                        }?>
                    <br>
                    <!-- <small class="text-muted"><button type="button" class="btn btn-warning">Agregar al Carrito</button></small> -->
                </div>
            </div>
        </div>

        <?php } ?>
        <?php endforeach ?>

    </div>



    <div class="container" id="accordion" class="">
        <h2>ARMA A TU ROLL A TU GUSTO!</h2>
        <div class="card">
            <div class="card-header">
                <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                    Paso 1 : Salsas.
                </a>
            </div>
            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                <div class="card-body">

                    <div class="form-check">
                        <input class="form-check-input" type="radio" class="form-check-input" id="radio1"
                            name="optradio" value="option1" checked>
                        <label class="form-check-label">Hummus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" class="form-check-input" id="radio1"
                            name="optradio" value="option1" checked>
                        <label class="form-check-label">Zanahoria</label>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                    Paso 2 : Ingredientes.
                </a>
            </div>
            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                <div class="card-body">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check1" name="option1" value="something">
                        <label class="form-check-label" for="check2">Queso-Dambo</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                        <label class="form-check-label" for="check2">Queso-Muzza</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check3" name="option3" value="something">
                        <label class="form-check-label" for="check2">Lechuga</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check4" name="option4" value="something">
                        <label class="form-check-label" for="check2">Tomate</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check5" name="option5" value="something">
                        <label class="form-check-label" for="check2">Cebolla</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check6" name="option6" value="something">
                        <label class="form-check-label" for="check2">Coles</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check7" name="option7" value="something">
                        <label class="form-check-label" for="check2">Rucula</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check8" name="option8" value="something">
                        <label class="form-check-label" for="check2">Pepino</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check9" name="option9" value="something">
                        <label class="form-check-label" for="check2">Morron-Asado</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check10" name="option10" value="something">
                        <label class="form-check-label" for="check2">Huevo-Duro</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check11" name="option11" value="something">
                        <label class="form-check-label" for="check2">Choclo</label>
                    </div>


                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                    Paso 3 : Adiccionales.
                </a>
            </div>
            <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                <div class="card-body">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check12" name="option2" value="something">
                        <label class="form-check-label" for="check2">Pollo</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check11" name="option2" value="something">
                        <label class="form-check-label" for="check2">Atun</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check13" name="option2" value="something">
                        <label class="form-check-label" for="check2">Dip - Alioli</label>
                    </div>

                </div>
            </div>
            <button type="button" class="btn btn-warning">Agregar al Carrito</button>
        </div>
    </div>

</div>