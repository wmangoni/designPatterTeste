<?php
include_once 'player.class.php';
include_once 'warrior.interface.php';

class Warrior extends Player implements IWarrior {

	public function __construct($level) {

		$this->level = $level;
		$this->str = mt_rand(14, 18) + $this->factorLevel($level);
		$this->dex = mt_rand(13, 17);
		$this->con = mt_rand(10, 16);
		$this->int = mt_rand(8, 12);
		$this->wis = mt_rand(8, 12);
		$this->cha = mt_rand(10, 14);

		$this->recalculateParams($this->factorLevel($level));
		$this->calculateBba();
		$this->nome = 'Warrior';
	}
	public function calculateBba() {
		$this->bba = $this->level;
	}
}