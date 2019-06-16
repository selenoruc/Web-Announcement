<?php require ("config.php"); # Konfigurasyon dosyalası import ediliyor.
    if(isset($_SESSION['user']))
    {
        header("location:admin.php");
    }
    else{
        include("html/login.html");
    }
?>