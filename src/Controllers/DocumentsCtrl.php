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

		public function view($request, $response, $args){
			$document = Document::find($args['id'])->toArray();
			$project_name = Project::find($document['project_id'])->project_name;
			$document['project_name'] = $project_name;

			return $this->view->render($response, 'documents_view.twig', 
				array(
					'document' => $document
				)
			);
		}

		public function add_page($request, $response){

			$projects = Project::all()->toArray();
			return $this->view->render($response, 'documents_add.twig', array(
				'projects' => $projects));

		}

		public function add($request, $response){

			$document = new Document();
			$document->doc_name = $_POST['doc_name'];
			$document->doc_author = $_POST['doc_author'];
			$document->project_id = $_POST['project_id'];
			$document->doc_keyword = $_POST['doc_keyword'];
			$document->doc_text = $_POST['doc_text'];
			$document->save();

			return $response->withRedirect('/docs');
		}

		public function edit_page($request, $response){
			
			$document = Document::find($_POST['doc_id'])->toArray();
			$document['project_name'] = Project::find($document['project_id'])->project_name;
			$projects = Project::all()->toArray();

			return $this->container->view->render($response, 'document_edit.twig', array("document" => $document, 'projects' => $projects) );
		}

		public function update($request, $response, $args){

				$document = Document::find($_POST['doc_id']);
				$document->doc_name = $_POST['doc_name'];
				$document->project_id = $_POST['project_id'];
				$document->doc_author = $_POST['doc_author'];
				$document->doc_text = $_POST['doc_text'];
				$document->doc_keyword = $_POST['doc_keyword'];
				$document->save();

				return $response->withRedirect('/docs');
		}
	}