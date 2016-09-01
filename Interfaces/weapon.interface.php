<?php
interface IWeapon {
	public function damage();
	public function reduceDurability($dano);
	public function getRandFactory();
}