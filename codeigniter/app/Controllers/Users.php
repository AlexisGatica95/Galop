<?php namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
	public function index()
	{
		$model = new UsersModel();
		$locale = $this->request->getLocale();
		helper(['form']);
		$data['locale'] = $locale;

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'mail' => 'required',
				'password' => 'required|validateUser[mail,password]'
			];

			$errors = [
				'password' => [
					'validateUser' => lang('App.error.validacion_login')
				]
			];

			if (! $this->validate($rules,$errors)) {
				$data['validation'] = $this->validator;
			} else {
				// guardamos en la db
				$model = new UsersModel;
				$user = $model->where('mail',$this->request->getVar('mail'))
							  ->first();
				$this->setUser($user);

				return redirect()->to('/'.$locale.'/mi-cuenta');
			}
		}

		echo view('templates/header',$data);
		echo view('users/login');
		echo view('templates/footer');
	}

	private function setUser($user){
		$data = [
			'id' => $user['ID'],
			'nombre' => $user['nombre'],
			'apellido' => $user['apellido'],
			'mail' => $user['mail'],
			'isLoggedIn' => true
		];
		session()->set($data);
		return true;
	}

	public function registro()
	{
		$data = [];
		helper(['form']);
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'nombre' => 'required|min_length[3]|max_length[25]',
				'apellido' => 'required|min_length[3]|max_length[25]',
				'mail' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.mail]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'required|matches[password]'
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {
				// guardamos en la db
				$model = new UsersModel;
				$newData = [
					'nombre' => $this->request->getVar('nombre'),
					'apellido' => $this->request->getVar('apellido'),
					'mail' => $this->request->getVar('mail'),
					'password' => $this->request->getVar('password')
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success',lang('App.cuenta_creada'));
				return redirect()->to('/'.$locale.'/login');
			}
		}

		echo view('templates/header',$data);
		echo view('users/registro');
		echo view('templates/footer');
	}

	public function perfil(){
		$model = new UsersModel();
		$locale = $this->request->getLocale();
		helper(['form']);
		$data['locale'] = $locale;
		session();

		echo view('templates/header',$data);
		echo view('users/perfil');
		echo view('templates/footer');
	}

	public function logout(){
		$locale = $this->request->getLocale();
		session()->destroy();
		return redirect()->to('/'.$locale.'/');
	}

	//--------------------------------------------------------------------

}
