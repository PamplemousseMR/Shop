<?php

require_once('php/IController.php');

class Basket extends IController { 
    
    public static function router($request, $response, $args) { 
        global $entityManager;
        $itemRepository = $entityManager->getRepository('Item');
        if(!empty($_GET['item'])) {
            $id = $_GET['item'];
            if(isset($_GET['more'])) {
                self::moreCart($id);
            } else if(isset($_GET['less'])) {
                self::lessCart($id);
            } else if(isset($_GET['delete'])) {
                self::delCart($id);
            } else {
                $item = $itemRepository->findOneBy(array('id'=>$id));
                if($item != null) {
                    self::addToCart($item);
                }
            }
        }
        $list = self::getCart();
        $items = array();
        $quantities = array();
        $total = 0;
        if($list != null) {
            foreach($list as $id => $quantity) {
                $item = $itemRepository->findOneBy(array('id'=>$id));
                if($item == null) {
                    self::delCart($id);
                } else {
                    array_push($items, $item);
                    array_push($quantities, $quantity);
                    $total += $quantity * $item->getPrice();
                }
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
    
    public static function lessCart($id) {
        session_start();
        if(!empty($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = $_SESSION['cart'][$id]-1;
            if($_SESSION['cart'][$id] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
    }
    
    public static function moreCart($id) {
        session_start();
        if(!empty($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = $_SESSION['cart'][$id]+1;
        }
    }
    
    public static function delCart($id) {
        session_start();
        if(!empty($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }
}