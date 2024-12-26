<?php

require_once '../Controller/PaysController.php';


    $id=$_GET['id'];

    $paysController = new PaysController();

    if ($paysController->deleteById($id)) {
        header("Location:../View/Payss.php");
    } else {
        echo "something wint wrong in the delete of the $id";
    }

?>