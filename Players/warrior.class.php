<?php
include_once 'player.class.php';
include_once 'Interfaces/warrior.interface.php';

class Warrior extends Player implements IWarrior {

	public function __construct($level) {

		$this->nome = 'Warrior';
		$this->level = $level;
		$this->str = mt_rand(14, 18) + $this->factorLevel($level);
		$this->dex = mt_rand(13, 17);
		$this->con = mt_rand(10, 16);
		$this->int = mt_rand(8, 12);
		$this->wis = mt_rand(8, 12);
		$this->cha = mt_rand(10, 14);

		parent::__construct(); //Sempre chamar o contrutor pai no fim
	}
	public function calculateBba() {
		$this->bba = $this->level;
	}
}