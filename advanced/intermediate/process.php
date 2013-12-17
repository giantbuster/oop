<?php
	include_once("connection.php");

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

			$data = array();

			$data['html'] = "
				<h1>Country Information</h1>
				<hr>
				<p>Country: {$country['name']}</p>
				<p>Continent: {$country['continent']}</p>
				<p>Region: {$country['region']}</p>
				<p>Population: {$country['population']}</p>
				<p>Life Expectancy: {$country['life_expectancy']}</p>
				<p>Government Form: {$country['government_form']}</p>
			";
			echo json_encode($data);
		}
	}

	$process = new Process();

?>