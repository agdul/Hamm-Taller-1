<?php  
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_models extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $allowedFields = ['nombre','apellido','direccion','usuario','email','pass','perfil_id','baja'];
    

    //datos
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    //protected $returnType = 'array';
    protected $useSoftDeletes = true;

    
    protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
    protected $deletedField = 'baja'; //baja de user

	//protected $skipValidation = false;
}