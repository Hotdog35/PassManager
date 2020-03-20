<?php





	$dbr = $dbi->connect();
	$dbr2 = $dbi->connect();
	
	if($diretorio == "dp.php")
		User::pagination($dbr2,$dbr,$_SESSION["dp"],$diretorio);
	else{
		User::paginationUser($dbr,$dbr2);
	}

?>