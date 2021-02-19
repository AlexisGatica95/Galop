<?php namespace App\Controllers;

class Institucional extends BaseController
{
	public function index()
	{
    
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = "/es/institucional";
		$data['ruta_en'] = "/en/institucional";

		echo view('templates/header',$data);
		echo view('pages/institucional');
		echo view('templates/footer');
	}

	public function subpaginas($seccion = 'quienes-somos')
	{
		if (! is_file(APPPATH.'/Views/pages/institucional/'.$seccion.'.php')) {
			// no existe la pag
			throw new \CodeIgniter\Exceptions\PageNotFoundException($seccion);
		}
		$locale = $this->request->getLocale();
		$data['locale'] = $locale;
		$data['ruta_es'] = "/es/institucional/".$seccion;
		$data['ruta_en'] = "/en/institucional/".$seccion;
		echo view('templates/header',$data);
		echo view('pages/institucional/'.$seccion);
		echo view('templates/footer');
	}
}
