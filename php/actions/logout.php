<?php
include("..\class\Session.php");
	
	session_destroy();

	header("Location:..\..\login.php");

?>