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
        if($user!=null && strcmp($user->getPassword(), $password)==0) {
            $connected = true;
            if(!parent::isConnected()) {
                parent::connect($user);
            }
        }

        $itemRepository = $entityManager->getRepository('Item');
        $items = $itemRepository->findAll();
        shuffle($items);
        $array = array('items' => array_slice($items, 0, 9));
        if($connected == false) {
            $array['message'] = 'Sign in failure';
        }
        parent::render($response, 'home.twig', $array);
    }

}