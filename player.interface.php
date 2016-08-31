<?php
namespace PlayerCore;

interface IPlayer {
	public function causeDamage();
	public function attack();
	public function takesDamage($dano);
	public function setWeapon(Weapon $weapon);
	public function setArmor(Armor $armor);
}