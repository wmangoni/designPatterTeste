<?php
include_once 'Interfaces/weapon.interface.php';
include_once 'Interfaces/item.interface.php';

class Weapon implements IWeapon, IItem {
	protected $name;
	protected $dice;
	protected $damageMin = 0;
	protected $damageMax = 0;
	protected $durability;

	private function __construct() {}

	public function damage() {
		return $this->getRandFactory();
	}
	public function getDice() {
		return $this->dice;
	}
	public function setDamageMin($dm) {
		$this->damageMin = $dm;
	}
	public function setDamageMax($dm) {
		$this->damageMax = $dm;
	}
	public function getName() {
		return $this->name;
	}
	public function getRandFactory() {
		return mt_rand($this->damageMin, $this->damageMax);
	}
	public function reduceDurability($dano) {
		$this->durability -= $dano;
	}
	public function recalculateParams() {
		$damage = explode('d', $this->dice);
		$this->setDamageMin( $damage[0] );
		$this->setDamageMax( $damage[0] * $damage[1] );
	}
}