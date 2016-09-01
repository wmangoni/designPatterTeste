<?php
include_once 'weapon.class.php';

class Knife extends weapon{

	public function __construct($durability = 5) {
		$this->name = 'Knife';
		$this->dice = '1d4';
		$this->durability = $durability;
		$this->recalculateParams();
	}
}