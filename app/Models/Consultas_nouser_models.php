<?php  
namespace App\Models;
use CodeIgniter\Model;

class Consultas_nouser_models extends Model{
    protected $table = 'consultas_nouser';
    protected $primaryKey = 'id_consultas_nouser';
    protected $allowedFields = ['nombre_consulta_nouser','apellido_consulta_nouser','direccion_consulta_nouser','email_consulta_nouser','titulo_consula_nouser','descripcion_consula_nouser','fecha_consulta_nouser'];
    

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    //protected $useTimestamps = false;
    //protected $createdField  = '';
    //protected $updatedField  = '';
    //protected $deletedField  = 'contestado_consulta';

	//protected $skipValidation = false;
}
