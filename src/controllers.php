<?php

	$container['HomeCtrl'] = function($container){
		return new \App\Controllers\HomeCtrl($container);
	};

	$container['BarsCtrl'] = function($container){
		return new \App\Controllers\BarsCtrl($container);
	};