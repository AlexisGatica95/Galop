<?php namespace App\Controllers;

class Contacto extends BaseController
{
	public function index()
	{
    
		$locale = $this->request->getLocale();
		$data['locale'] = $locale;
		$data['ruta_es'] = '/es/contacto';
		$data['ruta_en'] = '/en/contacto';
		$data['scripts'][] = 'contacto';

		if (!$this->validate([
			'email' => 'required'
			// 'mensaje' => 'required'
		])) {			
			echo view('templates/header',$data);
			echo view('pages/contacto');
			echo view('templates/footer');
		} else {			 
			$token = $_POST['token'];
			$action = $_POST['action'];
			 
			// call curl to POST request
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => getenv('captcha.secret'), 'response' => $token)));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			$arrResponse = json_decode($response, true);
			 
			// verify the response
			if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
			    $email = \Config\Services::email();

				$email->setFrom('contacto@grupogalop.org', 'Grupo Galop Web');
				$email->setTo('ariel@nodorojo.com');
				$email->setBCC('ariel@nodorojo.com');
				$email->setReplyTo($this->request->getVar('email'), $this->request->getVar('nombre'));

				$email->setSubject($this->request->getVar('subject')." - Galop web contact form");
				$email->setMessage("<h1>Contacto desde la web</h1><p><b>Nombre:</b> ".$this->request->getVar('nombre')."</p><p><b>Mail:</b> ".$this->request->getVar('email')."</p><p><b>Asunto:</b> ".$this->request->getVar('subject')."</p><p><b>Mensaje:</b> ".$this->request->getVar('mensaje')."</p>");

				$email->send();

				$session = \Config\Services::session();
				$session->setFlashdata('success','Mensaje enviado!');
				echo view('templates/header',$data);
				echo view('pages/contacto');
				echo view('templates/footer');	
			} else {
			    // spam submission
			    // show error message
			    $session = \Config\Services::session();
				$session->setFlashdata('error','Error. Por favor intentelo nuevamente.');
				echo view('templates/header',$data);
				echo view('pages/contacto');
				echo view('templates/footer');
			}
		}
	}

}