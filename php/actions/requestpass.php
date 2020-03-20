<?php
	include("php/class/Db.php");
	include("php/class/User.php");
	include("php/class/Session.php");

	$dbi = new Database();
	$db = $dbi->connect();
	$db2 = $dbi->connect();

	if(isset($passDp)){
		User::getPassByDepartment($db,$_SESSION["dp"]);
	}else{

		User::getPassByUser($db,$_SESSION["id"]);
	}



?>