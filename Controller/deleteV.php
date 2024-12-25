<?php
    include "connexion.php";
    $id = $_GET['idCity'];
    $identifiant = $_GET['id'];
    $deleted = "DELETE from ville where id_ville=$id";
    $conn->query($deleted);

    header("Location: ville.php?id=$identifiant");
?>