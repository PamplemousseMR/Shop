<?php

    require_once('vendor/autoload.php');
    require_once('bootstrap.php');

    $loader = new Twig_Loader_Filesystem("template");
    $twig = new Twig_Environment($loader, array(
        'cache' => false
    ));
    
    $container = new \Slim\Container();

    $container['notFoundHandler'] = function ($c) {
        return function ($request, $response) use ($c) {
            return $response->withStatus(302)->withHeader('Location', '/home');
        };
    };

    $app= new \Slim\App($container);
    
    $app->get('/', '\Home:router'); 
    $app->get('/home', '\Home:router');
    $app->post('/sign-in', '\SignIn:router'); 
    $app->get('/sign-out', '\SignOut:router');
    $app->post('/sign-down', '\SignDown:router');
    $app->post('/sign-up', '\SignUp:router'); 
    $app->get('/profile', '\Profile:router'); 
    $app->get('/search', '\Search:router'); 
    $app->get('/detail', '\Detail:router'); 
    $app->get('/basket', '\Basket:router'); 
    $app->get('/create', '\Create:router'); 
    $app->run(); 
    
?>