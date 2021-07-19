<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use App\Models\NoticiaModel;
use App\Models\CategoriaModel;
use App\Models\NoticiaCategoriaModel;

class Admin extends BaseController
{
	public function index()
	{
		return view('admin');
	}

	public function usuarios()
	{
		$usuarios = new UsuarioModel();
		$data['usuarios'] = $usuarios->findAll();

		if (count($_POST) != 0) {
			$usuario = new UsuarioModel();
			$datos = [
				'Usuario' => trim($this->request->getPost('usuarioUsuario')),
				'Contrasena' => trim($this->request->getPost('contrasenaUsuario')),
				'Email' =>trim($this->request->getPost('emailUsuario'))
			];
			if ($this->request->getPost('idUsuario') != Null) {
				$usuario->update($this->request->getPost('idUsuario'), $datos);
			} else {
				$usuario->insert($datos);
			}
		}

		return view('admin_usuarios', $data);
	}

	public function noticias()
	{
		$noticias = new NoticiaModel();
		$categorias = new CategoriaModel();
		$noticias_categorias = new NoticiaCategoriaModel();
		$data['noticias'] = $noticias->findAll();
		$data['categorias'] = $categorias->findAll();
		$data['noticias_categorias'] = $noticias_categorias->findAll();
		if (count($_POST) != 0) {
			$noticia = new NoticiaModel();
			date_default_timezone_set("Europe/Madrid");
			if ($this->request->getPost('idNoticia') != Null) {
				$datos = [
					'Titular' => trim($this->request->getPost('titularNoticia')),
					'Cuerpo' => trim($this->request->getPost('cuerpoNoticia')),
					'Slug' => strtr(strtolower(trim($this->request->getPost('titularNoticia'))), " ", "-")
				];
				$noticia->update($this->request->getPost('idNoticia'), $datos);
			} else {
				$datos = [
					'Titular' => trim($this->request->getPost('titularNoticia')),
					'Cuerpo' => trim($this->request->getPost('cuerpoNoticia')),
					'Slug' => strtr(strtolower(trim($this->request->getPost('titularNoticia'))), " ", "-"),
					'Fecha' => date("Y-m-d")
				];
				$noticia->insert($datos);

				//Registrar cambios de categoría 
				/**$noticia_categoria = new NoticiaCategoriaModel();
				$datos = [
					'noticia_id' => trim($this->request->getPost('idNoticia')),
					'categoria_id' => trim($this->request->getPost('categoriaNoticia'))
				];
				$noticia_categoria->insert($datos);*/

			}
		}

		return view('admin_noticias', $data);
	}

	public function categorias()
	{
		$categorias = new CategoriaModel();
		$data['categorias'] = $categorias->findAll();
		if (count($_POST) != 0) {
			$categoria = new CategoriaModel();
			$datos = [
				'Nombre' => trim($this->request->getPost('nombreCategoria')),
			];
			if ($this->request->getPost('idCategoria') != Null) {
				$categoria->update($this->request->getPost('idCategoria'), $datos);
			} else {
				$categoria->insert($datos);
			}
		}

		return view('admin_categorias', $data);
	}
}