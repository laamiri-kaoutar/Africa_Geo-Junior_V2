<?php
    include 'connexion.php';
    if (isset($_GET['id'])) {
        $nomP = $_POST["nom"];
        $continentP=$_POST["continent"];
        $languesP =$_POST["langues"];
        $urlImageP =$_POST["urlImage"];
        $populationP =$_POST["population"];
        $idP=$_POST['id'];
        $sql="UPDATE pays set nom='$nomP', population='$populationP', langues='$languesP', urlImage='$urlImageP', id_continent='$continentP' where id_pays = '$idP' ";
        $conn->query($sql);
        header("Location: Payss.php");
    }else{ 
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $nom = $_POST["nom"];
        $continent=$_POST["continent"];
        $langues =$_POST["langues"];
        $urlImage =$_POST["urlImage"];
        $population =$_POST["population"];

        $data= "INSERT INTO pays (nom, population, langues, urlImage,id_continent) 
        VALUES ('$nom','$population','$langues','$urlImage','$continent')";

        $conn->query($data);

        header("Location: Payss.php");

    }
    }
?>