<h1>Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?></h1>
<p class="info2">Vous êtes à l'énigme <?php echo $profil[0]['user_enigme'] ?></p>
<p class="info2">Vous avez déjà fait <?php echo $profil[0]['user_essais'] ?> essais, <?php echo $profil[0]['user_essais_total'] ?> au total</p>
<div id="enigme">
	<div class="bg" style="background-image:url('<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_bg']?>');"><img class="creature" src="<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>" id="creature">
		<div id="pfc_div">
			<button id="pfc_1" class="pfc"><img src="<?php echo base_url(); ?>/assets/enigme4/pierre.png" alt="pierre" class="pfc_icons"></button>
			<button id="pfc_2" class="pfc"><img src="<?php echo base_url(); ?>/assets/enigme4/feuille.png" alt="feuille" class="pfc_icons"></button>
			<button id="pfc_3" class="pfc"><img src="<?php echo base_url(); ?>/assets/enigme4/ciseau.png" alt="ciseau" class="pfc_icons"></button>
		</div>

		<p class="txt"><?php echo $profil[0]['enigme_txt']?></p>
		<form id="reponse" method="POST" action="<?php echo base_url(); ?>/Gamer/validReponse">
			<p class="info last"><input type="text" name="reponse"><input type="submit" name="soumettre"></p>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var choix; var win; var pierre; var feuille; var ciseau; var rand; var champipierre; var champifeuille; var champiciseau;
		$(".txt").hide();
		$("#reponse").hide();
		preload([
	    '<?php echo base_url(); ?>/assets/enigme4/champipierre.gif',
	    '<?php echo base_url(); ?>/assets/enigme4/champifeuille.gif',
	    '<?php echo base_url(); ?>/assets/enigme4/champiciseau.gif'
		]);

		var intervalId = window.setInterval(function(){
			pfc();
		}, 3000);

		if(win==1) {
			clearInterval(intervalId);
		}

		$("#pfc_1").click(function(){
			choix=1;
			pierre=1;
			feuille=0;
			ciseau=0;
		})
		$("#pfc_2").click(function(){
			choix=1;
			pierre=0;
			feuille=1;
			ciseau=0;
		})
		$("#pfc_3").click(function(){
			choix=1;
			pierre=0;
			feuille=0;
			ciseau=1;
		})

		function pfc() {
			rand=Math.floor(Math.random() * 29);
			if (rand>=0 && rand<10 && choix==1) {
				champipierre=1;
				$('#creature').attr('src','<?php echo base_url(); ?>/assets/enigme4/champipierre.gif');
				if (feuille==1) {
					$("#pfc_1").hide();
					$("#pfc_2").hide();
					$("#pfc_3").hide();
					$(".txt").show();
					$("#reponse").show();
					win=1;
					choix=0;
				} else {
					choix=0;
					setTimeout(function(){ $('#creature').attr('src','<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>');}, 4000);
				}
			}
			if (rand>=10 && rand<20 && choix==1) {
				champifeuille=1;
				$('#creature').attr('src','<?php echo base_url(); ?>/assets/enigme4/champifeuille.gif');
				if (ciseau==1) {
					$("#pfc_1").hide();
					$("#pfc_2").hide();
					$("#pfc_3").hide();
					$(".txt").show();
					$("#reponse").show();
					win=1;
					choix=0;
				} else {
					choix=0;
					setTimeout(function(){ $('#creature').attr('src','<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>'); }, 4000);
				}
			}
			if (rand>=20 && rand<=30 && choix==1) {
				champiciseau=1;
				$('#creature').attr('src','<?php echo base_url(); ?>/assets/enigme4/champiciseau.gif');
				if (pierre==1) {
					$("#pfc_1").hide();
					$("#pfc_2").hide();
					$("#pfc_3").hide();
					$(".txt").show();
					$("#reponse").show();
					win=1;
					choix=0;
				} else {
					choix=0;
					setTimeout(function(){ $('#creature').attr('src','<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>');}, 4000);
				}
			}
		}

		function preload(arrayOfImages) {
			$(arrayOfImages).each(function(){
				$('<img/>')[0].src = this;
    		});
		}
	})
</script>