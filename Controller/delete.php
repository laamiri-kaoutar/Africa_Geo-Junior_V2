<?php

require_once '../Controller/PaysController.php';


    $id=$_GET['id'];
    $idenC=$_GET['idC'];

    $paysController = new PaysController();

    if ($paysController->deleteById($id)) {
        header("Location:../View/Payss.php?idC=$idenC");
    } else {
        echo "something wint wrong in the delete of the $id";
    }
