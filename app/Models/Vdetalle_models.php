<?php  
namespace App\Models;
use CodeIgniter\Model;

class Vdetalle_models extends Model{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id_venta_detalle';
    protected $allowedFields = ['venta_id','producto_id','cantidad_venta','precio_venta','total_venta'];
    

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $useTimestamps = false;
    //protected $createdField  = '';
    protected $updatedField  = 'fecha_venta';
    //protected $deletedField  = 'contestado_consulta';

	//protected $skipValidation = false;
}
