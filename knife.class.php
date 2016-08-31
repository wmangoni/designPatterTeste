<?php
include_once 'weapon.class.php';

class Knife extends weapon{
	protected $dice = '1d4';
	protected $damageMin;
	protected $damageMax;
	protected $durability;

	public function __construct($durability = 5) {
		$this->durability = $durability;
		$this->recalculateParams();
	}
}