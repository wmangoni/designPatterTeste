<?php
include_once 'Interfaces/weapon.interface.php';
include_once 'Interfaces/item.interface.php';

class Weapon implements IWeapon, IItem {
	
	/* @var String */
	protected $name;// Ex.: 'Long Sword';
	/* @var String */
	protected $dice;// Ex.: '1d8';
	/* @var int */
	protected $weight;// Ex.: 1;
	/* @var int */
	protected $damageMin;// Ex.: 0;
	/* @var int */
	protected $damageMax;// Ex.: 0;
	/* @var int */
	protected $durability;// Ex.: 1;
	/* @var int */
	protected $criticalFactory;// Ex.: 1;
	/* @var int */
	protected $criticalMargin;// Ex.: 20;

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
	public function setCriticalFactory($factory) {
		$this->criticalFactory = $factory;
	}
	public function setCriticalMarign($margin) {
		$this->criticalMargin = $margin;
	}
	public function getCriticalFactory() {
		return $this->criticalFactory;
	}
	public function getCriticalMarign() {
		return $this->criticalMargin;
	}
}