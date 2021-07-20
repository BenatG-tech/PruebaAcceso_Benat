<?php 
namespace App\Models;
use CodeIgniter\Model;

class NoticiaCategoriaModel extends Model
{
    protected $table = 'tbl_noticias_tiene_categorias';

    protected $primaryKey = 'noticias_id';
    
    protected $allowedFields = ['noticias_id', 'noticias_categorias_id'];

    protected $returnType = 'array';
    protected $useTimestamps = false; 
    protected $createdField = 'created_at'; 
    protected $updatedField = 'updated_at'; 
    protected $deletedField = 'deleted_at'; 
    protected $validationRules = [
        'noticias_categorias_id' => 'required'
    ]; 
    protected $validationMessages = []; 
    protected $skipValidation = true; 
}