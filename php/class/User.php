<?php

	Class User{
			
			private $user;
			private $pass;
			private $department;
			private $name;
			private $secondName;





			public  function selectUser($database){

				 $result = $database->query("SELECT * FROM USER");

				  return $result;
			}

			public static function userRegisterSelect($database,$login){

					$select = "SELECT * FROM USER WHERE `USERID` ='".$login."'";

					$database = $database->query($select);

					return $database->fetch_array();


			}


			public static function includeUser($database,$usuario,$lastName,$login,$pass,$dp){

				$includeLogin = "INSERT INTO USER (`userId`,`name`,`lastName`,`departament`,`pass`)
											 VALUES('$login','$usuario','$lastName','$dp',md5('$pass'))";

				$user = User::userRegisterSelect($database,$login);

				if($usuario== "" || $lastName == "" || $login == "" || $pass == "" || $dp == ""){

						return "Impossivel realizar o cadastro, por conta de campo em branco, por favor verifique se todos os campos foram preenchidos!";

				}else if($user["userId"] == $login){

					return "Usuario ja existe no sistema";
				}else{
						$database->query($includeLogin) or die($database->error);

						return "Cadastro realizado com sucesso!";
				}


			}



			public static function alterRegister($database,$id,$area,$value){

				$insert = "UPDATE PASSREGISTER SET `$area` = '$value' WHERE `ID` = '$id'";

				$database->query($insert) or die($database->error);
			}

			public static function alterRegisterdp($database,$id,$area,$value){

				$insert = "UPDATE PASSREGISTERDP SET `$area` = '$value' WHERE `ID` = '$id'";

				$database->query($insert) or die($database->error);
			}


			public function deleteRegister($database,$table,$id){

				$drop = "DELETE FROM `".$table."` WHERE `ID` ='".$id."'";
				$database->query($drop);

			}



			public static function select($value,$table,$table_join,$table_id,$table_join_id,$condiction){
				
				$select = "SELECT * FROM $table AS P INNER JOIN $table_join AS U 
									 ON P.$table_id = U.$table_join_id
									 WHERE U.$table_join_id $condiction $value";

				return $select;
			}

			public static function selectonLimit($value,$table,$table_join,$table_id,$table_join_id,$limit1,$limit2,$condiction){
				
				$select = "SELECT * FROM $table AS P INNER JOIN $table_join AS U 
									 ON P.$table_id = U.$table_join_id
									 WHERE  U.$table_join_id $condiction $value
									 LIMIT $limit1,$limit2";
				return $select;
			}




			public static function selectUsers($limit1,$limit2){
				$select = "SELECT * FROM USER INNER JOIN  DEPARTAMENT 
							ON USER.DEPARTAMENT = DEPARTAMENT.ID LIMIT $limit1,$limit2";

				return $select;
			}

			public static function selectPassByUser($database,$user){

				$result = $database->query(User::select($user,"PASSREGISTER","USER","ID_USER","ID","="));

				return $result;
			}

			public static function SelectUserRegister($database){

				$result = $database->query(User::select(1,"USER","DEPARTAMENT","DEPARTAMENT","ID",">"));

				return $result;
			}






			public static function validUser($database,$user,$pass){

				$result = User::selectUser($database);
					
				while($value = $result->fetch_array()){
					
					if($value["userId"] == $user){
						
						if($value["pass"] == md5($pass)){

							User::Session($value["userId"],$value["id"],$value["departament"],$_SERVER["REMOTE_ADDR"]);
							return "logado com sucesso!";
						}else{
							
							return "senha invalida!";
						}
						
					}
				}

				return($user."<br>"."Usuario nao existe na base de dados, pro favor tente novamente, com um usuario valido");
				
			}







			public static function paginationUser($database,$database2){

				$pag = isset($_GET["pag"]) ? $_GET["pag"] : 1;
				$database = User::SelectUserRegister($database);
				$select = User::select(0,"USER","DEPARTAMENT","DEPARTAMENT","ID","!=");
				$select = $database2->query($select);
				$cont_atual = $database;

				

				//paginação

				$qtd_rows = mysqli_num_rows($select);


				$prPag = 10;
				$pagAtual = ceil($qtd_rows/$prPag);

				$pagInicial = ($prPag * $pag) - $prPag;

				$select = User::selectonLimit(0,"USER","DEPARTAMENT","DEPARTAMENT","ID",$pagInicial,$prPag,"!=");

								

				
				$database  = $database2->query($select);
						  
				$valor = mysqli_num_rows($database);
				$cont = 0;

				//echo $pagAtual;

				if($valor>0) {
					 for($i=1; $i<=$pagAtual; $i++){
							echo "<li class='page-item'>
							        <a class='page-link' href='usuarios.php?pag=".$i."'>".$i."</a>
							      </li>";

						}
					}else{   
							for($i=0; $i<$pagAtual; $i++){
								echo "<li class='page-item'>
							    	    <a class='page-link' href='usuarios.php?pag=".$i.">".$i."</a>
							   		  </li>";
						}
					}

			}

			public static function pagination($database2,$database,$value,$pagin){

				$pag = isset($_GET["pag"]) ? $_GET["pag"] : 1;
				$database = User::selectPassByUser($database,$value);
				$select = User::select($value,"PASSREGISTERDP","DEPARTAMENT","DP_USER","ID","=");
				$select = $database2->query($select);
				$cont_atual = $database;

				 //paginação
				$qtd_rows =  mysqli_num_rows($select);

						  //echo $qtd_rows;
				$prPag = 10;
			    $pagAtual = ceil($qtd_rows/$prPag);
				$pagInicial = ($prPag * $pag) - $prPag;
				

				$select = User::selectonLimit($value,"PASSREGISTERDP","DEPARTAMENT","DP_USER","ID",$pagInicial,$prPag,"=");

				$database  = $database2->query($select);
						  
				$valor = mysqli_num_rows($database);
				$cont = 0;

				if($valor>0) {
					 for($i=1; $i<=$pagAtual; $i++){
							echo "<li class='page-item'>
							        <a class='page-link' href='".$pagin."?pag=".$i."'>".$i."</a>
							      </li>";
						}
					}else{   
							for($i=0; $i<$pagAtual; $i++){
								echo "<li class='page-item'>
							    	    <a class='page-link' href='".$pagin."?pag=".$i.">".$i."</a>
							   		  </li>";
							}
						}
			}



			public static function getPassByDepartment($database,$dp){

					$pag = isset($_GET["pag"]) ? $_GET["pag"] : 1;
					$prPag = 10;
					$pagInicial = ($prPag * $pag) - $prPag;
					$database = $database->query(User::selectOnLimit($dp,"PASSREGISTERDP","DEPARTAMENT","DP_USER","ID",$pagInicial,$prPag,"="));
					$cont = 0;
					while($getp = $database->fetch_array()){
						$cont++;
					echo"
						<tr>
							<form method='get' id='Alt".$cont."'>
								<td id='alterId".$cont."' class='collapse'>".$getp[0]."</td>
								<td>".$cont."</td>
				        	  	<td ><a id='altLink".$cont."' target='blank' href='".$getp["link"]."'>".$getp["link"]."</a></td>
				              	<td id='altLog".$cont."'>".$getp["login"]."</td>
				              	<td id='altPass".$cont."'>".$getp[3]."</td>
				              	<td id='altGoal".$cont."'>".$getp["goal"]."</td>
				              	<td><a class='btn btn-warning btn-sm' onclick='usuario.alterPut(".$cont.",1)' data-toggle='modal' data-target='#alter'>Alterar</a></td>
				              	<td><a class='btn btn-danger btn-sm' href='php/actions/deletedp.php?id=".$getp[0]."'>Excluir</a><td>
       						</form>
      					</tr>
						";							
					}
			}

			public static function getUsers($database){
					$pag = isset($_GET["pag"]) ? $_GET["pag"] : 1;
					$prPag = 10;
					$pagInicial = ($prPag * $pag) - $prPag;
					$database = $database->query(User::selectOnLimit(0,"USER","DEPARTAMENT","DEPARTAMENT","ID",$pagInicial,$prPag,'!='));
					$cont = 0;
					while($getp = $database->fetch_array()){
						$cont++;
					echo"
						<tr>
							<form method='get' id='Alt".$cont."'>
								<td id='alterId".$cont."' class='collapse'>".$getp[0]."</td>
								<td>".$cont."</td>
								<td id='altDp".$cont."'>".$getp[7]."</td>
				              	<td id='altName".$cont."'>".$getp[2]."</td>
				              	<td id='altId".$cont."'>".$getp["userId"]."</td>
				              	<td><a class='btn btn-warning btn-sm' onclick='usuario.alterPut(".$cont.")' data-toggle='modal' data-target='#alter'>Alterar</a></td>
				              	<td><a class='btn btn-danger btn-sm' href='php/actions/deletedp.php?id=".$getp[0]."'>Excluir</a><td>
       						</form>
      					</tr>
						";							
					}
			}







			public static function getPassByUser($database,$user){

					$pag = isset($_GET["pag"]) ? $_GET["pag"] : 1;
					$prPag = 15;
					$pagInicial = ($prPag * $pag) - $prPag;
					$database = $database->query(User::selectonLimit($user,"PASSREGISTER","USER","ID_USER","ID",$pagInicial,$prPag));
					$cont = 0;
					while($getp = $database->fetch_array()){
						$cont++;
					echo"
						<tr>
							<form method='get' id='Alt".$cont."'>
								<td id='alterId".$cont."' class='collapse'>".$getp[0]."</td>
								<td>".$cont."</td>
				        	  	<td ><a id='altLink".$cont."' target='blank' href='".$getp["link"]."'>".$getp["link"]."</a></td>
				              	<td id='altLog".$cont."'>".$getp["login"]."</td>
				              	<td id='altPass".$cont."'>".$getp[3]."</td>
				              	<td id='altGoal".$cont."'>".$getp["goal"]."</td>
				              	<td><a class='btn btn-warning btn-sm' onclick='usuario.alterPut(".$cont.")' data-toggle='modal' data-target='#alter'>Alterar</a></td>
				              	<td><a class='btn btn-danger btn-sm' href='php/actions/delete.php?id=".$getp[0]."'>Excluir</a><td>
       						</form>
      					</tr>
						";							
					}
			}


			private  function Session($user,$id,$dp,$ip){

					session_start();
					$_SESSION["id"] = $id;
					$_SESSION["login"] = $user;
					$_SESSION["dp"] = $dp;
					$_SESSION["meu_ip"] = $ip;

			}


	}


?>