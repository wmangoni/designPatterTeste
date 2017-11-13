<?php
$gue = new Wizard(12);
$gue->setWeapon( new LongSword() );
$gue->setArmor( new Leather(41) );

$bar = new Warrior(8);
$bar->setWeapon( new LongSword() );
$bar->setArmor( new Leather(43) );
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
  		<td>Wiz - HP: <?= $gue->getHP() ?> CA: <?= $gue->getCA() ?></td>
  		<td>Gue - HP: <?= $bar->getHP() ?> CA: <?= $bar->getCA() ?></td>
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