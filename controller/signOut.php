<?php

require_once('php/IController.php');

class SignOut extends IController { 
    
    public static function router($request, $response, $args) { 
        parent::disconnect();
        return $response->withStatus(302)->withHeader('Location', '/home');
    }

}