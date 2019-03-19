<?php

require_once('php/IController.php');

class Detail extends IController { 
    
    public static function router($request, $response, $args) { 
        parent::render($response, 'detail.twig', array());
    }

}