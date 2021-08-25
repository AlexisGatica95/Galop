<?php namespace App\Controllers;
 
class Configuraciones extends BaseController
{	
	public function index()
	{   
        $data['locale'] = $this->locale;
		$data['ruta_es'] = '/es/admin/configuraciones';
		$data['ruta_en'] = '/en/admin/configuraciones';

        echo view('admin/templates/header',$data);
		echo view('admin/configuraciones');
		echo view('admin/templates/footer');
    }
}