<?php

	include_once 'Session.php';
	include_once 'Database.php';
	include_once 'Format.php';

	class Product
	{

		private $db;
		private $fm;
		
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function insertProduct($data, $file){

			$productName = $this->fm->validation($data['productName']);
			$catId = $data['catId'];
			$brandId = $data['brandId'];
			$body = $data['body'];
			$price = $data['price'];
			$type = $data['type'];
			
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		    $uploaded_image = "images/productImages/" . $unique_image;

		    if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $file_name == "" || $type == "") {
				$mes = "<span class='text-danger'>Field must not to be empty...!</span><br><br>";
				return $mes;
		    }elseif ($file_size >1048567) {
				$mes = "<span class='text-danger'>Image Size should be less then 1MB...!</span><br><br>";
				return $mes;
		    } elseif (in_array($file_ext, $permited) === false) {
				$mes = "<span class='text-danger'>You can upload only " . implode(', ', $permited) . " types of file</span><br><br>";
				return $mes;
		    } else{

		    	
			    move_uploaded_file($file_temp, $uploaded_image);
				$sql = "INSERT INTO tb_product (productName, catId, brandId, body, price, image, type) VALUES(:productName, :catId, :brandId, :body, :price, :image, :type)";
				$query = $this->db->pdo->prepare($sql);
				$query->bindParam(':productName', $productName);
				$query->bindParam(':catId', $catId);
				$query->bindParam(':brandId', $brandId);
				$query->bindParam(':body', $body);
				$query->bindParam(':price', $price);
				$query->bindParam(':image', $uploaded_image);
				$query->bindParam(':type', $type);
				$result = $query->execute();
				if ($result) {
					$mes = "<span class='text-success'>Insert Successfully...!</span><br><br>";
					return $mes;
				}else{
					$mes = "<span class='text-danger'>Failed ..! There has been problem inserting you details in Database</span><br><br>";
					return $mes;
				}
			}

		}

		public function getAllProduct(){

			$sql = "SELECT p.*, c.catName, b.brandName
					FROM tb_product as p, tb_category as c, tb_brand as b
					WHERE p.catId = c.catId AND p.brandId = b.brandId
					ORDER BY p.productId DESC";

			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$allproduct = $query->fetchAll();
			return $allproduct;

		}


		public function getProductById($productId){

			$sql = "SELECT * FROM tb_product WHERE productId = :productId LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':productId', $productId);
			$query->execute();
			$product = $query->fetchAll();
			return $product;

		}


		public function ProductUpdate($data, $file, $productId){

			$productName = $this->fm->validation($data['productName']);
			$catId = $data['catId'];
			$brandId = $data['brandId'];
			$body = $data['body'];
			$price = $data['price'];
			$type = $data['type'];
			
		    $permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $_FILES['image']['name'];
		    $file_size = $_FILES['image']['size'];
		    $file_temp = $_FILES['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		    $uploaded_image = "images/productImages/" . $unique_image;

		    if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "") {
				$mes = "<span class='text-danger'>Field must not to be empty...!</span><br><br>";
				return $mes;
		    }else{
		    	if (!empty($file_name)) {
				    if ($file_size >1048567) {
						$mes = "<span class='text-danger'>Image Size should be less then 1MB...!</span><br><br>";
						return $mes;
				    } elseif (in_array($file_ext, $permited) === false) {
						$mes = "<span class='text-danger'>You can upload only " . implode(', ', $permited) . " types of file</span><br><br>";
						return $mes;
				    } else{
				    	
					    move_uploaded_file($file_temp, $uploaded_image);
						$sql = "UPDATE tb_product SET productName = :productName, catId = :catId, brandId = :brandId, body = :body, price = :price, image = :image, type = :type WHERE productId = $productId";
						$query = $this->db->pdo->prepare($sql);
						$query->bindParam(':productName', $productName);
						$query->bindParam(':catId', $catId);
						$query->bindParam(':brandId', $brandId);
						$query->bindParam(':body', $body);
						$query->bindParam(':price', $price);
						$query->bindParam(':image', $uploaded_image);
						$query->bindParam(':type', $type);
						$result = $query->execute();
						if ($result) {
							$mes = "<span class='text-success'>Data Update Successfully...!</span><br><br>";
							header("Location: productlist.php?mes=$mes");
						}else{
							$mes = "<span class='text-danger'>Failed ..!  Data not Updated..!</span><br><br>";
							header("Location: productlist.php?mes=$mes");
						}
					}

		    	}else{

						$sql = "UPDATE tb_product SET productName = :productName, catId = :catId, brandId = :brandId, body = :body, price = :price, type = :type WHERE productId = :productId";
						$query = $this->db->pdo->prepare($sql);
						$query->bindParam(':productName', $productName);
						$query->bindParam(':catId', $catId);
						$query->bindParam(':brandId', $brandId);
						$query->bindParam(':body', $body);
						$query->bindParam(':price', $price);
						$query->bindParam(':type', $type);
						$query->bindParam(':productId', $productId);
						$result = $query->execute();
						if ($result) {
							$mes = "<span class='text-success'>Data Update Successfully...!</span><br><br>";
							header("Location: productlist.php?mes=$mes");
						}else{
							$mes = "<span class='text-danger'>Failed ..!  Data not Updated..!</span><br><br>";
							header("Location: productlist.php?mes=$mes");
						}
				}

		    }

		}

		public function delProductById($id){
			$sql = "DELETE FROM tb_product WHERE productId = :productId LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':productId', $id);
			$result = $query->execute();

			if ($result) {
				$mes = "<span class='text-success'>Delete Successfully.. !</span><br><br>";
				return $mes;
			}else{
				$mes = "<span class='text-danger'>Failed to Delete Data.. !</span><br><br>";
				return $mes;
			}
		}


		public function getFeaturedProduct(){

			$sql = "SELECT p.*, c.catName, b.brandName
					FROM tb_product as p, tb_category as c, tb_brand as b
					WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.type = '0'
					ORDER BY p.productId DESC";

			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$product = $query->fetchAll();
			return $product;

		}


		public function getNewProduct(){

			$sql = "SELECT p.*, c.catName, b.brandName
					FROM tb_product as p, tb_category as c, tb_brand as b
					WHERE p.catId = c.catId AND p.brandId = b.brandId
					ORDER BY p.productId DESC LIMIT 6";
					
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$product = $query->fetchAll();
			return $product;

		}



		public function getSingleProduct($id){

			$sql = "SELECT p.*, c.catName, b.brandName
					FROM tb_product as p, tb_category as c, tb_brand as b
					WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.productId = $id
					LIMIT 1";
					
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$product = $query->fetchAll();
			return $product;

		}







	}

?>