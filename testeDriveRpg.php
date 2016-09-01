<?php
spl_autoload_register(function ($class_name) {
    include_once strtolower($class_name) . '.class.php';
});

$gue = new Warrior(6);
$gue->setWeapon( new LongSword() );
$gue->displayEstatics();

$bar = new Barbarian(2);
$bar->setWeapon( new Knife() );
$bar->displayEstatics();
$bar->setWeapon( new LargeSword() );
$bar->displayEstatics();