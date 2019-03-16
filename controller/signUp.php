<?php

require_once('php/IController.php');

class SignDown extends IController { 
    
    public static function router($request, $response, $args) { 
        if(isset($_POST["up-mail"]) && isset($_POST["up-lastname"]) && isset($_POST["up-firstname"]) && isset($_POST["up-password"]) && isset($_POST["up-password-confirm"])) {
            $mail = $_POST["up-mail"];
            $lastname = $_POST["up-lastname"];
            $firstname = $_POST["up-firstname"];
            $password = $_POST["up-password"];
            $passwordConfirm = $_POST["up-password-confirm"];
            
            echo $mail;
            echo $lastname;
            echo $firstname;
            echo $password;
            echo $passwordConfirm;
        }
    }

}