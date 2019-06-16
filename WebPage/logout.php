<?php 
    include("./config.php");
    
    if(isset($_SESSION['user']))
    {
        echo $_SESSION['user']; 
        echo " hesabından çıkış yapılıyor... ";
        session_destroy();
        header("refresh:2;url=index.php");    
    }
    else{
        header("refresh:0;url=index.php");
    }    
?>