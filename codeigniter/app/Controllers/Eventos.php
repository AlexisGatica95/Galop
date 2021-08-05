<?php namespace App\Controllers;

use App\Models\EventosModel;

class Eventos extends BaseController
{	
	//trae todos los post paginados con status 1
	public function index()
	{	
		$data['locale'] = $this->locale;
		$data['ruta_es'] = '/es/eventos/';
		$data['ruta_en'] = '/en/eventos/';
		$model = new EventosModel();
		$eventos = $model->getPostsPaginados($this->locale);		

		$data['paginacion'] = $this->createPagination($eventos);

		// $data['paginacion'] = $paginacion;
		
		// agarro y paso la pagina que corresponde como array de eventos
		$page = $this->getPage($eventos);
		if (count($eventos) > 0) {
			$eventos = $eventos[$page];
		}
		
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
		echo view('eventos');
		echo view('templates/footer');
	}

	//trae el evento en si
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

		$model = new EventosModel();
		$data['evento'] = $model->getPostSlug($slug);
		if ($data['evento']['status'] !== "1") {
			return redirect()->to("/".$locale.'/eventos/');
		}
		
		echo view('templates/header',$data);
		echo view('evento');
		echo view('templates/footer');
	}

	// creacion
	public function create()
	{
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/admin/evento/';
		$data['ruta_en'] = '/en/admin/evento/';		
		$data['scripts'][] = 'litepicker';
		$data['scripts'][] = 'edicion_evento';
		$data['titulo_vista'] = 'titulo_crear';
		$data['terms'] = [];

		helper('form');
		$model = new EventosModel();
		$data['eventos'] = $model->getPostsParents();

		if (!$this->validate([
			'title' => 'required|max_length[255]',
			'body' => 'required',
			'idioma_select' => 'required'
		])) {
			// obtenemos las taxonomias y sus terminos
			$taxonomias = $model->getTaxTerms($this->locale);
			$data['taxonomias'] = $taxonomias;

			echo view('admin/templates/header',$data);
			echo view('admin/crear_evento');
			echo view('admin/templates/footer');
		} else {
			$post = [
				'title' => $this->request->getVar('title'),
				'body' => $this->request->getVar('body'),
				'slug' => url_title($this->request->getVar('title')),
				'type' =>'evento',
				'status' => $this->request->getVar('estado'),
				'lang' => $this->request->getVar('idioma_select'),
				'fecha' => $this->request->getVar('fecha')
			];
			if ($this->request->getVar('traduccion_de')) {
				$post['traduccion_de'] = $this->request->getVar('traduccion_de');
			}
			$model->save($post);

			$postID = $model->db->insertID();

			$db = \Config\Database::connect();
			$builder = $db->table('posts_terms');
			
			if (array_key_exists('terms', $_POST)) {
				foreach ($this->request->getVar('terms') as $term) {
					$d = [
						'id_post' => $postID,
						'id_term' => $term
					];
					$query = $builder->insert($d);
				}
			}
			$session = \Config\Services::session();
			$session->setFlashdata('success','New post has been created!');
			return redirect()->to("/".$this->request->getVar('idioma_select').'/eventos/'.url_title($this->request->getVar('title')));
		}
	}

	// edicion
	public function edit($id)
	{
		$data['locale'] = $this->locale;
		$data['ruta_es'] = '/es/admin/evento/';
		$data['ruta_en'] = '/en/admin/evento/';
		$data['scripts'][] = 'litepicker';
		$data['scripts'][] = 'edicion_evento';
		$data['titulo_vista'] = 'titulo_editar';

		helper('form');
		$model = new EventosModel();
		$data['eventos'] = $model->getPostsParents($id);

		// obtenemos las taxonomias y sus terminos
		$taxonomias = $model->getTaxTerms($this->locale);
		$data['taxonomias'] = $taxonomias;

		// obtenemos las relaciones que ya tiene este post con terminos
		$terms = [];
		$db = \Config\Database::connect();
		$builder = $db->table('posts_terms');
		$query = $builder->getWhere(['id_post' => $id]);

		foreach ($query->getResultArray() as $relacion) {
			$terms[] = $relacion['id_term'];
		}

		$data['terms'] = $terms;

		if (!$this->validate([
			'title' => 'required|max_length[255]',
			'body' => 'required',
			'idioma_select' => 'required'
		])) {
			$post = $model->getPost($id);
			$data['post'] = $post;

			echo view('admin/templates/header',$data);
			echo view('admin/crear_evento');
			echo view('admin/templates/footer');
		} else {
			$o = [
				'id' => $id,
				'title' => $this->request->getVar('title'),
				'body' => str_replace("<p><br></p>","",$this->request->getVar('body')),
				'slug' => url_title($this->request->getVar('title')),
				'type' =>'evento',
				'status' => $this->request->getVar('estado'),
				'lang' => $this->request->getVar('idioma_select'),
				'fecha' => $this->request->getVar('fecha')
			];
			if ($this->request->getVar('es_traduccion') == "on") {
				$o['translation_of'] = $this->request->getVar('traduccion_de');
			} else {
				$o['translation_of'] = null;
			}
			$model->save($o);

			// guardamos los terms
			$db = \Config\Database::connect();
			$builder = $db->table('posts_terms');
			
			if (array_key_exists('terms', $_POST)) {
				foreach ($this->request->getVar('terms') as $term) {
					$d = [
						'id_post' => $id,
						'id_term' => $term
					];
					$query = $builder->insert($d);
					$data['terms'][] = $term;
				}
			}

			$terms_borrar = [];
			foreach ($data['terms'] as $term_anterior) {
				if (!in_array($term_anterior, $this->request->getVar('terms'))) {
					$terms_borrar[] = $term_anterior;
				}
			}

			foreach ($terms_borrar as $term_borrar) {
				$query_b = $builder->delete(['id_post' => $id, 'id_term' => $term_borrar]);
			}

			$data['terms'] = array_diff($data['terms'], $terms_borrar);

			$session = \Config\Services::session();
			$session->setFlashdata('success','Cambios guardados!');
			// return redirect()->to('/eventos/');
			$post = $model->getPost($id);
			$data['post'] = $post;
			
			echo view('admin/templates/header',$data);
			echo view('admin/crear_evento');
			echo view('admin/templates/footer');
			// return redirect()->to("/".$this->request->getVar('idioma_select').'/eventos/'.url_title($this->request->getVar('title')));
		}
	}

	// listado de eventos 
	public function adminEventos(){
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/admin/eventos/';
		$data['ruta_en'] = '/en/admin/eventos/';
		$data['scripts'][] = 'tabla_eventos';
		$model = new EventosModel();
		//me fijo si tengo una query
		if (array_key_exists('st', $_GET) || array_key_exists('s', $_GET) || array_key_exists('cat', $_GET) || array_key_exists('lg', $_GET)) {
			$condiciones = [];
			if (array_key_exists('st', $_GET)) {
				$condiciones['status'] = $_GET['st'];
			}
			if (array_key_exists('lg', $_GET)) {
				$condiciones['lang'] = $_GET['lg'];
			}
			if (array_key_exists('s', $_GET)) {
				$condiciones['string'] = $_GET['s'];
			} else {
				$condiciones['string'] = "";
			}
			$eventos = $model->getAllPostsPaginadosFiltros($condiciones);
		} else {
			$eventos = $model->getAllPostsPaginados();
			$condiciones = [];
		}		

		$data['paginacion'] = $this->createPagination($eventos);
		
		// agarro y paso la pagina que corresponde como array de eventos
		$page = $this->getPage($eventos);
		if (count($eventos) > 0) {
			$eventos = $eventos[$page];
		}
		$data['posts'] = $eventos;
		$data['type'] = 'evento';
		$taxonomias = $model->getTaxTerms($this->locale);
		$data['taxonomias'] = $taxonomias;
		// return view('welcome_message');
		echo view('admin/templates/header',$data);
		echo view('admin/posts');
		echo view('admin/templates/footer');
	}

	// manejar taxonomias
	public function taxonomias(){
		$data['locale'] = $this->locale;
		$data['ruta_es'] = '/es/admin/categorias/evento/';
		$data['ruta_en'] = '/en/admin/categorias/evento/';
		//$data['scripts'][] = 'taxonomias_eventos';
		$data['titulo_vista'] = 'titulo_categorias';

		helper('form');
		$model = new EventosModel;
		// obtenemos las taxonomias y sus terminos
		$taxonomias = $model->getTaxTerms($this->locale,true);
		$data['taxonomias'] = $taxonomias;
		$data['locales'] = $this->locales;

		if (!$this->validate([
			'action' => 'required'
		])) {
			echo view('admin/templates/header',$data);
			echo view('admin/taxonomias');
			echo view('admin/templates/footer');
		} else {
			$db = \Config\Database::connect();
			$builder = $db->table('terms');

			switch ($this->request->getVar('action')) {
				case 'edit':
					$id_term = $this->request->getVar('id');
					$array_nuevo = $this->request->getVar($id_term);

					$array_slug = [];
					foreach ($array_nuevo as $loc => $nombre) {
						$array_slug[$loc] = url_title($nombre);
					}

					$array_nuevo = json_encode($array_nuevo);
					$array_slug = json_encode($array_slug);

					$update_data = [
					    'nombre' => $array_nuevo,
					    'slug' => $array_slug
					];
					$builder->where('id', $id_term);
					$builder->update($update_data);
					break;

				case 'delete':
					$id_term = $this->request->getVar('id');

					$query = $builder->delete(['id' => $id_term]);

					$db2 = \Config\Database::connect();
					$builder2 = $db2->table('posts_terms');
					$query2 = $builder2->delete(['id_term' => $id_term]);

					break;

				case 'new':
					$array_nuevo = $this->request->getVar('new');
					$array_slug = [];
					foreach ($array_nuevo as $loc => $nombre) {
						$array_slug[$loc] = url_title($nombre);
					}
					$data_term = [
						'nombre' => json_encode($array_nuevo),
						'slug' => json_encode($array_slug),
						'id_tax' => $this->request->getVar('taxonomia')
					];
					
					$query = $builder->insert($data_term);
				
				default:
					# code...
					break;
			}

			// obtenemos las taxonomias y sus terminos
			$taxonomias = $model->getTaxTerms($this->locale,true);
			$data['taxonomias'] = $taxonomias;

			echo view('admin/templates/header',$data);
			echo view('admin/taxonomias');
			echo view('admin/templates/footer');
		}
	}

	//--------------------------------------------------------------------

}
