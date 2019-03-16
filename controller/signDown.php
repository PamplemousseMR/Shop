<?php

require_once('php/IController.php');

class SignDown extends IController { 
    
    public static function router($request, $response, $args) { 
        if(parent::isConnected()) {
            return $response->withStatus(302)->withHeader('Location', '/profile');
        } else {
            return $response->withStatus(302)->withHeader('Location', '/home');
        }
    }

}