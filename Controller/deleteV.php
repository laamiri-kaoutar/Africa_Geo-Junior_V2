<?php
    require_once '../Controller/VilleController.php';
    
    $id = $_GET['idCity'];
    $iden = $_GET['id'];

    $villeController = new VilleController();


    if ($villeController->deleteById($id)) {
        // var_dump($iden);
        header("Location:../View/ville.php?id=$iden");

    } else {
        echo "something wint wrong in the delete of the $id";
    }
 
    
?>