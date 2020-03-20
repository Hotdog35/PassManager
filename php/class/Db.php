<?php
	
	class DataBase{

		private $host = "localhost";
		private $login = "root";
		private $pass = "";
		private $Db = "passManager"; 


		public function connect(){
			$sql = new mysqli($this->host, $this->login, $this->pass, $this->Db);
		
			if($sql->connect_error)
				echo "Falha de Conexão";
			else{
				return $sql;
			}
		}
	}
	


?>