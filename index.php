<?php

    require_once('vendor/autoload.php');
    require_once('bootstrap.php');

    $loader = new Twig_Loader_Filesystem("template");
    $twig = new Twig_Environment($loader, array(
        'cache' => false
    ));
    
    $app= new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]);
    $app->get('/', '\Home:router'); 
    $app->get('/home', '\Home:router'); 
    $app->run(); 
    
?>