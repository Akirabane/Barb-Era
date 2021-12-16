<h1>Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?></h1>
<p class="info">Vous êtes à l'énigme <?php echo $profil[0]['user_enigme'] ?></p>
<div id="enigme">
	<p class="info"><?php echo $message ?></p>
	<p class="info"><a href="<?php echo base_url(); ?>/Gamer/AccueilGamer"><?php echo $message2; ?></a></p>
	<p class="info"><img src="<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_bg'] ?>"></p>
</div>
<form method="POST" action="<?php echo base_url(); ?>/Gamer/validReponse">
	<p class="info last">Veuillez taper la clé de l'énigme: <input type="text" name="reponse"><input type="submit" name="soumettre"></p>
</form>