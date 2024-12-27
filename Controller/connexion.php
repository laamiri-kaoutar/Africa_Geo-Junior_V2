<?php

session_start();

require_once "../Model/user.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User(null, null,$email, $password, null);

    if (empty($user->getElementByEmail())) {
        $errors["notFound"]= "user not found";
        $_SESSION["errors"] = $errors;
        header("Location:../index.php");

    }else {
         $data =$user->getElementByEmail();
         $data = $data[0];

         $passwordCheck = password_verify($password, $data['password']);
         var_dump($passwordCheck);
         if (!$passwordCheck) {
             $errors["invalidpwd"] = "Invalid password.";
             $_SESSION["errors"] = $errors;
             header("Location:../index.php");
         }else {
            $userS = [
                "username" => $data['username'],
                "email" => $data['email'],
                "role" => $data['role']
            ];
            $_SESSION["user"] = $userS;
            


         }

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
  

        $_SESSION["user"] = $user;

        if ($user->create()) {
            header("Location:../View/ville.php");
        }
        die();
    }
          
            

     
} 