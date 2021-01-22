<?php namespace App\Controllers;

class Noticias extends BaseController
{
	public function index()
	{
    
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;

		echo view('templates/header',$data);
		echo view('pages/noticias');
		echo view('templates/footer');
	}

}