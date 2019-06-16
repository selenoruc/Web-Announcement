<?php
    include("config.php");
    if(!isset($_SESSION['user']))
    {
        header("location:login.php");
    }
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if($username == '' || $password == '')
    {
        header("location:login.php");
    }
    else
    {
        /*Gelen kullanıcı adı ve şifre değerleri sorgu ile veritabanında karşılaştırılıyor.*/
        $query = $db->query("SELECT * FROM user WHERE mail='$username' AND password='$password' ", PDO::FETCH_ASSOC);
        if($query->rowCount()) 		/*Eğer eşleşme varsa.*/
        {
            $_SESSION['user'] = $username;
            
            $info = $query->fetch();
            $_SESSION['user_id'] = $info["u_id"];
            $_SESSION['user_name'] = $info["name"];
            $_SESSION['userlogin'] = true;
            header("location:admin.php"); /*Giriş başarılıysa admin sayfasına yönlendiriliyor.*/
        }
        else 	/*Eğer eşleşme yoksa*/
        {
            echo "Kullanıcı adı veya şifre hatalı";
            header("refresh:2; url=login.php");  /*Eğer eşleşme yoksa giriş sayfasına geri yönlendiriliyor.*/
        }
    }
?>