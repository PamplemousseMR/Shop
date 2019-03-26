<?php

require_once('php/IController.php');

class SignIn extends IController { 
    
    public static function router($request, $response, $args) { 
        $mail = $_POST["in-mail"];
        $password = $_POST["in-password"];

        global $entityManager;
        $userRepository = $entityManager->getRepository('User');
        $user = $userRepository->findOneBy(array('mail'=>$mail));
        
        $connected = false;
        if($user!=null && password_verify($password, $user->getPassword())) {
            $connected = true;
            if(!parent::isConnected()) {
                parent::connect($user);
            }
        }

        $array = array();
        if($connected == false) {
            $array['message'] = 'Sign in failure';
        }
        parent::displayHome($response, $array);
    }

}