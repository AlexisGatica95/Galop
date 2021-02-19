<?php namespace App\Controllers;

class Contacto extends BaseController
{
	public function index()
	{
    
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/contacto';
		$data['ruta_en'] = '/en/contacto';
		echo view('templates/header',$data);
		echo view('pages/contacto');
		echo view('templates/footer');
	}

}