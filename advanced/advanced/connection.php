<?php

include_once("constant.php");

class Database{

	private $connection;

	public function __construct(){
		//connect to database host
		$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE) or die('Could not connect to the database host (please double check the settings in connection.php): ' . mysql_error());
	}

	//fetches all records from the query and returns an array with the fetched records
	public function fetchAll($query){
		$data = array();

		$result = mysqli_query($this->connection, $query);
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		return $data;
	}

	//fetch the first record obtained from the query
	public function fetchRecord($query){
		$result = mysqli_query($this->connection, $query);
		if (!$result) return null;
		else return mysqli_fetch_assoc($result);
	}

	public function getConnection(){
		return $this->connection;
	}
}
?>