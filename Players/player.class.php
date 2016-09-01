<?php
include_once 'Interfaces/player.interface.php';

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
		$damage['dice'] = $this->weapon->damage();
		$damage['bonus'] = $this->getBonus($this->str);
		$damage['total'] = $damage['dice'] + $damage['bonus'];
		return $damage;
	}
	public function shortAttack() {
		$attack['dice'] = mt_rand(1, 20);
		$attack['bba'] = $this->bba;
		$attack['bonus'] = $this->getBonus($this->str);
		$attack['damage'] = $attack['dice'] + $attack['bba'] + $attack['bonus'];
		return $attack;
	}
	public function longAttack() {
		$attack['dice'] = mt_rand(1, 20);
		$attack['bba'] = $this->bba;
		$attack['bonus'] = $this->getBonus($this->dex);
		$attack['damage'] = $attack['dice'] + $attack['bba'] + $attack['bonus'];
		return $attack;
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
	public function displayEstatics() {
		$atk = $this->shortAttack();
		$dmg = $this->causeDamage();
		echo '<div class="statiscs">';
		echo '<span><strong>Classe</strong> : '.$this->nome.'</span><br>';
		echo '<span><strong>Level</strong> : '.$this->level.'</span><br>';
		echo '<span><strong>Força</strong> : '.$this->str.' ('.$this->getBonus($this->str).')</span><br>';
		echo '<span><strong>Destreza</strong> : '.$this->dex.' ('.$this->getBonus($this->dex).') </span><br>';
		echo '<span><strong>Constituição</strong> : '.$this->con.' ('.$this->getBonus($this->con).') </span><br>';
		echo '<span><strong>Inteligência</strong> : '.$this->int.' ('.$this->getBonus($this->int).') </span><br>';
		echo '<span><strong>Sabedoria</strong> : '.$this->wis.' ('.$this->getBonus($this->wis).') </span><br>';
		echo '<span><strong>Carisma</strong> : '.$this->cha.' ('.$this->getBonus($this->cha).') </span><br>';
		echo '<span><strong>Arma</strong> : '.$this->weapon->getName().'</span><br>';
		echo '<span><strong>Dado Base</strong> : '.$this->weapon->getDice().'</span><br>';
		echo '<span><strong>Valor Ataque</strong> : '.$atk['damage'].' ( dado '.$atk['dice'].' + bba '.$atk['bba'].' + bonus '.$atk['bonus'].' )</span><br>';
		echo '<span><strong>Dano com a Arma</strong> : '.$dmg['total'].' (dado '.$dmg['dice'].' + bonus '.$dmg['bonus'].') </span><br>------<br>';
		echo '</div>';
	}
}