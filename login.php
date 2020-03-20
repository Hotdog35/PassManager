
<?php 
include("php/class/Session.php"); 
   $meu_ip = $_SERVER["REMOTE_ADDR"];

?>
<!Doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon/icon.ico">
    <link rel="stylesheet" type="text/css" href="css/modal/modal.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">
    <title>Bem Vindo</title>
    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap3.3.5/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap3.3.5/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Estilos customizados para esse template -->
    <link href="css/signin/signin.css" rel="stylesheet">

    <style>
      .inputWithIcon input[type=text]{
        
      }

      .inputWithIcon{
        position: relative;
      }

      .inputWithIcon i{
        position:absolute;
        right:0;
        top:8px;
        padding:2px 2px;
        transition: .3s;
      }

      .inputWithIcon input[type=text]:focus +i{
        padding-left:40px;
      }
    </style>
  </head>
  <body  <?php if(isset($_SESSION["id"]) && isset($_GET["msg"]) || isset($_GET["msg"])){ ?> onload="loga()" <?php } ?> class="text-center">
    <form class="form-signin" action="php/actions/login.php" method="post">
      <img class="mb-4" src="icon/icon.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Efetue o login  </h1>
      <div class="inputWithIcon">
        <label for="inputEmail" class="sr-only">Seu id</label>
        <input type="text" name="login" id="inputEmail" class="form-control" placeholder="Sua id" required >
        <abbr class="initialism" title="Ultilize seu email para logar"><i class="badge-warning small fa fa-info-circle" aria-hidden="true"></i></abbr>
      </div>
      <div class="inputWithIcon">
         <label for="inputPassword" class="sr-only">Senha</label>
         <i class="badge-warning small fa fa-info-circle" aria-hidden="true"></i>
      </div>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">     
        <label>
           <input type="checkbox" value="remember-me"> Lembrar de mim
        </label>      
      </div>
      <button class="col-2 btn btn-lg btn-primary" type="submit">Login</button>
      <?php if($meu_ip == '10.2.1.32' || $meu_ip == '10.2.1.33'){?>
      <a class="col-2 btn btn-lg btn-success"  data-toggle="modal" data-target="#register" >Registrar</a>
     <?php }?>
      <p class="mt-5 mb-3 text-muted">&copy;2019</p>
    </form>

<!-----------------------MODAL--DE--CADASTRO--DE--USUARIOS--CADASTRO--DE--USUARIOS-------------------------------->
    
    <div style="position: absolute;" class="container-fluid">
      <div class="row modal-row">       
        <div class="modal fade" id="register">
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
                        <div class="col-md-6 form-group">
                          <label  for="login" class="col-form-label">Login:</label>
                          <input type="email"  class="form-control" id="login" name="login" placeholder="Escolha um login" required><p class="font-weight-bolder">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 form-group">
                          <label for="dp" class="col-form-label">Departamento:</label>
                          <select name="dp" id="dp" class="form-control">
                            <option value='3'>Administracao de Veiculos</option>
                            <option value='2'>Venda de Veiculos Novos</option>
                            <option value='7'>CRM</option>
                            <option value='6'>Pecas</option>
                            <option value='5'>Financeiro</option>
                          </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="pass" class="col-form-label">Senha:</label>
                          <input type="text" class="form-control" name="pass" id="pass"  placeholder="Digite sua Senha" required>
                        </div>
                      </div>  
                      <div class="modal-footer">
                        <a onclick="usuario.userRegister();"  class="bg-light btn btn-light">Cadastrar</a>
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
  </body>

<!----------------------------------------------------------------------------------------------------------------->
  <script type="text/javascript" src="js/gmc/class/ControlPass.js"></script>
  <script type="text/javascript" src="js/gmc/user.js"></script>
  <script src="js/bootbox/jquery.min.js"></script>
  <script src="js/bootstrap3.3.5/bootstrap.min.js"></script>
  <script src="js/bootbox/bootbox.min.js"></script>
<?php if(isset($_SESSION["id"]) && isset($_GET["msg"]))
    { 

  ?>
    <script type="text/javascript">
      function loga(){

        bootbox.alert("<?php echo isset($_GET["msg"]) ? $_GET["msg"] : 'oi'; ?>");
  
        window.setInterval(()=>{

           window.location.href = "http://10.2.1.32/gmc2/index.php";
        },1000)


      }    
    </script>
<?php 
    
    }elseif (isset($_SESSION["id"])) {
?> 

   <script type="text/javascript">
        function loga(){
          bootbox.alert("<?php echo isset($_GET["msg"]) ? $_GET["msg"] : 'oi'; ?>");
           window.location.href = "http://10.2.1.32/gmc2/index.php";
        }
   </script>

<?php
    }else{
?>
     <script type="text/javascript">
        function loga(){
          bootbox.alert("<?php echo isset($_GET["msg"]) ? $_GET["msg"] : 'oi'; ?>");
        }
     </script>
<?php     
    }
?>

</html>

