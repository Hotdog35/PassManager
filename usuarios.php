<?php
	 include("php/class/Session.php"); 
	 if(!isset($_SESSION["id"])){
?>
		<script type="text/javascript">

			window.location.href = "login.php";
		</script>
<?php	
	}
	$diretorio = basename(__FILE__);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1, hsrink-to-fit=no">
	<title>Template master</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap4.3/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap4.3/dashboard.css">
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Grenze&display=swap');

		
		.modal-row{
			background: linear-gradient(124.26deg,#808080 24%, #f5f2d0 100%);
			width: 70%;
			font-family: 'Grenze', serif;
		}

		.modal-row .modal-footer a.btn{
			margin: auto;
			background-color: #808080;
		}

		.modal-row .modal-footer a.btn:hover{
			margin: auto;
			border: solid 0.5px black;
			background-color: #32cd32;
		}
		
		}.modal-row .modal-header h5{
			margin-left: auto;
			color: white;
			font-family: 'Grenze', serif;
		}

		.form-modal input{
			width: 80%;
			color: red;
			margin-left: 15%;
		}	
		.form-modal label{
			font-weight: bolder;
			color: white;
			margin-left: 25%;
		}
		header
		{
			height: auto;
			overflow: hidden;
				
		}
		.background-color
		{
			background:  linear-gradient(188.26deg,#F0Ad31 25%, #000000 100%);
			color: #87CEFA;
			font-family: 'Grenze', serif;
		}
		
		navbar-fixed-left{
			width: 140px;
			position: fixed;
			border-radius:0;
			height:100%;
		}

		.nav-fed-left .navbar-nav>li{
			float:none; /*Cancel default li float: leaft */;
			width: 139px;
		}
		.navbar-fixed-left+.container{
			padding-left:160px;
		}
		/*On using dropdown menu (To right shift popuped)*/
		.navbar-fixed-left .navbar-nav> li> .dropdown-menu{
			margin-top:50px;
			margin-left:140px;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Home</a>
	<ul class="navbar-nav px-3">
	  	<li class="nav-item">
	    	<buttn type="button" class="btn bg-dark nav-link" onclick="logout()">Logout</button>
	  	</li>
	</ul>
</nav>

<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-md-block bg-light sidebar">
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="index.php">
						<span data-feather="home"></span>
						Home<span class="sr-ony"></span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="dp.php">
						<span data-feather="briefcase"></span>
						Senhas por Departamento<span class="sr-ony"></span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="usuarios.php">
						<span data-feather="user"></span>
						Usuarios Cadastrados<span class="sr-ony"></span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    	<h1 class="h2">Bem vindo <?php echo $_SESSION["login"] ?> </h1>
       		<div class="btn-toolbar mb-2 mb-md-0">
         		<div class="btn-group mr-2">
         		</div>
         		<button id="time" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            		<span data-feather="calendar"></span>
            		00:00:00
          		</button>
        	</div>
      </div>
<div class="conaitner-fluid">
	<div class="row">
		<div class="col">
			<h2>Senhas</h2>
		</div>
			<img src="icon/png/person-6x.png">
			<h3>Relação de Usuarios</h3>
		</div>
	</div>
</div>


<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
              <th><span data-feather="briefcase"></span>
              </th>
              <th>Departamento</th>
              <th>Nome</th>
              <th>Login</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody class="table-inverse">
        	<tr id="areaRegister" class="collapse">
        		<td class="text-danger font-weight-bold" id="alterId"></td>
        	  	<td id="linkArea"></td>
              	<td id="loginArea"></td>
              	<td id="passArea"></td>
              	<td id="goalArea"></td>
              	<td id=""><a onclick="usuario.saveEntry()" class="btn btn-success btn-sm" href="#">Salvar</a><td>
              	<td id=""><a onclick="usuario.cancelEntry()" class="btn btn-danger btn-sm" href="#">Cancelar</a><td>
          	</tr>
          	<tr id="alterRegister" class="collapse">
        		<td class="text-danger font-weight-bold">!</td>
        	  	<td id="alterLinkArea"></td>
              	<td id="alterLoginArea"></td>
              	<td id="alterPassArea"></td>
              	<td id="alterGoalArea"></td>
              	<td id=""><a onclick="usuario.alterEntry()" class="btn btn-success btn-sm" href="#">Alterar</a><td>
              	<td id=""><a onclick="usuario.cancelEntry()" class="btn btn-danger btn-sm" href="#">Cancelar</a><td>
          	</tr>
<?php require_once("php/actions/requestusers.php");?>
        </tbody>
    </table>
    	<div class='col-md-12'>
			<ul class='pagination'>
				<nav aria-label='Page navigation example'>
					<ul class='pagination'>
<?php require_once("php/actions/pagination.php"); ?>
					</ul>
				</nav>
			</ul>
		</div>
</div>

<!-- MODAL, AQUI EM BAIXO FICAM OS MODAIS -->
<div class="container-fluid">
	<div class="row modal-row">				
		<div class="modal fade" id="register">
			<div class="modal-dialog modal-lg"  role ="document">
				<div class="modal-content modal-row">
					<div class="modal-header">
						<h5 class="modal-title">Cadastro de Senha</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="fechar">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-12">
								<form class="form-modal" method="post">
									<div class="form-row">
										<div class="col-md-6 form-group">
											<label for="linkValue" class="col-form-label">Link:</label>
											<input type="text" class="form-control" id="linkValue"  placeholder="Digite o endereço do Site" required>
										</div>
										<div class="col-md-6 form-group">
											<label for="login" class="col-form-label">Login:</label>
											<input type="text" class="form-control" id="loginValue" placeholder="Digite seu Login do site" required>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6 form-group">
											<label for="goalValue" class="col-form-label">Finalidade:</label>
											<input type="text" name="goalValue" placeholder="Ex:gmglobalconnect" class="form-control" id="goalValue" required>
										</div>
										<div class="col-md-6 form-group">
											<label for="estado" class="col-form-label">Senha:</label>
											<input type="text" class="form-control" id="passValue"  placeholder="Digite sua Senha" required>
										</div>
									</div>	
									<div class="modal-footer">
										<a onclick="usuario.putValues('#register')"  class="btn">Cadastrar</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- ALTERAR CADASTRO -->

<div style="position: absolute;" class="container-fluid">
      <div class="row modal-row">       
        <div class="modal fade" id="alter">
          <div class="modal-dialog modal-lg"  role ="document">
            <div class="modal-content modal-row">
              <div class="modal-header">
                <h5 class="modal-title">Cadastro de Usuarios</h5>
                <button class="bg-secondary close" type="button" data-dismiss="modal" aria-label="fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <form class="form-modal"  method="post">
                      <div class="form-row">
                        <div class="col-md-6 form-group">
                          <label for="name" class="col-form-label">Nome:</label>
                          <input type="text" class="form-control" id="name" name="name"  placeholder="Digite seu nome" required>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="name" class="col-form-label">SobreNome:</label>
                          <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Digite o Sobre Nome" required>
                        </div>
                      </div>
                      <div class="form-row">
	                        <div class="col-md-12 form-group">
	                          <label for="dp" class="col-form-label">Departamento:</label>
	                          <select name="dp" id="dp" class="form-control">
	                            <option value='3'>Administracao de Veiculos</option>
	                            <option value='2'>Venda de Veiculos Novos</option>
	                            <option value='7'>CRM</option>
	                            <option value='6'>Pecas</option>
	                            <option value='5'>Financeiro</option>
	                          </select>
	                        </div>
	                    </div>
                        <div class="form-row">
	                        <div class="col-md-6 form-group">
	                          <label  for="login" class="col-form-label">Login:</label>
	                          <input type="email"  class="form-control" id="login" name="login" placeholder="Escolha um login" required><p class="font-weight-bolder"></p>
	                        </div>
	                        <div class="col-md-6 form-group">
	                          <label for="pass" class="col-form-label">Senha:</label>
	                          <input type="text" class="form-control" name="pass" id="pass"  placeholder="Digite sua Senha" required>
	                        </div>
                      </div>  
                      <div class="modal-footer">
                        <a onclick="usuario.alterPutValues('#alter')"  class="bg-light btn btn-light">Cadastrar</a>
                        <button class="collapse" ></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  



	<script type="text/javascript" src="js/gmc/class/ControlPass.js"></script>
	<script type="text/javascript" src="js/gmc/user.js"></script>
	<script type="text/javascript" src="js/jquery3.3.1/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery3.3.1/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap4.3/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/bootstrap4.3/feather.js"></script>
	<script type="text/javascript" src="js/bootstrap4.3/chart.min.js"></script>
	<script type="text/javascript" src="js/bootstrap4.3/dashboard.js"></script>

<?php ?>
	<script type="text/javascript">
		function logout(){
			
			window.location.href="php/actions/logout.php"
		}
	</script>
</body>
</html>