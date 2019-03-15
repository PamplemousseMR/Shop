<?php

require_once('php/IController.php');

class SignIn extends IController { 
    
    public static function router($request, $response, $args) { 
        $connected = false;
        
        if(isset($_POST["mail"]) && isset($_POST["password"])) {
            $mail = $_POST["mail"];
            $password = $_POST["password"];
            
            global $entityManager;
            $userRepository = $entityManager->getRepository('User');
            $user = $userRepository->findOneBy(array('mail'=>$mail));
            
            if($user!=null && strcmp($user->getPassword(), $password)==0) {
                $connected = true;
                if(!parent::isConnected()) {
                    parent::connect($user);
                }
            }
        }

        $itemRepository = $entityManager->getRepository('Item');
        $items = $itemRepository->findAll();
        shuffle($items);
        if($connected) {
            parent::render($response, 'home.twig', array('items' => array_slice($items, 0, 9), 'success' => 'Sign in success'));
        } else {
            parent::render($response, 'home.twig', array('items' => array_slice($items, 0, 9), 'failure' => 'Sign in failure'));
        }
    }

}