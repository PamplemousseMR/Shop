<?php

abstract class IController { 
    
    public static abstract function router($request, $response, $args);
    
    public static function render($response, $template, $array) {
        $array['isConnected'] = self::isConnected();
        global $twig; 
        $template = $twig->loadTemplate($template);
        return $response->write( $template ->render($array));
    }
    
    public static function isConnected() {
        session_start();
        return isset($_SESSION['connected']);
    }
    
    public static function connect($user) {
        session_start();
        $_SESSION['connected'] = true;
        $_SESSION['mail'] = $user->getMail();
        $_SESSION['lastename'] = $user->getLasname();
        $_SESSION['mail'] = $user->getFirstname();
    }

    public static function disconnect() {
        session_start();
        unset($_SESSION['connected']) ;
    }
}