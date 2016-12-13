<?php
	//PROJECT: Tarefas 
	//AUTHOR : João Batista Gomes Silva
	//E-MAIL : jhonxbatista@gmail.com

	namespace App\Controllers;
	use App\Models\Task as Task;
	use App\Models\Project as Project;
	use Slim\Views\Twig as View;
	
	class TasksCtrl extends Controller{

		public function index($request, $response){
			$tasks = Task::all();
			$tasks = $tasks->toArray();
			$projects = Project::all()->toArray();
			$result = array();

			foreach ($tasks as $task) {
				$task['project_name'] = Project::find($task['project_id'])->project_name;

				array_push($result, $task);
			}

			return $this->container->view->render($response, 'tasks.twig', array('tasks' => $result, 'projects' => $projects ));
		}

		public function add_page($request, $response){
			$projects = Project::all()->toArray();
			return $this->container->view->render($response, 'task_add.twig', array('projects' => $projects));
		}

		public function add($request, $response){

			$task = new Task();
			$task->task_name = $_POST['task_name'];
			$task->task_link = $_POST['task_link'];
			$task->task_desc = $_POST['task_desc'];
			$task->project_id = $_POST['project_id'];
			$task->user_name = $_POST['user_name'];
			$task->save();

			return $response->withRedirect('/');
		}

		public function edit_page($request, $response){
			
			$task = Task::find($_POST['task_id'])->toArray();
			$task['project_name'] = Project::find($task['project_id'])->project_name;
			$projects = Project::all()->toArray();

			return $this->container->view->render($response, 'task_edit.twig', array("task" => $task, 'projects' => $projects) );
		}

		public function update($request, $response){
			$task = Task::find($_POST['task_id']);
			$task->task_name = $_POST['task_name'];
			$task->task_link = $_POST['task_link'];
			$task->task_desc = $_POST['task_desc'];
			$task->project_id = $_POST['project_id'];
			$task->user_name = $_POST['user_name'];
			$task->save();

			return $response->withRedirect('/');
		}
	}