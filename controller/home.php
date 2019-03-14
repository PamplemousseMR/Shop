<?php

require_once('php/IController.php');

class Home extends IController { 
    
    public static function router($request, $response, $args) { 
        global $entityManager;
        $itemRepository = $entityManager->getRepository('Item');
        $items = $itemRepository->findAll();
        shuffle($items);
        parent::render($response, 'home.twig', array('items' => array_slice($items, 0, 9)));
    }

}