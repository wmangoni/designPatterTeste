<?php
namespace PlayerCore;
include_once 'weapon.class.php';

class LongSword extends weapon{
	protected $dice = '1d8';
	protected $damageMin;
	protected $damageMax;
	protected $durability;

	public function __construct($durability = 10) {
		$this->durability = $durability;
		recalculateParams();
	}
}