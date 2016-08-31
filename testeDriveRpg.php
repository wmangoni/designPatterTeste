<?php
spl_autoload_register(function ($class_name) {
	echo strtolower($class_name) . '.class.php';
    include_once strtolower($class_name) . '.class.php';
});

$gue = new Warrior(6);
$gue->setWeapon( new LongSword() );
$gue->displayAttributes();

$bar = new Barbarian(2);
$bar->setWeapon( new Knife() );
$bar->displayAttributes();