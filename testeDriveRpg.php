<?php
spl_autoload_register(function ($class_name) {
	if ( file_exists('Players/' . strtolower($class_name) . '.class.php') ) {
    	include_once 'Players/' . strtolower($class_name) . '.class.php';
	} else if ( file_exists('Weapons/' . strtolower($class_name) . '.class.php') ) {
		include_once 'Weapons/' . strtolower($class_name) . '.class.php';
	} else {
		include_once 'Weapons/' . strtolower($class_name) . '.class.php';
	}
});

$gue = new Warrior(6);
$gue->setWeapon( new LongSword() );
$gue->displayEstatics();

$bar = new Barbarian(2);
$bar->setWeapon( new Knife() );
$bar->displayEstatics();
$bar->setWeapon( new LargeSword() );
$bar->displayEstatics();

$wiz = new Wizard(10);
$wiz->setWeapon( new Knife() );
$wiz->displayEstatics();
$wiz->setWeapon( new LongSword() );