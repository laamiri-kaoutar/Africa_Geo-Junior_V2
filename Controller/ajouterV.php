<?php
    require_once '../Controller/VilleController.php';

    $iden=$_GET['id'];
    // if (isset($_GET['idCity'])) {
    //     $nomP = $_POST["nom"];
    //     $continentP=$_POST["continent"];
    //     $languesP =$_POST["langues"];
    //     $urlImageP =$_POST["urlImage"];
    //     $populationP =$_POST["population"];
    //     $idP=$_POST['id'];
    //     $sql="UPDATE pays set nom='$nomP', population='$populationP', langues='$languesP', urlImage='$urlImageP', id_continent='$continentP' where id_pays = '$idP' ";
    //     $conn->query($sql);
    //     header("Location: Payss.php");
    // }else{ 
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

        }  {
            echo "something wint wrong in the create";
        }
        

    }
    // }
?>