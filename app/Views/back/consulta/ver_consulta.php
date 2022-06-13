<table class="table table-dark table-striped-columns">

    <?php
    use CodeIgniter\Database\Query;
    $session = session();
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
        <br>
        <br>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Mensaje</th>
            <th scope="col">Contestado</th>
            <th scope="col">Operacion</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach($consultas as $consulta){ ?>
            <?php 
                $db = \Config\Database::connect();
                $db->table('usuarios');
                $query = $db->query('SELECT id, nombre, email FROM usuarios');
                $results = $query->getResultArray();
                foreach ( $results as $a){
                        if($consulta['usuario_id'] == $a['id']){
                        $nombre = $a['nombre'];
                        $email = $a['email'];
                     }
                        
                }?>
            
            <tr>
                <th scope="row"><?php echo $consulta['id_consulta']; ?></th>
                <td><?php echo $consulta['nombre_consulta']; ?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $consulta['descripcion_consulta']; ?></td>
                <td><?php echo $consulta['contestado_consulta']; ?></td>
                
                <td>
                
                
                <a href="<?php echo base_url(['consultas_constestado?id_consulta='.$consulta['id_consulta']]); ?> "
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
                            <h6 class="btn-sm">CONTESTADO</h6>
                            </i></a>
                            
                            </td>
                            
                            </tr>
                            <?php } 
     ?>


    </tbody>

</table>