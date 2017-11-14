<?php
include_once 'Interfaces/player.interface.php';

class Player implements IPlayer {
	/* @var string */
	protected $nome; //Ex.: 'Player';
	/* @var int */
	protected $level; //Ex.: 5
	/* @var int */
	protected $hp; //Ex.: 59
	/* @var boolean */
	protected $critical; //Ex.: FALSE;
	/* @var int */
	protected $ca; //Ex.:
	/* @var int */
	protected $bba; //Ex.:
	/* @var int */
	protected $protectFactor; //Ex.:= 0;
	/* @var int */
	protected $str; //Ex.:
	/* @var int */
	protected $dex; //Ex.:
	/* @var int */
	protected $con; //Ex.:
	/* @var int */
	protected $int; //Ex.:
	/* @var int */
	protected $wis; //Ex.:
	/* @var int */
	protected $cha; //Ex.:
	/* @var Obj Weapon */
	protected $weapon; //Ex.:
	/* @var Obj Armor */
	protected $armor; //Ex.:

	public function __construct() {
		$this->critical = FALSE;
		$this->recalculateParams($this->factorLevel($this->level));
		$this->calculateBba();
	}

	public function causeDamage() {
		if ($this->critical) {
			$damage['dice'] = 0;
			for ($i = 0; $i < $this->weapon->getCriticalFactory(); $i++) {
				$damage['dice'] += $this->weapon->damage();
			}
		} else {
			$damage['dice'] = $this->weapon->damage();
		}
		
		$damage['bonus'] = $this->getBonus($this->str);
		$damage['total'] = $damage['dice'] + $damage['bonus'];
		return $damage;
	}
	public function shortAttack() {
		$attack['dice'] = $this->roleDiceToAtk();
		$attack['bba'] = $this->bba;
		$attack['bonus'] = $this->getBonus($this->str);
		$attack['total'] = $attack['dice'] + $attack['bba'] + $attack['bonus'];
		return $attack;
	}
	public function longAttack() {
		$attack['dice'] = $this->roleDiceToAtk();
		$attack['bba'] = $this->bba;
		$attack['bonus'] = $this->getBonus($this->dex);
		$attack['total'] = $attack['dice'] + $attack['bba'] + $attack['bonus'];
		return $attack;
	}
	public function roleDiceToAtk() {
		$dice = mt_rand(1, 20);
		if ($dice >= $this->weapon->getCriticalMarign()) {
			$this->critical = TRUE;
		} else {
			$this->critical = FALSE;
		}
		return $dice;
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
	public function getArmor() {
		return $this->armor;
	}
	public function getCA() {
		$armor = (!is_null($this->getArmor())) ? $this->getArmor()->getProtection() : 0;
		$this->ca = 10 + $this->getBonus($this->dex) + $armor;
		return $this->ca;
	}
	public function getHP() {
		return $this->hp;
	}
	public function setHP($d) {
		$this->hp = $d;
	}
	public function getCritical() {
		return $this->critical;
	}
	public function recalculateParams($factorCalculateAtr) {
		if ($this instanceof Warrior) {
			$this->str += $factorCalculateAtr;
		} else if ($this instanceof Barbarian) {
			$this->con += $factorCalculateAtr;
		} else if ($this instanceof Warrior) {
			$this->int += $factorCalculateAtr;
		}
		$vida = 10; 
		for ($i = 0; $i < $this->level; $i++) {
			$vida += mt_rand(1,10) + $this->getBonus($this->con);
		}
		$this->hp = $vida;
	}
	public function getBonus($atr) {
		return ($atr % 2 == 0) ? ($atr - 10) / 2 : ($atr - 11) / 2;
	}
	public function factorLevel($level) {
		return floor( $level / 4 );
	}
	public function displayEstatics() {
		$atk = $this->shortAttack();
		$dmg = $this->causeDamage();
		echo '<td>'.$this->nome.'</td>';
		echo '<td>'.$this->level.'</td>';
		echo '<td>'.$this->hp.'</td>';
		echo '<td>'.$this->getCA().'</td>';
		echo '<td>'.$this->str.' ('.$this->getBonus($this->str).')</td>';
		echo '<td>'.$this->dex.' ('.$this->getBonus($this->dex).') </td>';
		echo '<td>'.$this->con.' ('.$this->getBonus($this->con).') </td>';
		echo '<td>'.$this->int.' ('.$this->getBonus($this->int).') </td>';
		echo '<td>'.$this->wis.' ('.$this->getBonus($this->wis).') </td>';
		echo '<td>'.$this->cha.' ('.$this->getBonus($this->cha).') </td>';
		echo '<td>'.$this->weapon->getName().'</td>';
		echo '<td>'.$this->weapon->getDice().'</td>';
		echo '<td>'.$atk['total'].' ( dado '.$atk['dice'].' + bba '.$atk['bba'].' + bonus '.$atk['bonus'].' )</td>';
		echo '<td>'.$dmg['total'].' (dado '.$dmg['dice'].' + bonus '.$dmg['bonus'].') </td>';
	}
}