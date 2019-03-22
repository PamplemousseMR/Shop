<?php

require_once('php/IController.php');

class Create extends IController { 
    
    public static function router($request, $response, $args) { 
        if(parent::isConnected() && parent::isAdmin()) {
            return parent::render($response, 'create.twig', array());
        } 
        return $response->withStatus(302)->withHeader('Location', '/home');
    }

}