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

	public function getPost($slug = null){
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

	public function getPostsParents() {
		$res = $this->asArray()
					->where([
						'type' => 'noticia',
						'translation_of'=> NULL
					])
					->orderBy('timestamp','DESC')
					->findAll();
		return $res;
	}

}