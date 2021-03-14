<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	protected $locale;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
		$this->locale = $this->request->getLocale();
	}
	protected function getPage($array){
		$page = 0;
		if (isset($_GET['p'])) {
			$page = $_GET['p'] - 1;
		}
		if (!array_key_exists($page,$array)) {
			$page = 0;
		}
		return $page;
	}
	protected function createPagination($array){
		// decido la pagina
		$page = $this->getPage($array);
		// armo un array con las paginas que tiene: su numero, su url, y si son la activa
		$url_actual = current_url(true);
		$pags = [];
		foreach ($array as $i => $pag) {
			$numero = $i+1;
			$p['url'] = strval($url_actual->addQuery('p', $numero));
			if($i == $page){
				$p['active'] = 1;
			} else {
				$p['active'] = 0;
			}
			$pags[$numero] = $p;
		}
		$pag_data['pags'] = $pags;
		if ($page == 0) {
			$pag_data['primera'] = 1;
		} else {
			$pag_data['primera'] = 0;
		}
		if ($page+1 == count($array)) {
			$pag_data['ultima'] = 1;
		} else {
			$pag_data['ultima'] = 0;
		}

		// ahora armo el html aca
		$paginacion = "";
		if (count($pags) > 1) {
			$paginacion .= "<div class='pagination'>";
			if (!$pag_data['primera']) {
				$paginacion .= "<div class='anterior'><a href='".$pags[$page]['url']."'>< Anterior</a></div>";
			}
			$paginacion .= "<div class='paginas'>";
			foreach ($pags as $num => $pag) {
				$act = "";
				if ($pag['active']) {
					$act = "class='active'";
				}
				$paginacion .= "<a href='".$pag['url']."' ".$act.">".$num."</a>";
			}
			$paginacion .= "</div>";
			if (!$pag_data['ultima']) {
				$paginacion .= "<div class='siguiente'><a href='".$pags[$page+2]['url']."'>Siguiente ></a></div>";
			}
			$paginacion .= "</div>";
		}
		return $paginacion;
	}
}
