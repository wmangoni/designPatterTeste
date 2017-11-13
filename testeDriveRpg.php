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
		$atk_p2 = $p2->shortAttack();
		if ($atk_p1['total'] > $p2->getCA()) {
			$dano_p1 = $p1->causeDamage()['total'];
			$p2->takesDamage( $dano_p1 );
			$echo_2 = $p2->getHP(). ' Ataque: '.$atk_p1['total'].' Dano recebido: ' .$dano_p1;
		} else {
			$echo_2 = $p2->getHP(). ' Ataque: '.$atk_p1['total'].' Defendido!';
		}

		if ($atk_p2['total'] > $p1->getCA()) {
			$dano_p2 = $p2->causeDamage()['total'];
			$p1->takesDamage( $dano_p2 );
			$echo_1 = $p1->getHP(). ' Ataque: '.$atk_p2['total'].'.Dano recebido: ' .$dano_p2;
		} else {
			$echo_1 = $p1->getHP(). ' Ataque: '.$atk_p2['total'].' Defendido!';
		}

		echo '<td> HP: '.$echo_1.'</td>';
		echo '<td> HP: '.$echo_2.'</td>';
		echo '</tr>';
		$count++;
	}
}

if (isset($_GET['page'])) {
	require_once $_GET['page'].'.php';
} else {
	require_once 'gue-bar.php';
}

require_once 'Template/footer.php';