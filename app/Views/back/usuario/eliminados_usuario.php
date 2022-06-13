<table class="table table-dark table-striped-columns">
    <thead>
        <tr>
            <a href="<?php echo base_url('panel_usuarios'); ?> " class="btn btn-secondary btn-sm"> <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                        class="bi bi-card-checklist" viewBox="0 0 16 16">
                        <path
                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path
                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                    </svg>
                    <br>
                    <h6 class="btn-sm">ACTIVOS</h6>
                </i></a>
        </tr>


        <tr>
            <th scope="col"></th>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Operaciones</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach($usuarios as $dato){ ?>
        <tr>
            <td> <br> </td>
            <th scope="row"><?php echo $dato['id']; ?></th>
            <td><?php echo $dato['nombre']; ?></td>
            <td><?php echo $dato['apellido']; ?></td>
            <td><?php echo $dato['usuario']; ?></td>
            <td><?php echo $dato['email']; ?></td>

            <td>

                <a href="<?php echo base_url('restaurar_user?id='.$dato['id']); ?>"
                    class="btn btn-secondary btn-sm"></i>
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