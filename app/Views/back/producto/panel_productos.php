
<table class="table table-dark table-striped-columns">
    <?php

use CodeIgniter\Database\Query;

                        $db = \Config\Database::connect();
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
    <thead>
        <tr>

            <a href="<?php echo base_url('no_stock_productos'); ?> " class="btn btn-secondary btn-sm"> <i>
                    <!-- <img style="width: 40px; max-height: 40px;" src="img/iconos/eliminar.png" alt="ICONO ELIMINAR"> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                        class="bi bi-file-text" viewBox="0 0 16 16">
                        <path
                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                    </svg>
                    <br>
                    <h6 class="btn-sm">S/N Stock</h6>
                </i></a>

            <a href="<?php echo base_url('add_producto'); ?> " class="btn btn-secondary btn-sm"> <i>
                    <!-- <img style="width: 40px; max-height: 40px;" src="img/iconos/add.png" alt="ICONO AGREGAR"> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                        class="bi bi-clipboard2-plus" viewBox="0 0 16 16">
                        <path
                            d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                        <path
                            d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
                        <path
                            d="M8.5 6.5a.5.5 0 0 0-1 0V8H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V9H10a.5.5 0 0 0 0-1H8.5V6.5Z" />
                    </svg>
                    <br>
                    <h6 class="btn-sm">Agregar</h6>
                </i></a>

        </tr>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">IMG</th>
            <th scope="col">Categoria</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Operaciones</th>
        </tr>
    </thead>
    <tbody>

    
        <?php 
        foreach($productos as $dato){ 
            $db = \Config\Database::connect();
            $query = $db->query('SELECT id_descripcion FROM categorias LIMIT 1');
            $row   = $query->getRow();    
            ?>
        
        <tr>
            <th scope="row"><?php echo $dato['id_producto']; ?></th>
            <td><img width="100" src="<?php echo base_url('assets/uploads/'.$dato['img_producto'])?>"></td>
            <td><?php echo $row->id_descripcion; ?></td>
            <td><?php echo $dato['nombre_producto']; ?></td>
            <td><?php echo $dato['precio_producto']; ?></td>
            <td><?php echo $dato['stock_producto']; ?></td>
            <td><?php echo $dato['descripcion_producto']; ?></td>

            <td>
                <a href="<?php echo base_url('editar_producto?id_producto='.$dato['id_producto']); ?>"
                    class="btn btn-secondary btn-sm"> <i>
                        <!-- <img style="width: 40px; max-height: 40px;" src="img/iconos/editar.png" alt="ICONO EDITAR"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                        <br>
                        <h6 class="btn-sm">EDITAR</h6>
                    </i></a>
                <!--editar-->

                <a href="<?php echo base_url('eliminar_producto?id_producto='.$dato['id_producto']); ?> "
                    class="btn btn-secondary btn-sm"> <i>
                        <!-- <img style="width: 40px; max-height: 40px;" src="img/iconos/eliminar.png" alt="ICONO ELIMINAR"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                            class="bi bi-clipboard2-x" viewBox="0 0 16 16">
                            <path
                                d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                            <path
                                d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
                            <path
                                d="M8 8.293 6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293Z" />
                        </svg>
                        <br>
                        <h6 class="btn-sm">ELIMINAR</h6>
                    </i></a>
            </td>

        </tr>
        <?php } 
     ?>


    </tbody>


</table>