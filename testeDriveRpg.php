<?php
spl_autoload_register(function ($class_name) {
	if ( file_exists('Players/' . strtolower($class_name) . '.class.php') ) {
		include_once 'Players/' . strtolower($class_name) . '.class.php';
	} else if ( file_exists('Weapons/' . strtolower($class_name) . '.class.php') ) {
		include_once 'Weapons/' . strtolower($class_name) . '.class.php';
	} else {
		include_once 'Armors/' . strtolower($class_name) . '.class.php';
	}
});

define('BASE_URL', 'http://localhost/designPatterTeste/testeDriveRpg.php');

require_once 'Template/header.php';
require_once 'Template/nav.php';



function turn(Player $p1, Player $p2) {
	$count = 1;
	while (($p1->getHP() > 0 && $p2->getHP() > 0) || $count > 100) {
		echo '<tr>';
		echo '<td scope="row">'.$count.'</td>';
		$atk_p1 = $p1->shortAttack();
		$span_style1 = getCritical($p1);
		$atk_p2 = $p2->shortAttack();
		$span_style2 = getCritical($p2);

		$echo_2 = getMensageAtk($atk_p1, $p1, $p2, $span_style1);
		$echo_1 = getMensageAtk($atk_p2, $p2, $p1, $span_style2);

		echo '<td> HP: '.$echo_1.'</td>';
		echo '<td> HP: '.$echo_2.'</td>';
		echo '</tr>';
		$count++;
	}
}

function getCritical($p) {
	if ($p->getCritical()) {
		return ' <span style="color: red;"> Ataque Crítico: </span>';
	} else {
		return ' <span>Ataque: </span>';
	}
}

function getMensageAtk($atk_p, $p1, $p2, $span_style) {
	if ($atk_p['total'] > $p2->getCA()) {
		$dano = $p1->causeDamage()['total'];
		$p2->takesDamage( $dano );
		return $p2->getHP(). $span_style.' '.$atk_p['total'].' Dano recebido: ' .$dano;
	} else {
		return $p2->getHP(). $span_style.' '.$atk_p['total'].' Defendido!';
	}
}

if (isset($_GET['page'])) {
	require_once $_GET['page'].'.php';
} else {
	require_once 'gue-bar.php';
}

require_once 'Template/footer.php';