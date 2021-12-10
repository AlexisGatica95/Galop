<?php namespace App\Models;

use CodeIgniter\Model;

class ProtocolosModel extends Model {
	protected $table = 'posts';
	protected $allowedFields = ['title','body','slug','timestamp','type','status','translation_of','lang','fecha'];

	public function getPostsPaginados($lang) {
		$res = $this->asArray()
					->where([
						'type' => 'protocolo',
						'status'=> 1,
						'lang' => $lang
						])
					->orderBy('timestamp','DESC')
					->findAll();
		return array_chunk($res,10,true);
	}

	public function getAllPostsPaginadosFiltros($condiciones){
		$where = [
				'type' => 'protocolo'
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
						'type' => 'protocolo'
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

	private function getPostTerms($id = null) {
		if ($id) {
			$builder = $db->table('posts_terms');
			$query = $builder->getWhere(['id_post' => $id]);
			foreach ($query->getResultArray() as $row) {
				
			}
			return $terms;
		} else {
			return false;
		}
	}

	public function getPostSlug($slug = null){
		if ($slug) {
			$protocolo = $this->asArray()
						->where(['slug' => $slug])
						->orderBy('timestamp','DESC')
						->first();
			return $protocolo;
		} else {
			return false;
		}
	}

	public function getPosts() {
		$res = $this->asArray()
					->where([
						'type' => 'protocolo',
					])
					->orderBy('timestamp','DESC')
					->findAll();	
		return array_chunk($res,10,true);
	}

	public function getPostsParents($id = NULL) {
		$res = $this->asArray()
					->where([
						'type' => 'protocolo',
						'translation_of'=> NULL
					])
					->orderBy('timestamp','DESC')
					->findAll();
		if ($id !== NULL) {
			foreach ($res as $nk => $protocolo) {
				if ($protocolo['id'] == $id) {
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
		$query = $builder->getWhere(['tipo' => 'protocolo']);
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

}