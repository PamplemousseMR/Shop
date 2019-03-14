<?php

require_once('php/IController.php');

class Search extends IController { 
    
    public static function router($request, $response, $args) { 
        global $entityManager;
        $itemRepository = $entityManager->getRepository('Item');
        $items = $itemRepository->findAll();
        parent::render($response, 'search.twig', array('items' => $items));
    }

}