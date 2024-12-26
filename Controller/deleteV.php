<?php
    require_once '../Controller/VilleController.php';
    
    $id = $_GET['idCity'];
    $identifiant = $_GET['id'];

    $villeController = new VilleController();


    if ($villeController->deleteById($id)) {
        header("Location: ville.php?id=$identifiant");
    } else {
        echo "something wint wrong in the delete of the $id";
    }
 
    
?>