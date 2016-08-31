<?php
namespace PlayerCore;
include_once 'player.class.php';
include_once 'warrior.interface.php';

class Warrior extends Player implements IWarrior {
	public $name = 'Warrior';

	public function __construct($level) {

		$this->level = $level;
		$this->str = mt_rand(12, 18) + $factorLevel($level);
		$this->dex = mt_rand(8, 18);
		$this->con = mt_rand(8, 18);
		$this->int = mt_rand(8, 14);
		$this->wis = mt_rand(8, 18);
		$this->cha = mt_rand(8, 14);

		$this->recalculateParams($factorLevel($level));
		$this->calculateBba();
	}
	public function calculateBba() {
		$this->bba = 10 + $this->level;
	}
}