<?php
	//Jefferson Lam
	//12-16-13
	//OOP Intermediate

	class Car{

		public $price;
		public $speed;
		public $fuel;
		public $mileage;
		public $tax;

		public function __construct($price, $speed, $fuel, $mileage){
			$this->price = $price;
			$this->speed = $speed;
			$this->fuel = $fuel;
			$this->mileage = $mileage;
			$this->tax = $price > 10000 ? 0.15 : 0.12;
		}

		public function displayAll(){
			echo '<p>Price: '.$this->price.'</p>'.
				 '<p>Speed: '.$this->speed.'mph</p>'.
				 '<p>Fuel: '.$this->fuel.'</p>'.
				 '<p>Mileage: '.$this->mileage.'mpg</p>'.
				 '<p>Tax: '.$this->tax.'</p><br>';
		}
	}


	$car1 = new Car(9000, 90, 'Empty', 20);
	$car1->displayAll();

	$car2 = new Car(12000, 140, 'Full', 14);
	$car2->displayAll();

	$car3 = new Car(5000, 60, 'Half', 18);
	$car3->displayAll();
?>