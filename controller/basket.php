<?php

require_once('php/IController.php');

class Basket extends IController { 
    
    public static function router($request, $response, $args) { 
        $id = $_GET['item'];
        global $entityManager;
        $itemRepository = $entityManager->getRepository('Item');
        $item = $itemRepository->findOneBy(array('id'=>$id));
        if($item != null) {
            self::addToCart($item);
        }
        $list = self::getCart();
        $items = array();
        $quantities = array();
        $total = 0;
        if($list != null) {
            foreach($list as $id => $quantity) {
                $item = $itemRepository->findOneBy(array('id'=>$id));
                if($item == null) {
                    return $response->withStatus(302)->withHeader('Location', '/home');
                }
                array_push($items, $item);
                array_push($quantities, $quantity);
                $total += $quantity * $item->getPrice();
            }
        }
        parent::render($response, 'basket.twig', array('items' => $items, 'quantities' => $quantities, 'total' => $total));
    }

    public static function addToCart($item) {
        session_start();
        if(empty($_SESSION['cart'][$item->getId()])) {
            $_SESSION['cart'][$item->getId()] = 1;
        }
    }
    
    public static function getCart() {
        session_start();
        if(isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        } 
        return null;
    }
}