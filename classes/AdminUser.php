<?php


	include_once 'Session.php';
	include_once 'Database.php';


	class AdminUser
	{

		private $db;
		
		function __construct()
		{
			$this->db = new Database();

		}

		public function adminRegistration($data){
			$name               = $data['name'];
			$username           = $data['username'];
			$email              = $data['email'];
			$password           = $data['password'];
			$encrypted_password = md5($password);
			$chk_email          = $this->emailCheck($email);

			if ($name == "" || $username == "" || $email == "" || $password == "") {
				$mes = "Field must not to be empty...!";
				return $mes;
			}

			if (strlen($username) < 3) {
				$mes = "Username is too short...!";
				return $mes;
			}elseif (preg_match('/[^a-zA-Z0-9_-]/', $username)) {
				$mes = "Username Only contain alphanumerical, dashes and underscope...!";
				return $mes;
			}

			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$mes = "The email address is not valid...!";
				return $mes;
			}

			if ($chk_email == true) {
				$mes = "The email address already Exist...!";
				return $mes;
			}

			if (strlen($data['password']) < 3) {
				$mes = "Passward is too short...!";
				return $mes;
			}



			$sql = "INSERT INTO tb_user_admin (adminName, adminUsername, adminEmail, password) VALUES(:name, :username, :email, :password)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindParam(':name', $name);
			$query->bindParam(':username', $username);
			$query->bindParam(':email', $email);
			$query->bindParam(':password', $encrypted_password);
			$result = $query->execute();
			if ($result) {
				$mes = "You have been registered, Please login...!";
                header("Location: login.php?mes=$mes");
			}else{
				$mes = "Failed ..! There has been problem inserting you details in Database";
				return $mes;
			}

		}






		public function adminLogin($data){
			$email            = $data['email'];
			$password         = md5($data['password']);

			if ($email == "" || $password == "") {
				$mes = "Field must not to be empty...!";
				return $mes;
			}

			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$mes = "The email address is not valid...!";
				return $mes;
			}

			$result = $this->getLoginUser($email, $password);

			if ($result) {
				Session::init();
				Session::set("login", true);
				Session::set("id", $result->adminId);
				Session::set("name", $result->adminName);
				Session::set("username", $result->adminUsername);
				Session::set("email", $result->adminEmail);
				Session::set("loginmsg", "Logged In Successfully...!");
				header("Location: ../admin/index.php");

			}else{
				$mes = "Data not found...!";
				return $mes;
			}

		}






		public function emailCheck($email){
			$sql = "SELECT adminEmail FROM tb_user_admin WHERE adminEmail = :email";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email', $email);
			$query->execute();
			if ($query->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		}




		public function getLoginUser($email, $password){
			$sql    = "SELECT * FROM tb_user_admin WHERE adminEmail = :email AND password = :password  AND status = 1 LIMIT 1";
			$query  = $this->db->pdo->prepare($sql);
			$query->bindValue(':email', $email);
			$query->bindValue(':password', $password);
			$query->execute();
			// $users = $query->fetch();
			// echo $users['username'];
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;

		}



		public function find_all_user(){
			$sql = "SELECT * FROM tb_user ORDER BY id DESC";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$users = $query->fetchAll();
			return $users;
		}



		public function find_keyword(){
			$sql = "SELECT * FROM tb_search_people ORDER BY id DESC";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$keywords = $query->fetchAll();
			return $keywords;
		}



		public function delete_keyword($user_id){
			$sql = "DELETE FROM tb_search_people WHERE id = :id LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $user_id);
			$result = $query->execute();

			if ($result) {
				$mes = "Delete Successfully.. !";
				return $mes;
			}else{
				$mes = "Failed to Delete Data.. !";
				return $mes;
			}
		}



		public function delete_user($user_id){
			$sql = "DELETE FROM tb_user WHERE id = :id LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $user_id);
			$result = $query->execute();

			if ($result) {
				$mes = "Delete Successfully.. !";
				return $mes;
			}else{
				$mes = "Failed to Delete Data.. !";
				return $mes;
			}
		}


		public function getUserById($user_id){
			$sql = "SELECT * FROM tb_user WHERE id = :id LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $user_id);
			$query->execute();
			$users = $query->fetch(PDO::FETCH_OBJ);
			return $users;

		}


		public function updateUserData($user_id, $data){
			$name             = $data['name'];
			$username         = $data['username'];
			$email            = $data['email'];

			if ($name == "" || $username == "" || $email == "") {
				// $mes = "<div class='alert alert-danger' style= 'color:#0fb9b1;'><strong class='alert-danger'>Error .!</strong> Field must not to be empty.</div>";
				$mes = "Field must not to be empty.";
				return $mes;
			}

			if (strlen($username) < 3) {
				$mes = "<div class='alert alert-danger' style= 'color:#0fb9b1;'><strong class='alert-danger'>Error .!</strong> Username is too short...!</div>";
				return $mes;
			}elseif (preg_match('/[^a-zA-Z0-9_-]/', $username)) {
				$mes = "<div class='alert alert-danger'><strong>Error .!</strong> Username Only contain alphanumerical, dashes and underscope!</div>";
				return $mes;
			}

			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$mes = "<div class='alert alert-danger' style= 'color:#0fb9b1;'><strong class='alert-danger'>Error .!</strong> The email address is not valid..!</div>";
				return $mes;
			}



			$sql = "UPDATE tb_user SET name = :name, username = :username, email = :email WHERE id = :id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindParam(':name', $name);
			$query->bindParam(':username', $username);
			$query->bindParam(':email', $email);
			$query->bindParam(':id', $user_id);
			$result = $query->execute();

			header("Location: userlist.php");

			if ($result) {
				$mes = "<div class='alert alert-success' style= 'color:#0fb9b1;'><strong class='alert-success'>Success .!</strong> Data Update Successfully...!</div>";
				return $mes;
			}else{
				$mes = "<div class='alert alert-danger' style= 'color:#0fb9b1;'><strong class='alert-danger'>Failed ..!</strong> Data not Updated..!</div>";
				return $mes;
			}

		}



		public function searchKeyword($data){
			$peopleName = $data['peopleName'];
			$isExist  = $this->keywordCheck($peopleName);

			if ($isExist == false) {
				$sql = "INSERT INTO  tb_search_people (keyword) VALUES(:peopleName)";
				$query = $this->db->pdo->prepare($sql);
				$query->bindParam(':peopleName', $peopleName);
				$query->execute();
			}
		}

		


		public function keywordCheck($peopleName){
			$sql = "SELECT keyword FROM tb_search_people WHERE keyword = :peopleName";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':peopleName', $peopleName);
			$query->execute();
			if ($query->rowCount() > 0) {
				return true;
			}else{
				return false;
			}
		}






	}







 ?>