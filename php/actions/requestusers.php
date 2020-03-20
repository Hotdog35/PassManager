<?php
	include("php/class/Db.php");
	include("php/class/User.php");
	include("php/class/Session.php");

	$dbi = new Database();
	$db = $dbi->connect();


		User::getUsers($db);

?>