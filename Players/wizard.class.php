<?php
include_once 'player.class.php';
include_once 'Interfaces/mages.interface.php';

class Wizard extends Player implements IMages {

	public function __construct($level) {

		$this->nome = 'Wizard';
		$this->level = $level;
		$this->str = mt_rand(8, 12);
		$this->dex = mt_rand(10, 14);
		$this->con = mt_rand(10, 16);
		$this->int = mt_rand(13, 17) + $this->factorLevel($level);
		$this->wis = mt_rand(14, 18);
		$this->cha = mt_rand(8, 12);
		
		parent::__construct(); //Sempre chamar o contrutor pai no fim
	}
	public function calculateBba() {
		$this->bba = ceil( ($this->level - 1) / 2 );
	}
}