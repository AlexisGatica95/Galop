<?php namespace App\Models;

use CodeIgniter\Model;

class NoticiasModel extends Model {
	protected $table = 'posts';
	protected $allowedFields = ['title','body','slug','timestamp','type','status','translation_of','lang'];

	public function getPostsPaginados($lang) {
		$res = $this->asArray()
					->where([
						'type' => 'noticia',
						'status'=> 1,
						'lang' => $lang
						])
					->orderBy('timestamp','DESC')
					->findAll();
		return array_chunk($res,4,true);
	}

	public function getAllPostsPaginadosFiltros($condiciones){
		$where = [
				'type' => 'noticia'
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
		return array_chunk($res,4,true);
	}

	public function getAllPostsPaginados() {
		$res = $this->asArray()
					->where([
						'type' => 'noticia'
						])
					->orderBy('timestamp','DESC')
					->findAll();
		return array_chunk($res,4,true);
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
						'type' => 'noticia',
					])
					->orderBy('timestamp','DESC')
					->findAll();	
		return array_chunk($res,4,true);
	}

	public function getPostsParents($id = NULL) {
		$res = $this->asArray()
					->where([
						'type' => 'noticia',
						'translation_of'=> NULL
					])
					->orderBy('timestamp','DESC')
					->findAll();
		if ($id !== NULL) {
			foreach ($res as $nk => $noticia) {
				if ($noticia['id'] == $id) {
					unset($res[$nk]);
				}
			}
		}
		return $res;
	}

}