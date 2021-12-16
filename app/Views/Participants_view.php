<h1>Liste des participants</h1>
<?php foreach ( $lesjoueurs as $un):?>
	<div class="cd">
		<p class="cdd2"><?php echo $un['user_nom'] ?> <?php echo $un['user_prenom'] ?></p>
	</div>
	<?php endforeach;?>


