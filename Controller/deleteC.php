<?php

require_once '../Controller/continentController.php';


    $id=$_GET['id'];

    $continentController = new ContinentController();

    if ($continentController->deleteById($id)) {
        header("Location:../View/Continent.php");
    } else {
        echo "something wint wrong in the delete of the $id";
    }

?>