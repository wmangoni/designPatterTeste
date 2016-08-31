<?php
namespace PlayerCore;
include_once 'weapon.interface.php';

class Weapon implements IWeapon{
	private $dice = '1d8';
	private $damageMin = 0;
	private $damageMax = 0;
	private $durability = 1;

	private function __construct() {}

	public function damage() {
		return getRandFactory();
	}

	public function getRandFactory() {
		return mt_rand($this->danoMin, $this->danoMax);
	}

	public function reduceDurability($dano) {
		$this->durability -= $dano;
	}
	public function recalculateParams() {
		$damage = explode('d', $dice);
		$this->damageMin = $damage[0];
		$this->damageMax = $damage[0] * $damage[1];
	}
}