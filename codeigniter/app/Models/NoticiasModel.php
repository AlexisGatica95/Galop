<?php namespace App\Models;

use CodeIgniter\Model;

class NoticiasModel extends Model {
	protected $table = 'posts';
	protected $allowedFields = ['title','body','slug','timestamp','type'];

	public function getPosts($slug = null) {
		if (!$slug) {
			$res = $this->asArray()
                        ->where(['type' => 'noticia'])
						->findAll();
			return array_chunk($res,3,true);
		}

		return $this->asArray()
					->where(['slug' => $slug])
					->first();
	}
}