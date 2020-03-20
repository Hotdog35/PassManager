<?php
	include("../class/Db.php");
	include ("../class/User.php");

	$database = new DataBase();
	$db= $database->connect();

	$id = $_GET["id"];
	$link= $_GET["link"];
	$login= $_GET["login"];
	$goal= $_GET["goal"];
	$pass= $_GET["pass"];


	/*
	* Alterar  Link
	*/
	User::alterRegisterdp($db,$id,"LINK",$link);
	/*
	* Alterar  login
	*/
	User::alterRegisterdp($db,$id,"LOGIN",$login);
	/*
	* Alterar  finalidade
	*/
	User::alterRegisterdp($db,$id,"GOAL",$goal);
	/*
	* Alterar  Senha
	*/
	User::alterRegisterdp($db,$id,"PASS",$pass);


	header('Location: http://10.2.1.32/gmc2/dp.php');




?>