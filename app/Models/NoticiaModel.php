<?php 
namespace App\Models;
use CodeIgniter\Model;

class NoticiaModel extends Model
{
    protected $table = 'tbl_noticias';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['Titular', 'Cuerpo', 'Fecha', 'Slug', 'usuarios_id'];

    protected $returnType = 'array';
    protected $useTimestamps = false; 
    protected $createdField = 'created_at'; 
    protected $updatedField = 'updated_at'; 
    protected $deletedField = 'deleted_at'; 
    protected $validationRules = [
        'id' => 'required|unique|id',
        'Titular' => 'required',
        'Fecha' => 'required',
        'Slug' => 'required|unique',
        'email' => 'required'
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