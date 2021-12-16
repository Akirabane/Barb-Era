<h1>Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?></h1>
<p class="info2">Vous êtes à l'énigme <?php echo $profil[0]['user_enigme'] ?></p>
<p class="info2">Vous avez déjà fait <?php echo $profil[0]['user_essais'] ?> essais, <?php echo $profil[0]['user_essais_total'] ?> au total</p>
<div id="enigme">
	<div class="bg" style="background-image:url('<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_bg']?>');"><img class="creature" src="<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>"><br/>
		<p class="txt">Quel est la réponse à cette énigme ? A vous de trouver et répondez dans le champ mis à disposition ci-dessous.<form id="reponse" method="POST" action="<?php echo base_url(); ?>/Gamer/validReponse">
			<p class="info last">Veuillez taper la clé de l'énigme: <input type="text" name="reponse"><input type="submit" name="soumettre"></p>
		</form>
	</p>
</div>
</div>