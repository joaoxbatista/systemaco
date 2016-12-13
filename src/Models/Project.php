<?php
	//PROJECT: Tarefas 
	//AUTHOR : João Batista Gomes Silva
	//E-MAIL : jhonxbatista@gmail.com

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Project extends Model{

		protected $table = 'projects';
		protected $primaryKey = 'project_id';

		public function tasks(){
			return $this->hasMany('App\Models\Task');
		}
		
	}