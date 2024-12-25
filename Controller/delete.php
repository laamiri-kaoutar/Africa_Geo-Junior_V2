<?php
    include 'connexion.php';
    $id=$_GET['id'];
    $delted = " delete from pays where id_pays = $id ";
    $conn->query($delted);

    header("Location: Payss.php");


?>