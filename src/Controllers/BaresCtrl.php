<?php
	//PROJECT: Omnidrink 
	//AUTHOR : João Batista Gomes Silva
	//E-MAIL : jhonxbatista@gmail.com

	namespace App\Controllers;
	use App\Models\Bar as Bar;

	class BaresCtrl{

		public function compra(){

		}
		
		//FUNÇÃO QUE RETORNA TODAS AS BEBIDAS DO BAR
		public function bebidas($request, $response, $args){
			$bar = Bar::find($args['id']);
			$bebidas = $bar->bebidas();
			echo $bebidas->toJson();

		}
		public function all($request, $response, $args){
			$resultado = Bar::all();
			echo $resultado->toJson();
		}
		//FUNÇÃO QUE LISTA TODOS OS BARES
		public function index($request, $response){
			$bares = Bar::all();
			echo $bares->toJson();
		}

		//FUNÇÃO PARA PROCURAR BARES
		public function find($request, $response, $args){
	
			$bar = Bar::find($args['id']);
		    if (!empty($bar)){
		    	echo $bar->toJson();
		    }else{
		    	echo "Bar não encontrado!";
		    }

		}

		//FUNÇÃO PARA REGISTRAR BARES
		public function register($request, $response, $args){

			try {
				$bar = new Bar();
				$bar->nome = $request->getParam('nome');
				$bar->estado = $request->getParam('estado');
				$bar->cidade = $request->getParam('cidade');
				$bar->bairro = $request->getParam('bairro');
				$bar->numero = $request->getParam('numero');
				$bar->ponto_ref = $request->getParam('ponto_ref');
				$bar->cep = $request->getParam('cep');
				$bar->telefone = $request->getParam('telefone');
				$bar->email = $request->getParam('email');
				$bar->stars = $request->getParam('stars');
				$bar->save();

				$response->withHeader('Content-type', 'application/json');
				$response->status = 200;
				echo $bar->toJson();
			} catch (Exception $e) {
				echo "Erro ao registrar Bar";
			}
		}

		//FUNÇÃO PARA EDIÇÃO DE DADOS DOS BARES
		public function update($request, $response){
			$body = $request->getParsedBody();
			
			if (isset($body['id']) and !empty($body['id'])){
				try {
					$bar = Bar::find($body['id']);
					$bar->nome = isset($body['nome']) ? $body['nome'] : $bar->nome;
					$bar->estado = isset($body['estado']) ? $body['estado'] : $bar->estado;
					$bar->cidade = isset($body['cidade']) ? $body['cidade'] : $bar->cidade;
					$bar->bairro = isset($body['bairro']) ? $body['bairro'] : $bar->bairro;
					$bar->numero = isset($body['numero']) ? $body['numero'] : $bar->numero;
					$bar->ponto_ref = isset($body['ponto_ref']) ? $body['ponto_ref'] : $bar->ponto_ref;
					$bar->cep = isset($body['cep']) ? $body['cep'] : $bar->cep;
					$bar->telefone = isset($body['telefone']) ? $body['telefone'] : $bar->telefone;
					$bar->email = isset($body['email']) ? $body['email'] : $bar->email;
					$bar->stars = isset($body['stars']) ? $body['stars'] : $bar->stars;
					$bar->save();

					echo $bar->toJson();

				} catch (Exception $e) {
					echo $e->getMessage();
				}
			}
		}

		//FUNÇÃO PARA REMOVER BARES DO BANCO DE DADOS
		public function delete($request, $response){

			$token = $request->getParam('token');
			$id = $request->getParam('id');
			$bar = Bar::find($id);
			if (!empty($bar)){
				$bar->delete();
				echo "Bar deletado com sucesso!";
			}else{
				echo "Erro ao deletar bar!";
			}

		}
	}