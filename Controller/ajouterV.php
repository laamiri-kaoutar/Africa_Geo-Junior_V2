<?php
    require_once '../Controller/VilleController.php';
    var_dump(isset($_GET['idCity']));
    $iden=$_GET['id'];
    var_dump($_GET['idCity']);
    var_dump($iden);
    if (isset($_GET['idCity'])) {

        $id = $_GET['idCity'];

        $image = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        // i have to change the path here to be exactly where we want to add the image
        $folder = '../View/img/'.$image; 
        move_uploaded_file($tempname , $folder);
        $nom = $_POST["nom"];
        $type =$_POST["type"];
        $id_pays = $iden;

        
        $ville = new Ville($id, $nom, $type, $id_pays, $image);
            
        $villeController = new VilleController();
        if ($villeController->update($ville)) {
            var_dump($ville);
            header("Location:../View/ville.php?id=$iden");

        }else{
            echo "something wint wrong in the create";
        }
        
        
    }else{ 

       if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {


        $image = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        // i have to change the path here to be exactly where we want to add the image
        $folder = '../View/img/'.$image; 
        move_uploaded_file($tempname , $folder);
        $nom = $_POST["nom"];
        $type =$_POST["type"];
        $id_pays = $iden;


        
        $ville = new Ville(null, $nom, $type, $id_pays, $image);
            
        $villeController = new VilleController();
        if ($villeController->create($ville)) {
            var_dump($ville);
            header("Location:../View/ville.php?id=$iden");

        }else{
            echo "something wint wrong in the create";
        }
        

    }


    }