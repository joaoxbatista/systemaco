<?php
// DIC configuration

$container = $app->getContainer();

$container['view'] = function ($container) {
 
    $view = new \Slim\Views\Twig(array('../templates'), []);
    
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Eloquent Database Configurations
$capsule = new \Illuminate\Database\Capsule\Manager; 
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();


$container['db'] = function($container) use ($capsule){
    return $capsule;
};