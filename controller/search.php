<?php

require_once('php/IController.php');

class Search extends IController { 
    
    public static function router($request, $response, $args) {
        $name = '';
        if(isset($_GET["name"])) {
            $name = $_GET["name"];
        }
        
        $min = 0;
        if(!empty($_GET["min"])) {
            $min = $_GET["min"];
            $minTwig = $min;
        }
        
        $max = 100;
        if(!empty($_GET["max"])) {
            $max = $_GET["max"];
            $maxTwig = $max;
        }
        
        global $entityManager;
        $itemRepository = $entityManager->getRepository('Item');
        $items = $itemRepository->createQueryBuilder('i')
                                ->where('i.name LIKE :name')
                                ->andWhere('i.price >= :min')
                                ->andWhere('i.price <= :max')
                                ->setParameter('name', '%'.$name.'%')
                                ->setParameter('min', $min)
                                ->setParameter('max', $max)
                                ->getQuery()->getResult();
        usort($items, function($a, $b) {
            return strcmp($a->getName(), $b->getName());
        });
        parent::render($response, 'search.twig', array('items' => $items, 'search' => $name, 'min' => $minTwig, 'max' => $maxTwig));
    }

}