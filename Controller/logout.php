<?php
require_once "../Model/user.php";
session_start();
session_destroy();
header("Location:../index.php");
?>