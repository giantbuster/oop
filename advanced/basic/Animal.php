<?php
	class Animal{
		public $name;
		public $health;

		public function __construct($name){
			$this->name = $name;
			$this->health = 100;
		}

		public function walk(){
			$this->health--;
		}

		public function run(){
			$this->health -= 5;
		}

		public function displayHealth(){
			echo 'Name: '.$this->name.'<br>';
			echo 'Health: '.$this->health.'<br>';
		}
	}
?>