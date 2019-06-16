<?php
	try{
		$db = new PDO("mysql:host=localhost;dbname=duyurudb;charset=utf8", "root", "");
	}
	catch(PDOException $e){
		print $e->get_Message();
	}
	session_start();
?>