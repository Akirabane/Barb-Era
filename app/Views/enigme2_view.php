<h1>Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?></h1>
<p class="info2">Vous êtes à l'énigme <?php echo $profil[0]['user_enigme'] ?></p>
<p class="info2">Vous avez déjà fait <?php echo $profil[0]['user_essais'] ?> essais, <?php echo $profil[0]['user_essais_total'] ?> au total</p>
<div id="enigme">
    <div class="bg bg2" style="background-image:url('<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_bg']?>');">
        <img class="creature creature2" src="<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>"><br/>
        <img id="epee" style="z-index: 2;transform: rotate(220deg); width: 30px;left: -14px;
    top: 247px;" src="<?php echo base_url(); ?>/assets/enigme2/epee.png"><br/>
        <p class="txt"id="style-1"><?php echo $profil[0]['enigme_txt']?></p>

        <form id="reponse" style="visibility: hidden" class="reponse2" method="POST" action="<?php echo base_url(); ?>/Gamer/validReponse">
            <p class="info last"><input type="text" name="reponse"><input id="submit_e3" type="submit" name="soumettre"></p>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $("#epee").draggable({
            stop: function(e, ui){
                console.log(Math.abs(ui.position.top))
                console.log(Math.abs(ui.position.left))
                if(Math.abs(ui.position.top)>140 && Math.abs(ui.position.top)<290 && Math.abs(ui.position.left)>0 && Math.abs(ui.position.left)<100){
                    console.log("yes");
                    go = document.getElementById("reponse");
                    go.style.visibility = 'visible';
                }
            }
        })
    })
</script>