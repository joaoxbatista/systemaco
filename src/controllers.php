<?php

	$container['TasksCtrl'] = function($container){
		return new \App\Controllers\TasksCtrl($container);
	};

	$container['ProjectsCtrl'] = function($container){
		return new \App\Controllers\ProjectsCtrl($container);
	};

	$container['HomeCtrl'] = function($container){
		return new \App\Controllers\HomeCtrl($container);
	};

	$container['DocumentsCtrl'] = function($container){
		return new \App\Controllers\DocumentsCtrl($container);
	};


