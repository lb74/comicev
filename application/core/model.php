<?php
	class Model
	{
		private $conn;
		private $host = "localhost";
		private $user = "comicev";
		private $pass = "@matkhau12";
		private $name_database = "comicev";
		function __construct(){
			$this->conn = mysql_connect($this->host, $this->user, $this->pass);
			if (!$this->conn) {
				require("application/controllers/dberror.php");
				return;
			}
			else{
				mysql_select_db($this->name_database);
			}
		}
		function ExeQuery($query){
			$result = mysql_query($query, $this->conn);
			$obj = array();
			if ($result){
				if (!mysql_num_rows($result))
				{
					return 0;
				}
				else{
					while($data = mysql_fetch_assoc($result)){
						$obj[] = $data;
					}
					return $obj;
				}
			}
			else
				return 0;
		}
		function disconnect(){
			mysql_close($this->conn);
		}
	}
	?>