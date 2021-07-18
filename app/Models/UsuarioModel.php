<?php 
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'tbl_usuarios';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['Usuario', 'Contrasena', 'Email'];

    protected $returnType = 'array';
    protected $useTimestamps = false; 
    protected $createdField = 'created_at'; 
    protected $updatedField = 'updated_at'; 
    protected $deletedField = 'deleted_at'; 
    protected $validationRules = [
        'id' => 'required|unique|id',
        'Usuario' => 'required|unique',
        'Contrasena' => 'required',
        'Email' => 'required|unique'
    ]; 
    protected $validationMessages = []; 
    protected $skipValidation = false; 

    public function getEntity($identity) { 
        return $this->where("identity=". $identity)->find(); 
    } 

    /**public function getEntity($identity) {  
     *  return $this->orderBy("identity",'DESC')->limit(0, $limit)->find(); 
    }*/
}