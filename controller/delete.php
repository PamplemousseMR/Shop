<?php

require_once('php/IController.php');

class Delete extends IController { 
    
    public static function router($request, $response, $args) { 
        if(parent::isAdmin()) {
            $id = $_GET['item'];
            global $entityManager;
            $itemRepository = $entityManager->getRepository('Item');
            $item = $itemRepository->findOneBy(array('id'=>$id));
            $entityManager->remove ($item);
            $entityManager->flush ();
        }
        return $response->withStatus(302)->withHeader('Location', '/home');
    }

}