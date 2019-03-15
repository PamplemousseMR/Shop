<?php

require_once('php/IController.php');

class Profile extends IController { 
    
    public static function router($request, $response, $args) { 
        if(parent::isConnected()) {
            parent::render($response, 'profile.twig', array());
        } else {
            return $response->withStatus(302)->withHeader('Location', '/home');
        }
    }

}