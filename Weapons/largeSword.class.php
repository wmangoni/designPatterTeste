<?php
include_once 'weapon.class.php';

class LargeSword extends weapon{

	public function __construct($durability = 10) {
		$this->name = 'Large Sword';
		$this->dice = '2d6';
		$this->durability = $durability;
		$this->recalculateParams();
	}
}