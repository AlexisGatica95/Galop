<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
    
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;

		echo view('templates/header',$data);
		echo view('pages/home');
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
