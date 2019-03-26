<?php

require_once('php/IController.php');

class Profile extends IController { 
    
    public static function router($request, $response, $args) { 
        if(parent::isConnected()) {
            if(!empty($_GET["mail"]) && strcmp(parent::getUser()->getMail(), $_GET["mail"]) == 0) {
                global $entityManager;
                $mail = $_GET['mail'];
                $userRepository = $entityManager->getRepository('User');
                $user = $userRepository->findOneBy(array('mail'=> $mail));
                if($user != null) {
                    $entityManager->remove($user);
                    parent::disconnect();
                    $entityManager->flush();
                }
            } else {
                return parent::render($response, 'profile.twig', array('user' => parent::getUser()));
            }
        } 
        return $response->withStatus(302)->withHeader('Location', '/home');
    }

}