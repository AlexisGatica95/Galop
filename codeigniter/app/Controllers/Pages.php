<?php namespace App\Controllers;

use App\Models\BlogModel;

class Pages extends BaseController
{
	public function index()
	{
		$model = new BlogModel();
		$locale = $this->request->getLocale();

		$data['news'] = $model->getPosts();
		$data['locale'] = $locale;

		// return view('welcome_message');
		echo view('templates/header',$data);
		echo view('pages/home');
		echo view('templates/footer');
	}

	public function showme($page = 'institucional')
	{
		if (! is_file(APPPATH.'/Views/pages/'.$page.'.php')) {
			// no existe la pag
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}
		$locale = $this->request->getLocale();
		$data['locale'] = $locale;
		echo view('templates/header',$data);
		echo view('pages/'.$page);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
