<?php
	
	namespace App\Controllers;
	
	use App\Models\User as User;
	use Slim\Views\Twig as View;

	class HomeCtrl extends Controller{

		public function index($resquest, $response){
			return $this->view->render($response, 'home.twig');
		}
	}