<?php namespace App\Controllers;

use App\Models\NoticiasModel;

class Noticias extends BaseController
{	
	//trae todos los post paginados con status 1
	public function index()
	{	
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/noticias/';
		$data['ruta_en'] = '/en/noticias/';
		$model = new NoticiasModel();
		$noticias = $model->getPostsPaginados();
		$page = 0;
		if (isset($_GET['p'])) {
			$page = $_GET['p'] - 1;
		}
		if (!array_key_exists($page,$noticias)) {
			$page = 0;
		}
		$noticias = $noticias[$page];
		$longitud_extracto = 250;

		foreach ($noticias as $key => $noticia) {
			$extracto = substr(strip_tags($noticia['body'], '<br>'),0,$longitud_extracto);
			if (strlen($extracto)>=$longitud_extracto) {
				$extracto .= '…';
			}
			$noticias[$key]['extracto']=$extracto;
		}
		$data['noticias'] = $noticias;

		// return view('welcome_message');
		echo view('templates/header',$data);
		echo view('noticias');
		echo view('templates/footer');
	}

	//trae la noticia en si
	public function noticia($slug)
	{
		// if (! is_file(APPPATH.'/Views/pages/'.$page.'.php')) {
		// 	// no existe la pag
		// 	throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		// }

		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/noticias/'.$slug;
		$data['ruta_en'] = '/en/noticias/'.$slug;

		$model = new NoticiasModel();
		$data['noticia'] = $model->getPost($slug);
		
		echo view('templates/header',$data);
		echo view('noticia');
		echo view('templates/footer');
	}

	//quiero que me traiga todas las noticias con parametro traduccion_de = NULL
	public function create()
	{
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/admin/noticia/';
		$data['ruta_en'] = '/en/admin/noticia/';

		helper('form');
		$model = new NoticiasModel();
		$data['notis'] = $model->getPostsParents();

		if (!$this->validate([
			'title' => 'required|max_length[255]',
			'body' => 'required',
			'idioma_select' => 'required'
		])) {
			echo view('admin/templates/header',$data);
			echo view('admin/crear_noticia');
			echo view('admin/templates/footer');
		} else {
			$model->save(
				[
					'title' => $this->request->getVar('title'),
					'body' => $this->request->getVar('body'),
					'slug' => url_title($this->request->getVar('title')),
					'type' =>'noticia',
					'status' => $this->request->getVar('estado'),
					'idioma' => $this->request->getVar('lang')
				]
			);
			$session = \Config\Services::session();
			$session->setFlashdata('success','New post has been created!');
			return redirect()->to('/noticias');
		}
	}

	//quiero que me traiga las noticias 
	public function adminNoticias(){
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/admin/noticias/';
		$data['ruta_en'] = '/en/admin/noticias/';
		$model = new NoticiasModel();
		$model = new NoticiasModel();
		//cambiar
		$noticias = $model->getPosts();
		$page = 0;
		if (isset($_GET['p'])) {
			$page = $_GET['p'] - 1;
		}
		if (!array_key_exists($page,$noticias)) {
			$page = 0;
		}
		$noticias = $noticias[$page];
		$data['noticias'] = $noticias;
		// return view('welcome_message');
		echo view('admin/templates/header',$data);
		echo view('admin/noticias');
		echo view('admin/templates/footer');
	}

	//--------------------------------------------------------------------

}
