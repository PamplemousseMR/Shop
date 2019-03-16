<?php

require_once('php/IController.php');

class SignIn extends IController { 
    
    public static function router($request, $response, $args) { 
        $mail = $_POST["mail"];
        $password = $_POST["password"];

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
        parent::render($response, 'home.twig', array('items' => array_slice($items, 0, 9), 'connected' => $connected));
    }

}