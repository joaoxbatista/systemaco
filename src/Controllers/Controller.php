<?php
	//PROJECT: Tarefas 
	//AUTHOR : João Batista Gomes Silva
	//E-MAIL : jhonxbatista@gmail.com

	namespace App\Controllers;

	class Controller{

		public function __construct($container){
			$this->container = $container;
		}

		public function __get($property){
			if($this->container->{$property}){
				return $this->container->{$property};
			}
		}
	}