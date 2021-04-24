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
		$data['ruta_es'] = '/es/login';
		$data['ruta_en'] = '/en/login';

		if (array_key_exists('isLoggedIn',$_SESSION) && $_SESSION['isLoggedIn']) {
			return redirect()->to('/'.$locale.'/perfil');
		}

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
				if ($user['permisos'] > 1) {
					return redirect()->to('/admin');
				}
				return redirect()->to('/'.$locale.'/perfil');
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
			'permisos' => $user['permisos'],
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
		$data['ruta_es'] = '/es/registro';
		$data['ruta_en'] = '/en/registro';
		$data['countries'] = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
		$data['styles'][] = "slimselect.min";
		$data['scripts'][] = "slimselect.min";
		$data['scripts'][] = "registro";

		if (array_key_exists('isLoggedIn',$_SESSION) && $_SESSION['isLoggedIn']) {
			return redirect()->to('/'.$locale.'/perfil');
		}

		if ($this->request->getMethod() == 'post') {
			// $rules = [
			// 	'nombre' => 'required|min_length[3]|max_length[25]',
			// 	'apellido' => 'required|min_length[3]|max_length[25]',
			// 	'mail' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.mail]',
			// 	'contrasena' => 'required|min_length[8]|max_length[255]',
			// 	'contrasena2' => 'required|matches[contrasena]'
			// ];
			$rules = [
				'nombre' => 'required',
				'apellido' => 'required',
				'mail' => 'required|is_unique[users.mail]',
				'contrasena' => 'required',
				'contrasena2' => 'required|matches[contrasena]'
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
				$data['llego'] = $_POST;
				$session = \Config\Services::session();
				$session->setFlashdata('success',lang('Errores.mail_existente'));
				if (! $this->validate(['mail' => 'is_unique[users.mail]'])) {
					return redirect()->to('/'.$locale.'/login');
				}
			} else {
				// guardamos en la db
				$model = new UsersModel;
				$orgas = "";
				if($this->request->getVar('organizaciones')) {
					$orgas = implode(",",$this->request->getVar('organizaciones'));
				}else{ 
					$orgas = "";
				}
				$intereses = "";
				if($this->request->getVar('interes[]')) {
					$intereses = implode(",",$this->request->getVar('interes[]'));
				}else{ 
					$intereses = "";
				}
				$consent = 0;
				if(array_key_exists("consent_contacto",$_POST)){
					$consent = 1;
				}
				$newData = [
					'nombre' => $this->request->getVar('nombre'),
					'apellido' => $this->request->getVar('apellido'),
					'mail' => $this->request->getVar('mail'),
					'password' => $this->request->getVar('contrasena'),
					'genero' => $this->request->getVar('genero'),
					'ano_nacimiento' => $this->request->getVar('ano_nacimiento'),
					'residencia_pais' => $this->request->getVar('pais_residencia'),
					'residencia_ciudad' => $this->request->getVar('ciudad_residencia'),
					'trabajo_hospital' => $this->request->getVar('hospital'),
					'trabajo_cargo' => $this->request->getVar('cargo'),
					'trabajo_pais' => $this->request->getVar('dir_trabajo_pais'),
					'trabajo_ciudad' => $this->request->getVar('dir_trabajo_ciudad'),
					'trabajo_calle' => $this->request->getVar('dir_trabajo_calle'),
					'trabajo_numero' => $this->request->getVar('dir_trabajo_numero'),
					'trabajo_CP' => $this->request->getVar('dir_trabajo_CP'),
					'especialidad' => $this->request->getVar('especialidad'),
					'organizaciones' => $orgas,
					'consent_newsletter' => $consent,
					'intereses' => $intereses
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
		$data['ruta_es'] = '/es/perfil';
		$data['ruta_en'] = '/en/perfil';
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

	public function adminUsuarios(){
		$locale = $this->request->getLocale();

		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/admin/usuarios';
		$data['ruta_en'] = '/en/admin/usuarios';
		$data['scripts'][] = 'tabla_usuarios';
		$model = new UsersModel();

		if(array_key_exists('permisos', $_GET)||array_key_exists('s', $_GET)){
			$condiciones = [];
			if(array_key_exists('permisos',$_GET)){
				$condiciones['permisos'] = $_GET['permisos'];
			}
			if (array_key_exists('s', $_GET)) {
				$condiciones['string'] = $_GET['s'];
			}else{
				$condiciones['string'] = "";
			} 
			$usuarios = $model->getAllUsersPaginadosFiltros($condiciones);
		}else {
			$usuarios = $model->getUsersPaginados();
			$condiciones = [];
		}
		$data['condiciones'] = $condiciones;

		$data['paginacion'] = $this->createPagination($usuarios);

		// agarro y paso la pagina que corresponde como array de tabla_usuarios
		$page = $this->getPage($usuarios);
		if (count($usuarios) > 0) {
			$usuarios = $usuarios[$page];
		}

		$data['usuarios'] = $usuarios;

		if (!$this->validate([
			'accion' => 'required'
		])) {
			echo view('admin/templates/header',$data);
			echo view('admin/usuarios');
			echo view('admin/templates/footer');
		} else {
			$data_update = ['permisos' => $this->request->getVar('valor')];
			$model->update($this->request->getVar('id_user'),$data_update);
			
			// repito
			if(array_key_exists('permisos', $_GET)||array_key_exists('s', $_GET)){
				$condiciones = [];
				if(array_key_exists('permisos',$_GET)){
					$condiciones['permisos'] = $_GET['permisos'];
				}
				if (array_key_exists('s', $_GET)) {
					$condiciones['string'] = $_GET['s'];
				}else{
					$condiciones['string'] = "";
				} 
				$usuarios = $model->getAllUsersPaginadosFiltros($condiciones);
			}else {
				$usuarios = $model->getUsersPaginados();
				$condiciones = [];
			}
			$data['condiciones'] = $condiciones;

			$data['paginacion'] = $this->createPagination($usuarios);

			// agarro y paso la pagina que corresponde como array de tabla_usuarios
			$page = $this->getPage($usuarios);
			if (count($usuarios) > 0) {
				$usuarios = $usuarios[$page];
			}

			$data['usuarios'] = $usuarios;
			// repito

			echo view('admin/templates/header',$data);
			echo view('admin/usuarios');
			echo view('admin/templates/footer');
		}		
	}

	//--------------------------------------------------------------------

}
