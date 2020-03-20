<?php
	include("../class/Db.php");
	include ("../class/User.php");

	$database = new DataBase();
	$db= $database->connect();

	User::deleteRegister($db,"PASSREGISTER",$_GET["id"]);

	header('Location: http://10.2.1.32/gmc2');


?>
