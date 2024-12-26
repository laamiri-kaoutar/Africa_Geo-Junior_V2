<?php
    include '../Controller/PaysController.php';
    if (isset($_GET['id'])) {
    if($_SERVER['REQUEST_METHOD'] == "POST" ) {

        $image = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        // i have to change the path here to be exactly where we want to add the image
        $folder = 'assets/img/'.$image; 
        move_uploaded_file($tempname , $folder);

        $nom = $_POST["nom"];
        $continent=$_POST["continent"];
        $langues =$_POST["langues"];
        $population =$_POST["population"];

        $Pays = new Pays(null, $nom, $population, $langue, $continent, $image);

        $paysController = new PaysController();

        if ($paysController->update($Pays)) {
            header("Location: Payss.php");
        } else {
            echo "something wint wrong in the update";
        }

       
       
    }

    }else{ 
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $image = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        // i have to change the path here to be exactly where we want to add the image
        $folder = 'assets/img/'.$image; 
        move_uploaded_file($tempname , $folder);

        $nom = $_POST["nom"];
        $continent=$_POST["continent"];
        $langues =$_POST["langues"];
        $population =$_POST["population"];

        $Pays = new Pays(null, $nom, $population, $langue, $continent, $image);

        $paysController = new PaysController();
        if ($paysController->create($Pays)) {
            header("Location: Payss.php");
        } else {
            echo "something wint wrong in the create";
        }

    }
    }
?>