<?php
interface IPlayer {
	public function causeDamage();
	public function shortAttack();
	public function longAttack();
	public function takesDamage($dano);
	public function setWeapon(Weapon $weapon);
	public function setArmor(Armor $armor);
}