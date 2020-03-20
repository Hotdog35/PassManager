<?php
include ("../class/Db.php");
require ("../class/User.php");

$db = new DataBase();
$db = $db->connect();


$login =$_POST["login"];
$pass = $_POST["password"];



	$msg =User::validUser($db,$login,$pass);




echo "<script>window.location.href='http://10.2.1.32/gmc2/login.php?msg=$msg'</script>";



?>