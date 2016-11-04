<?php
	
	namespace App\Controllers;
	
	use Slim\Views\Twig as View;

	class BarsCtrl extends Controller{

		public function index($resquest, $response){
			return $this->view->render($response, 'bars.twig');
		}

		public function register($request, $response){
			return $this->view->render($response, 'register.twig');
		}

		
	}