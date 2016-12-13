<?php
	//PROJECT: Tarefas 
	//AUTHOR : João Batista Gomes Silva
	//E-MAIL : jhonxbatista@gmail.com

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Document extends Model{

		protected $table = 'documents';
		protected $primaryKey = 'doc_id';

	}