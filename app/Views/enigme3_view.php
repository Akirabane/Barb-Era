<h1>Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?></h1>
<p class="info2">Vous êtes à l'énigme <?php echo $profil[0]['user_enigme'] ?></p>
<p class="info2">Vous avez déjà fait <?php echo $profil[0]['user_essais'] ?> essais, <?php echo $profil[0]['user_essais_total'] ?> au total</p>
<div id="enigme">
	<div class="bg" style="background-image:url('<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_bg']?>');"><img class="creature" id="creatureN3"src="<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>"><br/>

	<img id="mort" src="<?php echo base_url(); ?>/assets/enigme3/mort.png" alt="bouton">
	<img id="mort2" src="<?php echo base_url(); ?>/assets/enigme3/mort.png" alt="bouton">
	<img id="grenouille" src="<?php echo base_url(); ?>/assets/enigme3/crea3.png" alt="bouton">
		
				
				
		<p class="txt style-1"id="jénérale" ><?php echo $profil[0]['enigme_txt']?><p><p class="txt style-1"id="texteDuMort">L'humain ne répond pas, il doit être mort !</p><p class="txt style-1" id="creatureQuestion">Sais-tu combien de personne ont périt sur ce pont ? </p>
			<form id="reponse" method="POST" action="<?php echo base_url(); ?>/Gamer/validReponse">
				<p style="margin-bottom: 0;" class="info last"><input type="text" id="wala"name="reponse"><input type="submit" id="wola"name="soumettre"></p>
			</form>
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#wola').hide();
		$('#wala').hide();
		$('#mort2').hide();
        $('#grenouille').hide();
        $('#texteDuMort').hide();
        $('#creatureQuestion').hide();

		//fonction énigme 3
        $("#mort").click(function(){
            $("#mort2").toggle();
            $("#mort").toggle();
			$('#jénéral').toggle();
            $("#creatureN3").toggle();
            $("#texteDuMort").toggle();

            $("#jénérale").toggle();
            
            
        })
        $("#mort2").click(function(){
            $("#mort").toggle();
            $("#mort2").toggle();
			$('#jénéral').toggle();
            $("#texteDuMort").toggle();
            $("#creatureN3").toggle();
            $("#jénérale").toggle();
        })

        $("#creatureN3").click(function(){
			$("#wola").toggle();
			$("#wala").toggle();
            $("#mort").toggle();
            $("#creatureN3").toggle();
            $('#grenouille').toggle();
            $("#creatureQuestion").toggle();
            $("#jénérale").toggle();
        })
		
	})
</script>