<?php
	include("../Class/Bd.php");
	include("Class/Impressora.php");
	
	$data = getdate();
	$pag = isset($_GET["pag"]) ? $_GET["pag"] : 1;
	
	$impressora = new Impressora();
	$bd = new Bd();
	

	
	$bd = $bd->connect();
	if(!isset($_POST["pesquisa"]))
	{
		$select = "SELECT * FROM impressora AS i INNER JOIN historico AS h
					ON i.ip = h.IMPRESSORA WHERE h.DIA_TROCA >='".$data["year"]."-".$data["mon"]."-01' AND  h.DIA_TROCA <= '".$data["year"]."-".$data["mon"]."-31' order by DIA_TROCA";
	}else{

						$d_dia = substr(strrchr($_POST["pesquisa"],"-"),1);
						$d_mes = substr(substr(strchr($_POST["pesquisa"],"-"),1),0,-3);
						$d_ano = rtrim($_POST["pesquisa"],strchr($_POST["pesquisa"],"-"));
						$d_dia = $d_ano."-".$d_mes."-"."31";
						
						$data = $_POST["pesquisa"];
						

		$select = "SELECT * FROM impressora AS i INNER JOIN historico AS h
					ON i.ip = h.IMPRESSORA WHERE h.DIA_TROCA >='".$_POST["pesquisa"]."' AND  h.DIA_TROCA <= '$d_dia' order by DIA_TROCA";
	}
	$banco = $bd->query($select) or die($banco->error);
	
				
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  	<meta name="viewport" content="width-device-width, initial-scale = 1, shrinx-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css"> </head>

<body>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<a href="#pedido" aria-expanded="false" aria-controls="#pedido" data-toggle="collapse" class="btn btn-secondary">Deseja outra data?</a>
			</div>
		</div>
	</div>


	<form action="mensal.php" method="post" class="form-group col-6 collapse" id="pedido" name="pedido">
		<div class="form-row">
			<div class="col-6">
				<label class="form-control-label" for="pesquisa">
					Insira a data
			</div>
			<div class="col-10">
				</label><input class="form-control" type="date" id="pesquisa"  name="pesquisa">
			</div>
			<div class="col-2">
				<input class="btn btn-secondary" type="submit" value="pesquisar">
			</div>
		</div>
	</form>
	<div class="container">
		<div class="row">
			<div class="col">
				<table class="table">
					<tr>
						<td scope="row">IP</td>
						<td scope="row">Departamento</td>
						<td scope="row">Num de Paginas</td>
						<td scope="row">Mes</td>
					</tr>
<?php 		while($select = $banco->fetch_array())
				{
						$data = $select["DIA_TROCA"];
						$dia = substr(strrchr($data,"-"),1);
						$mes = substr(substr(strchr($data,"-"),1),0,-3);
						$ano = strrev(substr(strrchr(strrev($data),"-"),1));
						$dia = $dia."/".$mes."/".$ano;
						
					
				?>
					<tr>
							
							<td scope="row"><?php echo $select["IP"]; ?></td>
							<td scope="row"><?php echo $select["DP"];?></td>
							<td scope="row"><?php echo $select["CONT_PAG"];?></td>
							<td scope="row"><?php echo $dia;?></td>
					<tr>
<?php			}?>

				</table>
			</div>
		</div>
	</div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>