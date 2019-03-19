<?php

abstract class IController { 
    
    public static abstract function router($request, $response, $args);
    
    public static function render($response, $template, $array) {
        $array['isConnected'] = self::isConnected();
        $array['isAdmin'] = self::isAdmin();
        global $twig; 
        $template = $twig->loadTemplate($template);
        return $response->write( $template ->render($array));
    }
    
    public static function displayHome($response, $array) {
        global $entityManager;
        $itemRepository = $entityManager->getRepository('Item');
        $items = $itemRepository->findAll();
        shuffle($items);
        $param = array('items' => array_slice($items, 0, 18));
        self::render($response, 'home.twig', array_merge($param, $array));
    }
    
    public static function isConnected() {
        session_start();
        return isset($_SESSION['connected']);
    }
    
    public static function isAdmin() {
        return self::isConnected() && self::getUser()->getAdmin();
    }
    
    public static function connect($user) {
        session_start();
        $_SESSION['connected'] = $user;
    }

    public static function disconnect() {
        session_start();
        unset($_SESSION['connected']) ;
    }
    
    public static function getUser() {
        session_start();
        return $_SESSION['connected'];
    }
}