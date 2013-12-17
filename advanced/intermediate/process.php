<?php

	include_once("connection.php");
	session_start();

	class Process{

		private $connection;

		public function __construct(){
			$this->connection = new Database();
			if(isset($_POST['action']) and $_POST['action'] == "country"){
				$this->getCountryInfo();
			}
		}

		private function getCountryInfo(){
			$query = 'SELECT * FROM countries WHERE id='.$_POST["country_id"];
			$country = $this->connection->fetchRecord($query);

			$_SESSION['country']['name'] = $country['name'];
			$_SESSION['country']['continent'] = $country['continent'];
			$_SESSION['country']['region'] = $country['region'];
			$_SESSION['country']['population'] = $country['population'];
			$_SESSION['country']['life_exp'] = $country['life_expectancy'];
			$_SESSION['country']['govt'] = $country['government_form'];
			
			header('Location: index.php');
			exit;
		}
	}

	$process = new Process();

?>