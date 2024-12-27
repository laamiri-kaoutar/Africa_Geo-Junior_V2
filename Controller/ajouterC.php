<?php
    require_once 'continentController.php';
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        if(isset($_GET['id'])){
            $id= $_GET['id'];
            $image = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            // i have to change the path here to be exactly where we want to add the image
            $folder = '../View/img/'.$image; 
            move_uploaded_file($tempname , $folder);

            $nom = $_POST["nom"];
            $nbrPays=$_POST["nbrPays"];

            $Continent = new Continent($id,$nom,$nbrPays,$image);
            var_dump($Continent->getId(),$Continent->getNom(),$Continent->getNombrePays(),$Continent->getImage());

            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";


            $ContinentController = new ContinentController();
            if ($ContinentController->update($Continent)) {
                var_dump($Continent);
                header("Location:../View/Continent.php");
            }  {
                echo "something wint wrong in the update";
            }

        } else{ 

            // var_dump('aaa',$_POST["continent"]);
            $image = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            // i have to change the path here to be exactly where we want to add the image
            $folder = '../View/img/'.$image; 
            move_uploaded_file($tempname , $folder);

            // $image = $_POST['urlImage']; $id, $nom, $nombrePays, $image
            var_dump($image);
            $nom = $_POST["nom"];
            $nbrPays=$_POST["nbrPays"];

            $Continent = new Continent(null,$nom,$nbrPays,$image);
            var_dump($Continent->getNom(),$Continent->getNombrePays(),$Continent->getImage()
        
        
        );

            $ContinentController = new ContinentController();
            if ($ContinentController->create($Continent)) {
                header("Location:../View/Continent.php");
            } else {
                echo "something wint wrong in the create";
            }

        }


    }

