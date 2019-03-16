<?php

require_once('php/IController.php');

class SignDown extends IController { 
    
    public static function router($request, $response, $args) { 
        if(parent::isConnected()) {
            $old = $_POST["do-old"];
            $password = $_POST["do-password"];
            $confirm = $_POST["do-confirm"];

            $user = parent::getUser();
            if($user->getPassword() == $old) {
                echo "ok";
                echo $password;
                echo $confirm;
            }

            //return $response->withStatus(302)->withHeader('Location', '/profile');
        } else {
            return $response->withStatus(302)->withHeader('Location', '/home');
        }
    }

}