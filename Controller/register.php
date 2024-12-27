<?php

session_start();

require_once "../Model/user.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $role = "user";

    if ( !filter_var($email , FILTER_VALIDATE_EMAIL)) {
        $errors["invalidemail"] = "this is invalid email";
    }

    if (empty($username)) {
        $errors["emptyname"] = "please do not leave username empty";
        
    }
    if (empty($email)) {
        $errors["emptyemail"] = "please do not leave email empty";
        
    }
    if (empty($password)) {
        $errors["emptypassword"] = "please do not leave password empty";
        
    }

    $user = new User(null, $username,$email, $password, $role);

    if (!empty($user->getElementByEmail())) {
        $errors["usedemail"]= "Email is already used";
    }
    

    
    if ($errors) {
        $_SESSION["errors"] = $errors;
        $registerData = [
            "username"=> $username,
            "email"=> $email
        ];
        $_SESSION["registerData"] = $registerData;
        var_dump(isset($_SESSION["errors"]))  ; 
        header("Location:../index.php");
        // die();
    } else {

        $user->setPassword(password_hash($password,PASSWORD_DEFAULT)); 
        $user->setId($user-> lastInsertId());    
        
        $userS = [
            "username"=> $username,
            "email"=> $email,
            "role" => "user"   
        ];
        
        $_SESSION["user"] = $userS;

        if ($user->create()) {
            header("Location:../View/ville.php");

        }
    }
          
            

     
} 