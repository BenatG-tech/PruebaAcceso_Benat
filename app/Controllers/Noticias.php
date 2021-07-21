<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use App\Models\NoticiaModel;
use App\Models\CategoriaModel;
use App\Models\NoticiaCategoriaModel;

class Noticias extends BaseController
{
	public function index()
	{
		$noticias = new NoticiaModel();
		$usuarios = new UsuarioModel();
		$categorias = new CategoriaModel();
		$noticias_categorias = new NoticiaCategoriaModel();
		$data['noticias'] = $noticias->findAll();
		$data['usuarios'] = $usuarios->findAll();
		$data['categorias'] = $categorias->findAll();
		$data['noticias_categorias'] = $noticias_categorias->findAll();
		return view('noticias_listado', $data);
	}

	public function categoria()
	{
		$noticias = new NoticiaModel();
		$usuarios = new UsuarioModel();
		$categorias = new CategoriaModel();
		$noticias_categorias = new NoticiaCategoriaModel();
		$data['noticias'] = $noticias->findAll();
		$data['usuarios'] = $usuarios->findAll();
		$data['categorias'] = $categorias->findAll();
		$data['noticias_categorias'] = $noticias_categorias->findAll();

		return view('noticias_categoria_listado', $data);
	}

	public function noticia()
	{
		$noticias = new NoticiaModel();
		$usuarios = new UsuarioModel();
		$categorias = new CategoriaModel();
		$noticias_categorias = new NoticiaCategoriaModel();
		$data['noticias'] = $noticias->findAll();
		$data['usuarios'] = $usuarios->findAll();
		$data['categorias'] = $categorias->findAll();
		$data['noticias_categorias'] = $noticias_categorias->findAll();
		
		return view('noticia', $data);
	}

	

}