<?php


$app->get('/','HomeCtrl:index')->setName('home');

$app->group('/tasks', function(){
	$this->get('[/]', 'TasksCtrl:index')->setName('tasks');
	$this->post('/edit', 'TasksCtrl:edit_page')->setName('task.edit.page');
	$this->post('/update', 'TasksCtrl:update')->setName('task.update');
	$this->get('/add', 'TasksCtrl:add_page')->setName('task.add.page');
	$this->post('/add', 'TasksCtrl:add')->setName('task.add');
});


$app->group('/docs', function(){
	$this->get('[/]', 'DocumentsCtrl:index')->setName('documents');
	$this->post('/edit', 'DocumentsCtrl:edit_page')->setName('documents.edit.page');

	$this->post('/update', 'DocumentsCtrl:update')->setName('documents.update');

	$this->get('/add', 'DocumentsCtrl:add_page')->setName('documents.add.page');

	$this->post('/add', 'DocumentsCtrl:add')->setName('documents.add');
});