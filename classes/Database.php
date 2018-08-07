<?php 


	class Database
	{
		private $hostdb = "localhost";
		private $userdb = "root";
		private $passdb = "";
		private $namedb = "db_ecommerce";
		public $pdo;
		
		function __construct()
		{
			if(!isset($this->pdo)){
				try{
					if (empty($this->hostdb) || empty($this->userdb) || empty($this->namedb)) {
						if (empty($this->hostdb)) {
							throw new Exception("Host Name is required", 1);

						}
						if (empty($this->userdb)) {
							throw new Exception("DB User is required", 1);

						}
						if (empty($this->namedb)) {
							throw new Exception("Database Name is required", 1);

						}
						
					}
					
					$dsn = "mysql:host=$this->hostdb;dbname=$this->namedb;charset=utf8";
					// echo $dsn;

					$opt = array(
			            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
			        );

					$link = new PDO($dsn, $this->userdb, $this->passdb, $opt);
					$this->pdo = $link;
					// echo "Database connect successfully....! :)<br>";

				}catch(Exception $e){
					die("Fail to connect with Database: " .$e->getMessage());
					// print_r($e);

				}

			}

		}
	}









 ?>