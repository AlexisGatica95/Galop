<?php namespace App\Controllers;

use App\Models\EventosModel;

class Pages extends BaseController
{

public function index()
	{	
		$data['locale'] = $this->locale;
		$data['ruta_es'] = 'es/'; 
		$data['ruta_en'] = 'en/';
		$model = new EventosModel();
		$eventos = $model->getPostsLimit($this->locale,3);		
		
		$longitud_extracto = 250;

		foreach ($eventos as $key => $evento) {
			$extracto = substr(strip_tags($evento['body'], '<br>'),0,$longitud_extracto);
			if (strlen($extracto)>=$longitud_extracto) {
				$extracto .= '…';
			}
			$eventos[$key]['extracto'] = $extracto;
		}
		$data['eventos'] = $eventos;
		

		// return view('welcome_message');
		echo view('templates/header',$data);
		echo view('pages/home');
		echo view('templates/footer');
	}

	//trae la evento en si
	public function evento($slug)
	{
		// if (! is_file(APPPATH.'/Views/pages/'.$page.'.php')) {
		// 	// no existe la pag
		// 	throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		// }

		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/eventos/'.$slug;
		$data['ruta_en'] = '/en/eventos/'.$slug;

		$model = new eventosModel();
		$data['evento'] = $model->getPostSlug($slug);
		if ($data['evento']['status'] !== "1") {
			return redirect()->to("/".$locale.'/eventos/');
		}
		
		echo view('templates/header',$data);
		echo view('evento');
		echo view('templates/footer');
	}


	//--------------------------------------------------------------------

}
