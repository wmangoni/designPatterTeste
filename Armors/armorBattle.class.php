<?php
class ArmorBattle extends Armor {

	public function __construct($durability) {
		parent::__construct();
		$this->name = 'ArmorBattle';
		$this->protection = 8;
		$this->type = 'Heavy';
		$this->weight = 23;
		$this->durability = $durability;
	}

}