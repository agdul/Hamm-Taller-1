<?php  
namespace App\Models;
use CodeIgniter\Model;

class Consultas_models extends Model{
    protected $table = 'consultas';
    protected $primaryKey = 'id_consulta';
    protected $allowedFields = ['usuario_id','nombre_consulta','descripcion_consulta','contestado_consulta'];
    

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    //protected $useTimestamps = false;
    //protected $createdField  = '';
    //protected $updatedField  = '';
    //protected $deletedField  = 'contestado_consulta';

	//protected $skipValidation = false;
}
