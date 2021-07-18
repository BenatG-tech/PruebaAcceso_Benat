<?php 
namespace App\Models;
use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table = 'tbl_noticias_categorias';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['Nombre'];

    protected $returnType = 'array';
    protected $useTimestamps = false; 
    protected $createdField = 'created_at'; 
    protected $updatedField = 'updated_at'; 
    protected $deletedField = 'deleted_at'; 
    protected $validationRules = [
        'id' => 'required|unique|id',
        'Nombre' => 'required|unique'
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