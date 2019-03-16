<?php

require_once('php/IController.php');

class Home extends IController { 
    
    public static function router($request, $response, $args) { 
        parent::displayHome($response, array());
    }

}