<?php
namespace PlayerCore;

interface IWeapon {
	public function damage();
	public function reduceDurability();
	public function getRandFactory();
}