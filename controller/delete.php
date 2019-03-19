<?php

require_once('php/IController.php');

class Delete extends IController { 
    
    public static function router($request, $response, $args) { 
        if(parent::isConnected()) {
            global $entityManager;
            if(!empty($_GET["item"]) && parent::isAdmin()) {
                $id = $_GET['item'];
                $itemRepository = $entityManager->getRepository('Item');
                $item = $itemRepository->findOneBy(array('id'=> $id));
                if($item == null) {
                    break;
                }
                $entityManager->remove($item);
            } else if(!empty($_GET["mail"])) {
                $mail = $_GET['mail'];
                $userRepository = $entityManager->getRepository('User');
                $user = $userRepository->findOneBy(array('mail'=> $mail));
                if($user == null) {
                    break;
                }
                $entityManager->remove($user);
                parent::disconnect();
            }
            $entityManager->flush();
        }
        return $response->withStatus(302)->withHeader('Location', '/home');
    }

}