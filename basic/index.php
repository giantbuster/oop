<?php
	//Jefferson Lam
	//12-16-13
	//OOP Basic

	class Bike{
		public $price;
		public $max_speed;
		public $miles;

		public function __construct($price, $max_speed){
			$this->price = $price;
			$this->max_speed = $max_speed;
			$this->miles = 0;
		}

		public function displayInfo(){
			echo "<p>Price: ".$this->price."</p>";
			echo "<p>Maximum Speed: ".$this->max_speed."</p>";
			echo "<p>Miles Driven: ".$this->miles."</p>";
		}

		public function drive(){
			echo '<p>Driving</p>';
			$this->miles += 10;
		}

		public function reverse(){
			echo '<p>Reversing</p>';
			$this->miles -= 5;
			if ($this->miles < 0) $this->miles = 0;
		}
	}


	$bike1 = new Bike(200, "100mph");
	$bike2 = new Bike(300, "120mph");
	$bike3 = new Bike(500, "140mph");

	$bike1->drive();
	$bike1->drive();
	$bike1->drive();
	$bike1->reverse();
	$bike1->displayInfo();

	$bike2->drive();
	$bike2->drive();
	$bike2->reverse();
	$bike2->reverse();
	$bike2->displayInfo();

	$bike3->reverse();
	$bike3->reverse();
	$bike3->reverse();
	$bike3->displayInfo();
?>