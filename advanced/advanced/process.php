<?php
	include_once("connection.php");
	include_once("Users.php");
	session_start();


	class Process{

		public $connection;
		public $usersDatabase;

		public function __construct(){
			$this->connection = new Database();
			$this->usersDatabase = new Users();

			//see if the user wants to login
			if(isset($_POST['action']) && $_POST['action'] == "login"){
				$this->loginAction();
			} else if(isset($_POST['action']) && $_POST['action'] == "register"){
				$this->registerAction();
			} else if(isset($_POST['action']) && $_POST['action'] == "add_friend"){
				$this->addAction();
			} else if (isset($_POST['action']) && $_POST['action'] == "logoff"){
				//assume that the user wants to log off
				session_destroy();
				header("Location: index.php");
			}
		}

		private function loginAction(){
			$errors = array();

			if(!(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
				$errors['email'] = "Invalid email";
			}

			if(!(isset($_POST['password']) && strlen($_POST['password'])>=6)){
				$errors['password'] = "Invalid password";
			}

			//see if there are errors
			if(count($errors) > 0){
				$_SESSION['login_errors'] = $errors;
				header('Location: index.php');
			} else {
				//check if the email and the password is valid
				$query = "SELECT * FROM users WHERE email = '{$_POST['email']}' AND password ='".md5($_POST['password'])."'";
				$users = $this->connection->fetchAll($query);
				
				if(count($users)>0) {
					$_SESSION['logged_in'] = true;
					$_SESSION['user']['id'] = $users[0]['id'];
					$_SESSION['user']['first_name'] = $users[0]['first_name'];
					$_SESSION['user']['last_name'] = $users[0]['last_name'];
					$_SESSION['user']['email'] = $users[0]['email'];
					header("Location: home.php");
				} else {
					$errors[] = "Invalid login information";
					$_SESSION['login_errors'] = $errors;
					header('Location: index.php');
				}
			}
		}

		private function registerAction() {
			$errors = array();
			//let's see if the first_name is a string
			if(!(isset($_POST['first_name']) && is_string($_POST['first_name']) && strlen($_POST['first_name'])>0)){
				$errors[] = "first name is not valid!";
			}

			//let's see if the last_name is a string
			if(!(isset($_POST['last_name']) && is_string($_POST['last_name']) && strlen($_POST['last_name'])>0)){
				$errors[] = "last name is not valid!";
			}

			if(!(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
				$errors[] = "email is not valid";
			}

			if(!(isset($_POST['password']) && strlen($_POST['password'])>=6)){
				$errors[] = "invalid password";
			}

			if(!(isset($_POST['confirm_password']) && isset($_POST['password']) && $_POST['password'] == $_POST['confirm_password'])){
				$errors[] = "please confirm your password";
			}

			if(count($errors)>0){
				$_SESSION['register_errors'] = $errors;
				header("Location: index.php");
			} else {
				//see if the email address already is taken
				$query = "SELECT * FROM users WHERE email = '{$_POST['email']}'";
				$users = $this->connection->fetchAll($query);	

				//see if someone already registered with that email address
				if(count($users)>0) {
					$errors[] = "someone already registered with this email address";
					$_SESSION['register_errors'] = $errors;
					header("Location: index.php");
				} else {
					$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) 
							  VALUES ('{$_POST['first_name']}', 
							  	      '{$_POST['last_name']}', 
							  	      '{$_POST['email']}', 
							  	      '".md5($_POST['password'])."', 
							  	      NOW(),
							  	      NOW()
							  	      )";
					mysqli_query($this->connection->getConnection(), $query);

					$_SESSION['message'] = "User was successfully created!";
					$_SESSION['logged_in'] = true;
					$_SESSION['user']['id'] = mysqli_insert_id($this->connection->getConnection());
					$_SESSION['user']['first_name'] = $_POST['first_name'];
					$_SESSION['user']['last_name'] = $_POST['last_name'];
					$_SESSION['user']['email'] = $_POST['email'];
					header("Location: home.php");
				}
			}
		}

		private function addAction(){
			$this->usersDatabase->addFriend($_SESSION['user']['id'], $_POST['user_id']);
			header("Location: home.php");
		}
	}

	$process = new Process();
?>