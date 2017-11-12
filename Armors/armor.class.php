<?php
include_once 'Interfaces/armor.interface.php';

class Weapon implements IArmor, IItem {
	protected $name;
	protected $protection;
	protected $size;
	protected $weight;
	protected $durability;

	private function __construct() {}

	public function damage() {
		return $this->getRandFactory();
	}
	public function setProtection($p) {
		$this->protection = $p;
	}
	public function getProtection() {
		return $this->protection;
	}
	public function setSize() {
		return $this->size;
	}
	public function getSize($s) {
		$this->size = $s;
	}
	public function setWeight($w) {
		$this->weight = $w;
	}
	public function getName() {
		return $this->name;
	}
	public function reduceDurability($dano) {
		$this->durability -= $dano;
	}
	public function recalculateParams() {
		//
	}
}