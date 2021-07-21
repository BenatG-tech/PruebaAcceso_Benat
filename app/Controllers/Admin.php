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
		return view('admin_usuarios');
	}

	public function login()
	{
		$usuarios = new UsuarioModel();
		$email = $this->request->getPost('email');
		$contrasena = $this->request->getPost('contrasena');

		$datos_usuario = $usuarios->whereIn('Email', $email)->first();
		if (count($datos_usuario) > 0 && strcmp($contrasena, $datos_usuario['Contrasena']) == 0) {
				$data_session = [
					"usuario" => $datos_usuario['id'],
					"contrasena" => $datos_usuario['Contrasena']
				];
				$session = session();
				$session->set($data_session);
				return redirect()->to(base_url('/admin/usuarios'));
			
		} else {
			return redirect()->to(base_url('/'));
		}
		return redirect()->to(base_url('/admin/usuarios'));
	}

	public function logout()
	{
		$session = session();
		$session->destroy();

		return redirect()->to(base_url('/'));
	}

	public function usuarios()
	{
		$usuarios = new UsuarioModel();
		$noticias = new NoticiaModel();
		$data['usuarios'] = $usuarios->findAll();

		if (count($_POST) != 0) {
			$usuario = new UsuarioModel();
			if (sizeof($_POST) == 1) {
				$keys = array_keys($_POST);
				$not = $noticias->where('usuarios_id', $_POST[$keys[0]])->findAll();
				if ($not['0'] == Null) {
					$usuario->delete($_POST[$keys[0]]);
				}
			} else {
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
		}

		return view('admin_usuarios', $data);
	}

	public function noticias()
	{
		$noticias = new NoticiaModel();
		$categorias = new CategoriaModel();
		$noticias_categorias = new NoticiaCategoriaModel();
		$usuarios = new UsuarioModel();
		$data['usuarios'] = $usuarios->findAll();
		$data['noticias'] = $noticias->findAll();
		$data['categorias'] = $categorias->findAll();
		$data['noticias_categorias'] = $noticias_categorias->findAll();
		
		if (count($_POST) != 0) {
			$noticia = new NoticiaModel();
			date_default_timezone_set("Europe/Madrid");
			if (sizeof($_POST) == 1) {
				$keys = array_keys($_POST);
				$noticias_categorias->delete($_POST[$keys[0]]);
				$noticia->delete($_POST[$keys[0]]);
			} else if ($this->request->getPost('idNoticia') != Null) {
				$datos = [
					'Titular' => trim($this->request->getPost('titularNoticia')),
					'Cuerpo' => trim($this->request->getPost('cuerpoNoticia')),
					'Slug' => strtr(strtolower(trim($this->request->getPost('titularNoticia'))), " ", "-")
				];
				$noticia->update($this->request->getPost('idNoticia'), $datos);

				$noticia_categoria = new NoticiaCategoriaModel();
				$datos = [
					'noticias_categorias_id' => trim($this->request->getPost('categoriaNoticia'))
				];
				$noticia_categoria->update($this->request->getPost('idNoticia'), $datos);
			} else {
				$datos = [
					'Titular' => trim($this->request->getPost('titularNoticia')),
					'Cuerpo' => trim($this->request->getPost('cuerpoNoticia')),
					'Slug' => strtr(strtolower(trim($this->request->getPost('titularNoticia'))), " ", "-"),
					'Fecha' => date("Y-m-d"),
					'usuarios_id' =>  trim(session('usuario'))
				];
				$noticia->insert($datos);

				$noticia_categoria = new NoticiaCategoriaModel();
				$ntcs = $noticias->findAll();
				for ($i = 0; $i < sizeof($ntcs); $i++) {
					if (strcmp((String)$ntcs[$i]['Fecha'], date("Y-m-d")) == 0) {
						if (strcmp( trim($this->request->getPost('titularNoticia')) , $ntcs[$i]['Titular'] ) == 0) {
							$datos = [
								'noticias_id' => $ntcs[$i]['id'],
								'noticias_categorias_id' => trim($this->request->getPost('categoriaNoticia'))
							];
							$noticia_categoria->insert($datos);
						}
					}
				}
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
			if (strpos(array_keys($_POST)[0], 'id_') == 0) {
				$keys = array_keys($_POST);
				$categoria->delete($_POST[$keys[0]]);
			} else {
				$datos = [
					'Nombre' => trim($this->request->getPost('nombreCategoria')),
				];
				if ($this->request->getPost('idCategoria') != Null) {
					$categoria->update($this->request->getPost('idCategoria'), $datos);
				} else {
					$categoria->insert($datos);
				}
			}
		}

		return view('admin_categorias', $data);
	}
}