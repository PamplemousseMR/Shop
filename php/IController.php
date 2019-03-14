<?php

abstract class IController { 
    
    public static abstract function router($request, $response, $args);
    
    public static function render($response, $template, $array) {
        global $twig; 
        $template = $twig->loadTemplate($template);
        return $response->write( $template ->render($array));
    }

}