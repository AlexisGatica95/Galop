<?php namespace App\Controllers;

class Upload extends BaseController
{
	public function index()
	{
    
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		// guardo el archivo supuestamente (?)
		// $path = $this->request->getFile('file')->store();

		echo "upload index";
	}

	public function img()
	{
    
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		// guardo el archivo
		$path = $this->request->getFile('file')->store('../../../public/uploads/posts/');

		echo $path;
	}
	//--------------------------------------------------------------------
}
