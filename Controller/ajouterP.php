<?php
    require_once 'PaysController.php';
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {

        if (isset($_GET['id'])) {

                $id = $_POST['id'];
                $image = $_FILES['urlImage']['name'];
                $tempname = $_FILES['urlImage']['tmp_name'];
                // i have to change the path here to be exactly where we want to add the image
                $folder = '../View/img/'.$image; 
                move_uploaded_file($tempname , $folder);
                $idenc=$_GET['idC'];
                $nom = $_POST["nom"];
                var_dump('nom', $nom);
                $continent=$_POST["continent"];
                $langues =$_POST["langues"];
                $population =$_POST["population"];
    
                $Pays = new Pays($id, $nom, $population, $langues, $continent, $image);
                var_dump($Pays->getNom() , $Pays->getPopulation(),$Pays->getLangues() , $Pays->getContinent() , $Pays->getImage());

                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";

    
                $paysController = new PaysController();
                if ($paysController->update($Pays)) {
                    var_dump($Pays);
                    header("Location:../View/Payss.php?idC=$idenc");
                }  {
                    echo "something wint wrong in the update";
                }

            
            
            

        }else{ 

            // var_dump('aaa',$_POST["continent"]);
            $image = $_FILES['urlImage']['name'];
            $tempname = $_FILES['urlImage']['tmp_name'];
            // i have to change the path here to be exactly where we want to add the image
            $folder = '../View/img/'.$image; 
            move_uploaded_file($tempname , $folder);

            // $image = $_POST['urlImage'];
            var_dump($image);
            $idenc=$_GET['idC'];


            $nom = $_POST["nom"];
            var_dump('nom', $nom);
            $continent=$_POST["continent"];
            $langues =$_POST["langues"];
            $population =$_POST["population"];

            $Pays = new Pays(null, $nom, $population, $langues, $continent, $image);
            var_dump($Pays->getNom() , $Pays->getPopulation(),$Pays->getLangues() , $Pays->getContinent() , $Pays->getImage());

            $paysController = new PaysController();
            if ($paysController->create($Pays)) {
                header("Location:../View/Payss.php?idC=$idenc");
            } else {
                echo "something wint wrong in the create";
            }

        }
    }
?>