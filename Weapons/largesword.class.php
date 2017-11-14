<?php
include_once 'weapon.class.php';

class LargeSword extends Weapon {

	public function __construct($durability = 10) {
		$this->name = 'Large Sword';
		$this->dice = '2d6';
		$this->weight = 2;
		$this->durability = $durability;
		$this->setCriticalFactory(2);
		$this->setCriticalMarign(19);
		$this->recalculateParams();
	}
}