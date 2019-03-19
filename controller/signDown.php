<?php

require_once('php/IController.php');

class SignDown extends IController { 
    
    public static function router($request, $response, $args) { 
        if(parent::isConnected()) {
            if(empty($_POST["hiddenPassword"]))
            {
                $old = $_POST["do-old"];
                $password = $_POST["do-password"];
                $confirm = $_POST["do-confirm"];
    
                global $entityManager;
                $userRepository = $entityManager->getRepository('User');
                $user = $userRepository->findOneBy(array('mail'=> parent::getUser()->getMail()));
                if($user->getPassword() == $old) {
                    if($password == $confirm) {
                        $user->setPassword($password);
                        $entityManager->persist($user);
                        $entityManager->flush();
                    } else {
                        return parent::displayHome($response, array('message' => 'New password didn\'t match'));
                    }
                } else {
                    return parent::displayHome($response, array('message' => 'Old password incorrect'));
                }
            } else if(empty($_POST["hiddenUpdate"])) {
                global $entityManager;
                $userRepository = $entityManager->getRepository('User');
                $user = $userRepository->findOneBy(array('mail'=> parent::getUser()->getMail()));
                
                $user->setLastname(strtoupper($_POST["do-lastname"]));
                $user->setFirstname(ucfirst(strtolower($_POST["do-firstname"])));
                $user->setPhone($_POST["do-phone"]);
                $user->setNumber($_POST["do-number"]);
                $user->setStreet(strtolower($_POST["do-street"]));
                $user->setZipcode($_POST["do-zipcode"]);
                $user->setTown(ucfirst(strtolower($_POST["do-town"])));

                $entityManager->persist($user);
                $entityManager->flush();
                parent::connect($user);
                
                return $response->withStatus(302)->withHeader('Location', '/profile');
            } else {
                return parent::displayHome($response, array('message' => 'An error has appeared'));
            }
        }
        return $response->withStatus(302)->withHeader('Location', '/home');
    }

}