<?php
class Leather extends Armor {

	public function __construct($durability) {
		parent::__construct();
		$this->name = 'Leather';
		$this->protection = 2;
		$this->type = 'Light';
		$this->weight = 4;
		$this->durability = $durability;
	}

}