<h1>Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?></h1>
<p class="info2">Vous êtes à l'énigme <?php echo $profil[0]['user_enigme'] ?></p>
<p class="info2">Vous avez déjà fait <?php echo $profil[0]['user_essais'] ?> essais, <?php echo $profil[0]['user_essais_total'] ?> au total</p>
<div id="enigme">
	<div class="bg" style="background-image:url('<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_bg']?>');"><img class="creature" src="<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>"><br/>
		
    <canvas width='500px' height='500px' id="monCanvas"></canvas>
    <p class="#centrerlecontenues">
        <div id="enigme5bisreponse">

            <p id="premiereLettre">Vous a</p>
            <p id="deuxiemeLettre">rrivez d</p>
            <p id="troisiemeLettre">evant u</p>
            <p id="quatreiemLettre">ne p</p>
            <p id="cinquiemeLettre">orte f</p>
            <p id="sixiemeLettre">ermer à </p>
            <p id="septiemeLettre">" clée " !</p>
        </div>
    </p>
		<p class="txt style-1"><?php echo $profil[0]['enigme_txt']?></p>
			<form id="reponse" method="POST" action="<?php echo base_url(); ?>/Gamer/validReponse">
				<p style="margin-bottom: 0;" class="info last"><input type="text" name="reponse"><input type="submit" name="soumettre"></p>
			</form>
	</div>
</div>