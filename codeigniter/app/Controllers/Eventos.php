<?php namespace App\Controllers;

class Eventos extends BaseController
{
	public function index()
	{
    
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;

		echo view('templates/header',$data);
		echo view('pages/eventos');
		echo view('templates/footer');
	}

}