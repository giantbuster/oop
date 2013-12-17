<?php
	require_once('Animal.php');

	class Dragon extends Animal{
		public function __construct($name){
			$this->name = $name;
			$this->health = 170;
		}

		public function fly(){
			$this->health -= 10;
		}

		public function displayHealth(){
			echo 'This is a dragon!<br>';
			parent::displayHealth();
		}
	}
?>