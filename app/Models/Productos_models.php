<?php  
namespace App\Models;
use CodeIgniter\Model;

class Productos_models extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['nombre_producto','categoria_id','nombre_producto','precio_producto','stock_producto','descripcion_producto','img_producto','baja_producto'];
    

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'baja_producto';

	//protected $skipValidation = false;
}




