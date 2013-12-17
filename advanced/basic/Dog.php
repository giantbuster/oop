<?php
	require_once('Animal.php');

	class Dog extends Animal{
		public function __construct($name){
			$this->name = $name;
			$this->health = 150;
		}
		public function pet(){
			$this->health += 5;
		}
	}
?>