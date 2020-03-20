<?php
include('../class/User.php');
include('../class/Db.php');



$db = new Database();

$login = $_GET['login'];
$name = $_GET['name'];
$lastName = $_GET['lastname'];
$pass = $_GET['pass'];
$dp =  $_GET['department'];



$db = $db->connect();

$msg = User::includeUser($db,$name,$lastName,$login,$pass,$dp);

header('Location: ../../login.php?msg='.$msg);


?>