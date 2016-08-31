<?php
include_once 'player.interface.php';

class Player implements IPlayer {
	/* @var string */
	protected $nome = 'Player';
	/* @var int */
	protected $level;
	/* @var int */
	protected $hp;
	/* @var int */
	protected $ca;
	/* @var int */
	protected $bba;
	/* @var int */
	protected $protectFactor = 0;
	/* @var int */
	protected $str;
	/* @var int */
	protected $dex;
	/* @var int */
	protected $con;
	/* @var int */
	protected $int;
	/* @var int */
	protected $wis;
	/* @var int */
	protected $cha;
	/* @var Obj Weapon */
	protected $weapon;
	/* @var Obj Armor */
	protected $armor;

	private function __construct() {}

	public function causeDamage() {
		return $this->weapon->damage() + $this->str;
	}
	public function attack() {
		return $this->weapon->damage() + $this->str;
	}
	public function takesDamage($dano) {
		$this->hp -= $dano - $this->protectFactor;
	}
	public function setWeapon(Weapon $weapon) {
		$this->weapon = $weapon;
	}
	public function setArmor(Armor $armor) {
		$this->armor = $armor;
	}
	public function recalculateParams($factorCalculateAtr) {
		$this->hp = 10 + $this->getBonus($this->con) * $this->level;
		$this->ca = 10 + $this->getBonus($this->dex);
	}
	public function getBonus($atr) {
		return ($atr % 2 == 0) ? ($atr - 10) / 2 : ($atr - 11) / 2;
	}
	public function factorLevel($level) {
		return floor( $level / 4 );
	}
	public function displayAttributes() {
		echo $this->nome.'<br>';
		echo $this->str.'<br>';
		echo $this->dex.'<br>';
		echo $this->int.'<br>';
		echo $this->con.'<br>';
		echo $this->wis.'<br>';
		echo $this->cha.'<br>';
	}
}