<?php

require_once('php/IController.php');

class Home implements IController { 
    
    public static function router($request, $response, $args) { 
        global $entityManager;
        $itemRepository = $entityManager->getRepository('Item');
        $item = $itemRepository->findBy(array('id' => 63));
        
        global $twig; 
        $template = $twig ->loadTemplate ('home.twig');    
        return $response->write( $template ->render(array(
            'content' => $item[0]->getName()
            )));
    }

}