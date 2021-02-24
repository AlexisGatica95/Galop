<?php namespace App\Models;

use CodeIgniter\Model;

class NoticiasModel extends Model {
	protected $table = 'posts';
	protected $allowedFields = ['title','body','slug','timestamp','type','status','translation_of','lenguage'];

	public function getPostsPaginados() {

		$res = $this->asArray()
					->where([
						'type' => 'noticia',
						'status'=> 1,
						])
					->findAll();
		return array_chunk($res,3,true);

	}

	public function getPost($slug = null){
		if ($slug) {
			return $this->asArray()
			->where(['slug' => $slug])
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
					->findAll();	
		return array_chunk($res,4,true);
	}

	public function getPostsParents() {
		$res = $this->asArray()
		->where([
			'type' => 'noticia',
			'translation_of'=> NULL
			])
		->findAll();
		return $res;
	}

}