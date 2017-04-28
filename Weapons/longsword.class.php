<?php
include_once 'weapon.class.php';

class LongSword extends weapon{

	public function __construct($durability = 10) {
		$this->name = 'Long Sword';
		$this->dice = '1d8';
		$this->durability = $durability;
		$this->recalculateParams();
	}
}