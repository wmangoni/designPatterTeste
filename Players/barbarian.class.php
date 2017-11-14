<?php
include_once 'player.class.php';
include_once 'Interfaces/warrior.interface.php';

class Barbarian extends Player implements IWarrior {

	public function __construct($level) {

		$this->nome = 'Barbarian';
		$this->level = $level;
		$this->str = mt_rand(13, 17) + $this->factorLevel($level);
		$this->dex = mt_rand(10, 16);
		$this->con = mt_rand(14, 18);
		$this->int = mt_rand(8, 12);
		$this->wis = mt_rand(10, 14);
		$this->cha = mt_rand(8, 12);

		parent::__construct(); //Sempre chamar o contrutor pai no fim
	}
	public function calculateBba() {
		$this->bba = $this->level;
	}
}