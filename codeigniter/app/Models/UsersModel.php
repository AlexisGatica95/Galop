<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {
	protected $table = 'users';
	protected $allowedFields = ['nombre','apellido','password','mail','genero','ano_nacimiento','residencia_pais','residencia_ciudad','trabajo_pais','trabajo_ciudad','trabajo_calle','trabajo_numero','trabajo_CP','trabajo_hospital','trabajo_cargo','intereses','organizaciones','consent_contacto','especialidad','fecha_registro','permisos'];
	protected $beforeInsert = ['beforeInsert'];
	protected $beforeUpdate = ['beforeUpdate'];
	
	protected function beforeInsert(array $data) {
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function beforeUpdate(array $data) {
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function passwordHash(array $data) {
		if (isset($data['data']['password'])) {
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		}
		return $data;
	}

	public function getAllUsers(){
				$res = $this->asArray()
					->where(['permisos <=' => 2])
					->orderBy('fecha_registro','DESC')
					->findAll();
		return $this->listArrays($res);
	}

	public function listArrays($userArray) {
		if (count($userArray) > 0) {
			foreach ($userArray as $userKey => $userItem) {
				if ($userItem['organizaciones'] != "") {
					$userArray[$userKey]['organizaciones'] = explode(',', $userItem['organizaciones']);
				} else {
					$userArray[$userKey]['organizaciones'] = [];
				}
				if ($userItem['intereses'] != "") {
					$userArray[$userKey]['intereses'] = explode(',', $userItem['intereses']);
				} else {
					$userArray[$userKey]['intereses'] = [];
				}				
			}
			return $userArray;
		} else {
			return $userArray;
		}
	}

	public function getUsersPaginados() {
		$res = $this->asArray()
					->orderBy('fecha_registro','DESC')
					->findAll();
		return array_chunk($this->listArrays($res),2,true);
	}

	public function getAllUsersPaginadosFiltros($condiciones){
	
		if (array_key_exists('permisos', $condiciones)) {
			$where['permisos'] = $condiciones["permisos"];
		} else {
			$where = [];
		}

		$res = $this->asArray()		
					->groupStart()	
					->orLike(['nombre'=>$condiciones['string'],
						'apellido'=>$condiciones['string'],
						'mail'=>$condiciones['string']
					])
					->groupEnd()
					->where($where)			
					->orderBy('fecha_registro','DESC')
					->findAll();
		return array_chunk($this->listArrays($res),2,true);
	}

	
	public function getUser($id){
		$res = $this->asArray()
			->where(['id' => $id])
			->findAll();
		$res = $this->listArrays($res);
		return $res[0];
}


} 