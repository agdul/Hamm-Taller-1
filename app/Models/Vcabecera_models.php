<?php  
namespace App\Models;
use CodeIgniter\Model;

class Vcabecera_models extends Model{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id_venta_cabecera';
    protected $allowedFields = ['usuario_id','total_venta'];
    

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $useTimestamps = false;
    //protected $createdField  = '';
    protected $updatedField  = 'fecha_venta';
    //protected $deletedField  = 'contestado_consulta';

	//protected $skipValidation = false;
}
