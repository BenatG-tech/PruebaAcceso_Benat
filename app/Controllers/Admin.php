<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		return view('admin');
	}

	public function usuarios()
	{
		//conexión con BDD 
		return view('admin_usuarios');
	}

	public function noticias()
	{
		//conexión con BDD 
		return view('admin_noticias');
	}

	public function categorias()
	{
		//conexión con BDD 
		return view('admin_categorias');
	}
}
