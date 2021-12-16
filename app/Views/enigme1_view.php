<h1>Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?></h1>
<p class="info2">Vous êtes à l'énigme <?php echo $profil[0]['user_enigme'] ?></p>
<p class="info2">Vous avez déjà fait <?php echo $profil[0]['user_essais'] ?> essais, <?php echo $profil[0]['user_essais_total'] ?> au total</p>
<div id="enigme">
	<div class="bg" style="background-image:url('<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_bg']?>');"><img class="creature" src="<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>"><br/>
		
				<img id="monbouton" src="<?php echo base_url(); ?>/assets/enigme1/Note-1.png" alt="bouton">
                <img id="macible" src="<?php echo base_url(); ?>/assets/enigme1/Note-1.png" alt="bouton">
                <img id="monbouton1" src="<?php echo base_url(); ?>/assets/enigme1/Note-2.png" alt="bouton">
                <img id="macible1" src="<?php echo base_url(); ?>/assets/enigme1/Note-2.png" alt="bouton">
				
		<p class="txt style-1"><?php echo $profil[0]['enigme_txt']?></p>
			<form id="reponse" method="POST" action="<?php echo base_url(); ?>/Gamer/validReponse">
				<p style="margin-bottom: 0;" class="info last"><input type="text" name="reponse"><input type="submit" name="soumettre"></p>
			</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#macible').hide();
        $('#macible1').hide();

		//fonction énigme 1
        $("#monbouton").click(function(){
            $("#macible").toggle();
            $("#monbouton").toggle();
        })
        $("#macible").click(function(){
            $("#monbouton").toggle();
            $("#macible").toggle();
        })

        $("#monbouton1").click(function(){
            $("#macible1").toggle();
            $("#monbouton1").toggle();
        })

        $("#macible1").click(function(){
            $("#monbouton1").toggle();
            $("#macible1").toggle();
        })
		
	})
</script>