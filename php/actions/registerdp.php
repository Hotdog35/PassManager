<?php
	include("../class/Db.php");
	include("../class/Session.php");

	$database = new DataBase();
	$db= $database->connect();



	$link = $_GET["link"];
	$login = $_GET["login"];
	$pass = $_GET["pass"];
	$goal = $_GET["goal"];
	//$usuario = $_SESSION["id"];

	$usuario = $_SESSION["id"];
	$departament = $_SESSION["dp"];


		$include = "INSERT INTO passRegisterdp (`link`,`login`,`pass`,`goal`,`dp_user`) VALUES
										 ('$link','$login','$pass','$goal','$departament')";
		$db->query($include) or die ($db->error);

	
	

	header('Location: http://10.2.1.32/gmc2/dp.php');

?>