<?php
	//PROJECT: Tarefas 
	//AUTHOR : João Batista Gomes Silva
	//E-MAIL : jhonxbatista@gmail.com

	namespace App\Controllers;
	use Slim\Views\Twig as View;
	use App\Models\Document as Document;
	use App\Models\Project as Project;
	
	class DocumentsCtrl extends Controller{

		public function index($request, $response){

			$documents = Document::all()->toArray();
			$result = array();

			foreach ($documents as $document) {
				$document['project_name'] = Project::find($document['project_id'])->project_name;
				array_push($result, $document);
			}
			$projects = Project::all()->toArray();

			return $this->view->render($response, 'documents.twig', 
				array(
					'documents' => $result,
					'projects' => $projects

			));
		}


		public function add_page($request, $response){

			return $this->view->render($response, 'documents_add.twig');

		}

	}