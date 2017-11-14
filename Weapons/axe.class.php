<?php
include_once 'weapon.class.php';

class Axe extends Weapon {

	public function __construct($durability = 10) {
		$this->name = 'Axe';
		$this->dice = '1d12';
		$this->weight = 4;
		$this->durability = $durability;
		$this->setCriticalFactory(3);
		$this->setCriticalMarign(19);
		$this->recalculateParams();
	}
}