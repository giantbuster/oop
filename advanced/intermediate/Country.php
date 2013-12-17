<?php
	require_once('connection.php');

	class Country{

		public $connection;

		public function __construct(){
			$this->connection = new Database();
		}

		public function createSelect(){
			$query = 'SELECT id, name FROM countries';
			$result = $this->connection->fetchAll($query);
			$html = '';
			if ($result){
				foreach ($result as $row){
					$html .= "<option value='{$row['id']}'>".$row['name']."</option>";
				}
			}
			echo $html;
		}
	}
?>