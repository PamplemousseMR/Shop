<?php

require_once('php/IController.php');

class Detail extends IController { 
    
    public static function router($request, $response, $args) { 
        $id = $_GET['item'];
        global $entityManager;
        $itemRepository = $entityManager->getRepository('Item');
        $item = $itemRepository->findOneBy(array('id'=>$id));
        if($item == null) {
            return $response->withStatus(302)->withHeader('Location', '/home');
        }
        parent::render($response, 'detail.twig', array('item' => $item));
    }

}