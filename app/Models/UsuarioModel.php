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
        'Usuario' => 'required',
        'Contrasena' => 'required',
        'Email' => 'required'
    ]; 
    protected $validationMessages = []; 
    protected $skipValidation = false; 

    public function getEntity($identity) { 
        return $this->where("id=". $identity)->find(); 
    } 

    /**public function getEntity($identity) {  
     *  return $this->orderBy("identity",'DESC')->limit(0, $limit)->find(); 
    }*/
}