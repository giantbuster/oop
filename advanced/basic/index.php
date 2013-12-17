<?php
	
	/*
	Jefferson Lam
	12-17-13
	OOP Advanced : Basic
	*/
		
	require_once('Animal.php');
	require_once('Dog.php');
	require_once('Dragon.php');

	$animal = new Animal('Bob');
	$animal->walk();
	$animal->walk();
	$animal->walk();
	$animal->run();
	$animal->run();
	$animal->displayHealth();

	$dog = new Dog('Spot');
	$dog->walk();
	$dog->walk();
	$dog->walk();
	$dog->run();
	$dog->run();
	$dog->pet();
	$dog->displayHealth();

	$dragon = new Dragon('Aragorn');
	$dragon->walk();
	$dragon->walk();
	$dragon->walk();
	$dragon->run();
	$dragon->run();
	$dragon->fly();
	$dragon->displayHealth();

	// $animal->pet();
	// $animal->fly();
?>