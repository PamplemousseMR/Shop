<?php

require_once('php/IController.php');

class SignUp extends IController { 
    
    public static function router($request, $response, $args) { 
        if(isset($_POST["up-mail"]) && isset($_POST["up-lastname"]) && isset($_POST["up-firstname"]) && isset($_POST["up-password"]) && isset($_POST["up-confirm"])) {
            $mail = $_POST["up-mail"];
            $password = $_POST["up-password"];
            $confirm = $_POST["up-confirm"];
            
            global $entityManager;
            $userRepository = $entityManager->getRepository('User');
            $user = $userRepository->findOneBy(array('mail'=> $mail));
            
            if($user == null) {
                if($password == $confirm) {
                    $user = new User();
                    $user->setMail($mail);
                    $user->setPassword($password);
                    $user->setLastname(strtoupper($_POST["up-lastname"]));
                    $user->setFirstname(ucfirst(strtolower($_POST["up-firstname"])));
                    $user->setPhone($_POST["up-phone"]);
                    $user->setNumber($_POST["up-number"]);
                    $user->setStreet(strtolower($_POST["up-street"]));
                    $user->setZipcode($_POST["up-zipcode"]);
                    $user->setTown(ucfirst(strtolower($_POST["up-town"])));
                    $entityManager->persist($user);
                    $entityManager->flush();
                } else {
                    return parent::displayHome($response, array('message' => 'Password didn\'t match'));
                }
            } else {
                return parent::displayHome($response, array('message' => 'Mail already used'));
            }
        }
        return $response->withStatus(302)->withHeader('Location', '/home');
    }

}