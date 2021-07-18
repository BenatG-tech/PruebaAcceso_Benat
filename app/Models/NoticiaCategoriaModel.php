<?php 
namespace App\Models;
use CodeIgniter\Model;

class NoticiaCategoriaModel extends Model
{
    protected $table = 'tbl_noticias_tiene_categorias';

    //protected $primaryKey = 'id';
    
    protected $allowedFields = ['noticias_id', 'noticias_categorias_id'];

    protected $returnType = 'array';
    protected $useTimestamps = false; 
    protected $createdField = 'created_at'; 
    protected $updatedField = 'updated_at'; 
    protected $deletedField = 'deleted_at'; 
    protected $validationRules = [
        'noticias_id' => 'required',
        'noticias_categorias_id' => 'required'
    ]; 
    protected $validationMessages = []; 
    protected $skipValidation = true; 

    public function getEntityNoticia($noticias_id) { 
        return $this->where("noticias_id=". $noticias_id)->find(); 
    } 
    public function getEntityCategoria($noticias_categorias_id) { 
        return $this->where("noticias_categorias_id=". $noticias_categorias_id)->find(); 
    }
    
    public function getEntityNoticiasCategoria($noticias_id, $noticias_categorias_id) { 
        return $this->where("noticias_id=". $noticias_id . " and noticias_categorias_id=". $noticias_categorias_id)->find(); 
    }

    /**public function getEntity($identity) {  
     *  return $this->orderBy("identity",'DESC')->limit(0, $limit)->find(); 
    }*/
}