<?php

require_once('php/IController.php');

class Create extends IController { 
    
    public static function router($request, $response, $args) { 
        if(parent::isConnected() && parent::isAdmin()) {
            $url = '';
            if(!empty($_GET['url'])) {
                $url = $_GET['url'];
            }
            
            $name = '';
            if(!empty($_GET['name'])) {
                $name = $_GET['name'];
            }
            
            $quote = '';
            if(!empty($_GET['quote'])) {
                $quote = $_GET['quote'];
            }
            
            $description = '';
            if(!empty($_GET['description'])) {
                $description = $_GET['description'];
            }
            
            $price = '';
            if(!empty($_GET['price'])) {
                $price = $_GET['price'];
            }
            
            if($url != '' && $name != '' && $quote != '' && $description != '' && $price != '') {
                $item = new Item();

                $item->setIcon($url);
                $item->setName($name);
                $item->setQuote($quote);
                $item->setDescription($description);
                $item->setPrice($price);
                
                global $entityManager;
                $entityManager->persist($item);
                $entityManager->flush();
            } else {
                return parent::render($response, 'create.twig', array());
            }
        } 
        return $response->withStatus(302)->withHeader('Location', '/home');
    }

}