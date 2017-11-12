<?php
include_once 'Interfaces/armor.interface.php';
include_once 'Interfaces/item.interface.php';

abstract class Armor implements IArmor, IItem {
	protected $name;
	protected $protection;
	protected $type;
	protected $weight;
	protected $durability;

	public function __construct() {}

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
		return $this->type;
	}
	public function getSize($t) {
		$this->type = $st;
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
	public function protect() {}
}


/*
|							Armor
|-------------------------------------------------------------
|
|Armor				Cost	Armor Class (AC)		Strength	Stealth			Weight
|
>> Light Armor
|Padded				5 gp	11 + Dex modifier			—		Disadvantage	8 lb.
|Leather			10 gp	11 + Dex modifier			—		—				10 lb.
|Studded Leather 	45 gp	12 + Dex modifier			—		—				13 lb.
|
>> Medium Armor
|Hide				10 gp	12 + Dex modifier (max 2)	—		—				12 lb.
|Chain Shirt		50 gp	13 + Dex modifier (max 2)	—		—				20 lb.
|Scale Mail			50 gp	14 + Dex modifier (max 2)	—		Disadvantage	45 lb.
|Breastplate		400 gp	14 + Dex modifier (max 2)	—		—				20 lb.
|Half Plate			750 gp	15 + Dex modifier (max 2)	—		Disadvantage	40 lb.
|
>> Heavy Armor
|Ring Mail			30 gp		14						—		Disadvantage	40 lb.
|Chain Mail			75 gp		16						Str 13	Disadvantage	55 lb.
|Splint				200 gp		17						Str 15	Disadvantage	60 lb.
|Plate				1,500 gp	18						Str 15	Disadvantage	65 lb.
|
Shield
|Shield				10 gp		+2						—		—				6 lb.
|
|
*/