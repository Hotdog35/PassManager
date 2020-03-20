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
	User::alterRegister($db,$id,"LINK",$link);
	/*
	* Alterar  login
	*/
	User::alterRegister($db,$id,"LOGIN",$login);
	/*
	* Alterar  finalidade
	*/
	User::alterRegister($db,$id,"GOAL",$goal);
	/*
	* Alterar  Senha
	*/
	User::alterRegister($db,$id,"PASS",$pass);


	header('Location: ../../index.php');




?>