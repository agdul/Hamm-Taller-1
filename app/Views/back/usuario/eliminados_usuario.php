<table class="table table-dark table-striped-columns">
    <thead>
        <tr>
            <a href="<?php echo base_url('panel_usuarios'); ?> "
            class="btn btn-default btn-sm"> <i>
            <img style="width: 40px; max-height: 40px;" src="img/iconos/eliminar.png" alt="ICONO ELIMINAR">
            <br>
            <h6 class="btn btn-secondary btn-sm">ACTIVOS</h6>
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
                class="btn btn-default btn-sm"></i>
                <img style="width: 50px; max-height: 50px;" src="img/iconos/restaurar.png" alt="ICONO RESTAURAR">
                <br><h6 class="btn btn-secondary btn-sm">RESTAURAR</h6>
                </a>
            </td>

        </tr>
        <?php } 
     ?>


    </tbody>


</table>