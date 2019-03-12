<?php

    require('vendor/autoload.php');
    require('bootstrap.php');

    $loader = new Twig_Loader_Filesystem("templates");
    $twig = new Twig_Environment($loader, array(
        'cache' => false
    ));
    
    $app= new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]);
    $app->get('/', homeRoot); 
    $app->get('/home', homeRoot); 
    $app->run(); 
    
?>