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

define('BASE_URL', 'http://localhost/flightPHP/');

require_once 'Template/header.php';
require_once 'Template/nav.php';

$gue = new Warrior(7);
$gue->setWeapon( new LongSword() );
$gue->setArmor( new Leather(41) );

$bar = new Barbarian(8);
$bar->setWeapon( new LargeSword() );
$bar->setArmor( new Leather(43) );


function turn(Player $p1, Player $p2) {
	$count = 1;
	while (($p1->getHP() > 0 && $p2->getHP() > 0) || $count > 100) {
		echo '<tr>';
		echo '<th scope="row">'.$count.'</th>';
		$atk_p1 = $p1->shortAttack();
		$atk_p2 = $p2->shortAttack();
		if ($atk_p1['total'] > $p2->getCA()) {
			$dano_p1 = $p1->causeDamage()['total'];
			$p2->takesDamage( $dano_p1 );
			$echo_2 = $p2->getHP(). ' Ataque: '.$atk_p1['total'].' Dano recebido: ' .$dano_p1;
		} else {
			$echo_2 = $p2->getHP(). ' Ataque: '.$atk_p1['total'].' Dano defendido!';
		}

		if ($atk_p2['total'] > $p1->getCA()) {
			$dano_p2 = $p2->causeDamage()['total'];
			$p1->takesDamage( $dano_p2 );
			$echo_1 = $p1->getHP(). ' Ataque: '.$atk_p2['total'].'.Dano recebido: ' .$dano_p2;
		} else {
			$echo_1 = $p1->getHP(). ' Ataque: '.$atk_p2['total'].' Dano defendido!';
		}

		echo '<td> HP: '.$echo_1.'</td>';
		echo '<td> HP: '.$echo_2.'</td>';
		echo '</tr>';
		$count++;
	}
}
?>
<div class="col-md-12">
	<table class="table table-striped">
  		<thead>
    		<tr>
				<th>Classe</th>
				<th>Level</th>
				<th>Vida</th>
				<th>CA</th>
				<th>For</th>
				<th>Des</th>
				<th>Con</th>
				<th>Int</th>
				<th>Sab</th>
				<th>Car</th>
				<th>Arma</th>
				<th>Dado Base</th>
				<th>Valor Atk</th>
				<th>Dano arma</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php $gue->displayEstatics(); ?>
			</tr>
			<tr>
				<?php $bar->displayEstatics(); ?>
			</tr>
		</tbody>
	</table>
</div>

<div class="col-md-12">
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>First Player</th>
      <th>Second Player</th>
    </tr>
  </thead>
  <tbody>
  	<tr>
  		<td scope="row">0</td>
  		<td>Gue - HP: <?= $gue->getHP() ?> CA: <?= $gue->getCA() ?></td>
  		<td>Bár - HP: <?= $bar->getHP() ?> CA: <?= $gue->getCA() ?></td>
  	</tr>
  	<?php turn($gue, $bar); ?>
  </tbody>
</table>
</div>
<?php
//$wiz = new Wizard(10);
//$wiz->setWeapon( new Knife() );
//$wiz->displayEstatics();
//$wiz->setWeapon( new LongSword() );

require_once 'Template/footer.php';