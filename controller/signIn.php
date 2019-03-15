<?php

require_once('php/IController.php');

class SignIn extends IController { 
    
    public static function router($request, $response, $args) { 
        $email = $_POST["email"];
        $password = $_POST["password"];

        global $entityManager;
        $userRepository = $entityManager->getRepository('User');
        $user = $userRepository->findOneBy(array('email'=>$email));
        
        $connected = false;
        if($user!=null && strcmp($user->getPassword(), $password)==0) {
            $connected = true;
            if(!parent::isConnected()) {
                parent::connect();
            }
        }

        $itemRepository = $entityManager->getRepository('Item');
        $items = $itemRepository->findAll();
        shuffle($items);
        parent::render($response, 'home.twig', array('items' => array_slice($items, 0, 9), 'connected' => $connected));
    }

}