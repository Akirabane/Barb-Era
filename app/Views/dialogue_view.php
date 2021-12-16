<div id="enigme">
	<div class="bg" style="background-image:url('<?php echo base_url(); ?>/assets/photos/dialogues/<?php echo $profil[0]['dialogue_bg']?>');"><img class="creature" src="<?php echo base_url(); ?>/assets/photos/dialogues/<?php echo $profil[0]['dialogue_creature']?>"><br/>

        <p class="txt txt2 style-1"><?php echo $profil[0]['dialogue_txt']?></p><form id="reponse2" method="POST" action="<?php echo base_url(); ?>/Gamer/validDialogue">
			<p style="margin-bottom: 0;" class="info last"><input type="submit" name="soumettre" value="OK"></p>
		</form>
      
</div>
</div>