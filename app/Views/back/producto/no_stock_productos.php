<table class="table table-dark table-striped-columns">
    <thead>
        <tr>
            <a href="<?php echo base_url('panel_productos'); ?> " class="btn btn-secondary btn-sm"> <i>
                    <!-- <img style="width: 40px; max-height: 40px;" src="img/iconos/eliminar.png" alt="ICONO ELIMINAR"> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                        class="bi bi-file-text" viewBox="0 0 16 16">
                        <path
                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                    </svg>
                    <br>
                    <h6 class="btn-sm">ACTIVOS</h6>
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


        <?php foreach($productos as $dato){ ?>
        <tr>
        <th scope="row"><?php echo $dato['id_producto']; ?></th>
            <td><img width="100" src="<?php echo base_url('assets/uploads/'.$dato['img_producto'])?>"></td>
            <td><?php echo $dato['categoria_id']; ?></td>
            <td><?php echo $dato['nombre_producto']; ?></td>
            <td><?php echo $dato['precio_producto']; ?></td>
            <td><?php echo $dato['stock_producto']; ?></td>
            <td><?php echo $dato['descripcion_producto']; ?></td>

            <td>
                <a href="<?php echo base_url('restaurar_producto?id_producto='.$dato['id_producto']); ?>"
                    class="btn btn-secondary btn-sm"></i>
                    <!-- <img style="width: 50px; max-height: 50px;" src="img/iconos/restaurar.png" alt="ICONO RESTAURAR"> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                        class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
                        <path
                            d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z" />
                        <path
                            d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z" />
                    </svg>
                    <br>
                    <h6 class="btn-sm">RESTAURAR</h6>
                </a>
            </td>

        </tr>
        <?php } 
     ?>


    </tbody>


</table>