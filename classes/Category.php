<?php

	include_once 'Session.php';
	include_once 'Database.php';
	include_once 'Format.php';

	class Category 
	{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function insertCat($data){

			$catName      = $this->fm->validation($data['catName']);
			$chk_category = $this->categoryCheck($catName);

			if ($catName == "") {
				$mes = "<span class='text-danger'>Field must not to be empty...!</span><br><br>";
				return $mes;
			}

			if ($chk_category == true) {
				$mes = "<span class='text-danger'>This Category already Exist...!</span><br><br>";
				return $mes;
			}


			$sql = "INSERT INTO tb_category (catName) VALUES(:catName)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindParam(':catName', $catName);
			$result = $query->execute();
			if ($result) {
				$mes = "<span class='text-success'>Insert Successfully...!</span><br><br>";
				return $mes;
			}else{
				$mes = "<span class='text-danger'>Failed ..! There has been problem inserting you details in Database</span><br><br>";
				return $mes;
			}

		}

		public function getAllCat(){

			$sql = "SELECT * FROM tb_category ORDER BY catId DESC";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$allcategory = $query->fetchAll();
			return $allcategory;

		}


		public function getCatById($catId){

			$sql = "SELECT * FROM tb_category WHERE catId = :catId LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':catId', $catId);
			$query->execute();
			$category = $query->fetchAll();
			return $category;

		}

		public function categoryCheck($catName){

			$sql = "SELECT catName FROM tb_category WHERE catName = :catName";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':catName', $catName);
			$query->execute();
			if ($query->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		}


		public function catUpdate($catName, $catId){

			$catName      = $this->fm->validation($catName);
			$chk_category = $this->categoryCheck($catName);

			if ($catName == "") {
				$mes = "<span class='text-danger'>Field must not to be empty...!</span><br><br>";
				return $mes;
			}

			if ($chk_category == true) {
				$mes = "<span class='text-danger'>This Category already Exist...!</span><br><br>";
				return $mes;
			}


			$sql = "UPDATE tb_category SET catName = :catName WHERE catId = :catId";
			$query = $this->db->pdo->prepare($sql);
			$query->bindParam(':catName', $catName);
			$query->bindParam(':catId', $catId);
			$result = $query->execute();


			if ($result) {
				$mes = "<span class='text-success'>Data Update Successfully...!</span><br><br>";
				header("Location: categorylist.php?mes=$mes");
			}else{
				$mes = "<span class='text-danger'>Failed ..!  Data not Updated..!</span><br><br>";
				header("Location: categorylist.php?mes=$mes");
			}

		}

		public function delCatById($id){
			$sql = "DELETE FROM tb_category WHERE catId = :catId LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':catId', $id);
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