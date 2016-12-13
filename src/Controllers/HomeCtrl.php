<?php
	//PROJECT: Tarefas 
	//AUTHOR : João Batista Gomes Silva
	//E-MAIL : jhonxbatista@gmail.com

	namespace App\Controllers;
	use Slim\Views\Twig as View;
	
	class HomeCtrl extends Controller{

		public function index($request, $response){
			return $this->container->view->render($response, 'home.twig');
		}

	}