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
        if(parent::isConnected() && parent::isAdmin()) {
            if(isset($_GET["delete"])) {
                $entityManager->remove($item);
                $entityManager->flush();
                return $response->withStatus(302)->withHeader('Location', '/home');
            } else {
                $name = $item->getName();
                if(!empty($_GET['name'])) {
                    $name = $_GET['name'];
                }
                
                $quote = $item->getQuote();
                if(!empty($_GET['quote'])) {
                    $quote = $_GET['quote'];
                }
                
                $description = $item->getDescription();
                if(!empty($_GET['description'])) {
                    $description = $_GET['description'];
                }
                
                $price = $item->getPrice();
                if(!empty($_GET['price'])) {
                    $price = $_GET['price'];
                }
                
                $item->setName($name);
                $item->setQuote($quote);
                $item->setDescription($description);
                $item->setPrice($price);
                $entityManager->persist($item);
                $entityManager->flush();
            }
        }
        parent::render($response, 'detail.twig', array('item' => $item));
    }

}