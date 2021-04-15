<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {
	protected $table = 'users';
	protected $allowedFields = ['nombre','apellido','password','mail','genero','ano_nacimiento','residencia_pais','residencia_ciudad','trabajo_pais','trabajo_ciudad','trabajo_calle','trabajo_numero','trabajo_CP','trabajo_hospital','trabajo_cargo','intereses','organizaciones','consent_contacto','especialidad','fecha_registro'];
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
		return $res;
	}


	public function getUsersPaginados() {
		$res = $this->asArray()
					->orderBy('fecha_registro','DESC')
					->findAll();
		return array_chunk($res,2,true);
	}

	public function getAllUsersPaginadosFiltros($condiciones){
	
		if (array_key_exists('permisos', $condiciones)) {
			$where['permisos'] = $condiciones["permisos"];
		} else {
			$where = [];
		}

		$res = $this->asArray()
					
					->orLike(['nombre'=>$condiciones['string'],
						'apellido'=>$condiciones['string'],
						'mail'=>$condiciones['string']
					])
					->where($where)
					->orderBy('fecha_registro','DESC')
					->findAll();

		return array_chunk($res,2,true);
	}


} 