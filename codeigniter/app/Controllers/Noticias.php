<?php namespace App\Controllers;

use App\Models\NoticiasModel;

class Noticias extends BaseController
{
	public function index()
	{	
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/noticias/';
		$data['ruta_en'] = '/en/noticias/';
		$model = new NoticiasModel();
		$noticias = $model->getPosts();
		$longitud_extracto = 250;

		foreach ($noticias as $key => $noticia) {
			$extracto = substr($noticia['body'],0,$longitud_extracto);
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
		$data['noticia'] = $model->getPosts($slug);
		
		echo view('templates/header',$data);
		echo view('noticia');
		echo view('templates/footer');
	}

	public function create()
	{
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/admin/noticia/';
		$data['ruta_en'] = '/en/admin/noticia/';

		helper('form');
		$model = new NoticiasModel();

		if (!$this->validate([
			'title' => 'required|min_length[3]|max_length[255]',
			'body' => 'required'
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
					'type'=>'noticia'
				]
			);
			$session = \Config\Services::session();
			$session->setFlashdata('success','New post has been created!');
			return redirect()->to('/noticias');
		}
	}

	public function noticias(){
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/admin/noticias/';
		$data['ruta_en'] = '/en/admin/noticias/';
		$model = new NoticiasModel();
		$noticias = $model->getPosts();
		$data['noticias'] = $noticias;
		// return view('welcome_message');
		echo view('admin/templates/header',$data);
		echo view('admin/noticias');
		echo view('admin/templates/footer');
	}

	//--------------------------------------------------------------------

}
