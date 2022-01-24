<?php namespace App\Models;

use CodeIgniter\Model;

class EventosModel extends Model {
	protected $table = 'posts';
	protected $allowedFields = ['title','body','slug','timestamp','type','status','translation_of','lang','fecha'];

	public function getPostsPaginados($lang) {
		$res = $this->asArray()
					->where([
						'type' => 'evento',
						'status'=> 1,
						'lang' => $lang
						])
					->orderBy('timestamp','DESC')
					->findAll();
		return array_chunk($res,10,true);
	}

	public function getAllPostsPaginadosFiltros($condiciones){
		$where = [
				'type' => 'evento'
				];
		if (array_key_exists('status', $condiciones)) {
			$where['status'] = $condiciones["status"];
		}
		if (array_key_exists('lang', $condiciones)) {
			$where['lang'] = $condiciones["lang"];
		}
		$res = $this->asArray()
					->where($where)
					->like('title',$condiciones['string'])
					->orderBy('timestamp','DESC')
					->findAll();
		return array_chunk($res,10,true);
	}

	public function getAllPostsPaginados() {
		$res = $this->asArray()
					->where([
						'type' => 'evento'
						])
					->orderBy('timestamp','DESC')
					->findAll();
		return array_chunk($res,10,true);
	}

	public function getPost($id = null){
		if ($id) {
			return $this->asArray()
						->where(['id' => $id])
						->orderBy('timestamp','DESC')
						->first();
		}else{
			return false;
		}
	}

	public function getPostSlug($slug = null){
		if ($slug) {
			return $this->asArray()
						->where(['slug' => $slug])
						->orderBy('timestamp','DESC')
						->first();
		}else{
			return false;
		}
	}

	public function getPosts() {
		$res = $this->asArray()
					->where([
						'type' => 'evento',
					])
					->orderBy('timestamp','DESC')
					->findAll();	
		return array_chunk($res,10,true);
	}

	public function getPostsParents($id = NULL) {
		$res = $this->asArray()
					->where([
						'type' => 'evento',
						'translation_of'=> NULL
					])
					->orderBy('timestamp','DESC')
					->findAll();
		if ($id !== NULL) {
			foreach ($res as $nk => $evento) {
				if ($evento['id'] == $id) {
					unset($res[$nk]);
				}
			}
		}
		return $res;
	}

	public function getTaxTerms($lang = "es",$all = false) {
		$res = [];

		$db = \Config\Database::connect();
		$builder = $db->table('taxonomias');
		$query = $builder->getWhere(['tipo' => 'evento']);
		foreach ($query->getResultArray() as $row){
			if (!$all) {
				$nombre = json_decode($row['nombre']);
				$nombre = $nombre->$lang;
				$row['nombre'] = ucfirst($nombre);
				$slug = json_decode($row['slug']);
				$slug = $slug->$lang;
				$row['slug'] = ucfirst($slug);
			} else {
				$nombre = json_decode($row['nombre']);
				$row['nombre'] = $nombre;
				$slug = json_decode($row['slug']);
				$row['slug'] = $slug;
			}

			// buscar los terminos de esta taxonomia
			$terms = [];
			$builder2 = $db->table('terms');
			$query2 = $builder2->getWhere(['id_tax' => $row['id']]);
			foreach ($query2->getResultArray() as $row2) {
				if (!$all) {
					$nombre = json_decode($row2['nombre']);
					$nombre = $nombre->$lang;
					$row2['nombre'] = ucfirst($nombre);
					$slug = json_decode($row2['slug']);
					$slug = $slug->$lang;
					$row2['slug'] = ucfirst($slug);
				} else {
					$nombre = json_decode($row2['nombre']);
					$row2['nombre'] = $nombre;
					$slug = json_decode($row2['slug']);
					$row2['slug'] = $slug;
				}				

				$terms[] = $row2;
			}
			$row['terms'] = $terms;
		    $res[] = $row;
		}

		return $res;
	}

	public function getPostsLimit($lang = "es",$limit) {
		$res = $this->asArray()
					->where([
						'type' => 'evento',
						'status'=> 1,
						'lang' => $lang
					])

					->orderBy('timestamp','DESC')
					->findAll($limit);	
		return $res;
	}

}