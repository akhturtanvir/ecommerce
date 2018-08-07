<?php

	include_once 'Session.php';
	include_once 'Database.php';
	include_once 'Format.php';

	class Brand 
	{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function insertBrand($data){

			$brandName      = $this->fm->validation($data['brandName']);
			$chk_brand = $this->brandCheck($brandName);

			if ($brandName == "") {
				$mes = "<span class='text-danger'>Field must not to be empty...!</span><br><br>";
				return $mes;
			}

			if ($chk_brand == true) {
				$mes = "<span class='text-danger'>This Category already Exist...!</span><br><br>";
				return $mes;
			}


			$sql = "INSERT INTO tb_brand (brandName) VALUES(:brandName)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindParam(':brandName', $brandName);
			$result = $query->execute();
			if ($result) {
				$mes = "<span class='text-success'>Insert Successfully...!</span><br><br>";
				return $mes;
			}else{
				$mes = "<span class='text-danger'>Failed ..! There has been problem inserting you details in Database</span><br><br>";
				return $mes;
			}

		}

		public function getAllBrand(){

			$sql = "SELECT * FROM tb_brand ORDER BY brandId DESC";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$allbrand = $query->fetchAll();
			return $allbrand;

		}


		public function getBrandById($brandId){

			$sql = "SELECT * FROM tb_brand WHERE brandId = :brandId LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':brandId', $brandId);
			$query->execute();
			$brand = $query->fetchAll();
			return $brand;

		}

		public function brandCheck($brandName){

			$sql = "SELECT brandName FROM tb_brand WHERE brandName = :brandName";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':brandName', $brandName);
			$query->execute();
			if ($query->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		}


		public function BrandUpdate($brandName, $brandId){

			$brandName      = $this->fm->validation($brandName);
			$chk_brand = $this->brandCheck($brandName);

			if ($brandName == "") {
				$mes = "<span class='text-danger'>Field must not to be empty...!</span><br><br>";
				return $mes;
			}

			if ($chk_brand == true) {
				$mes = "<span class='text-danger'>This Category already Exist...!</span><br><br>";
				return $mes;
			}


			$sql = "UPDATE tb_brand SET brandName = :brandName WHERE brandId = :brandId";
			$query = $this->db->pdo->prepare($sql);
			$query->bindParam(':brandName', $brandName);
			$query->bindParam(':brandId', $brandId);
			$result = $query->execute();


			if ($result) {
				$mes = "<span class='text-success'>Data Update Successfully...!</span><br><br>";
				header("Location: brandlist.php?mes=$mes");
			}else{
				$mes = "<span class='text-danger'>Failed ..!  Data not Updated..!</span><br><br>";
				header("Location: brandlist.php?mes=$mes");
			}

		}

		public function delBrandById($id){
			$sql = "DELETE FROM tb_brand WHERE brandId = :brandId LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':brandId', $id);
			$result = $query->execute();

			if ($result) {
				$mes = "<span class='text-success'>Delete Successfully.. !</span><br><br>";
				return $mes;
			}else{
				$mes = "<span class='text-danger'>Failed to Delete Data.. !</span><br><br>";
				return $mes;
			}


		}
	}

?>