<h1>Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?></h1>
<p class="info2">Vous êtes à l'énigme <?php echo $profil[0]['user_enigme'] ?></p>
<p class="info2">Vous avez déjà fait <?php echo $profil[0]['user_essais'] ?> essais, <?php echo $profil[0]['user_essais_total'] ?> au total</p>
<div id="enigme">
    <div class="bg" style="background-image:url('<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_bg']?>');">
        <img class="creature" src="<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>"><br/>
        <img id="trappecadenas" src="<?php echo base_url(); ?>/assets/enigme5/trappe_cadenas.png"><br/>
        <img id="trappeferme" src="<?php echo base_url(); ?>/assets/enigme5/trappe_ferme.png"><br/>
        <img id="trappeouverte" src="<?php echo base_url(); ?>/assets/enigme5/trappe_ouverte.png"><br/>
        <img id="tonneaugauche" src="<?php echo base_url(); ?>/assets/enigme5/tonneaugauche.png"><br/>
        <img id="tonneaudroite" src="<?php echo base_url(); ?>/assets/enigme5/tonneaudroite.png"><br/>
        <p class="txt style-1"><?php echo $profil[0]['enigme_txt']?>
        <form id="reponse" class="zindex" method="POST" action="<?php echo base_url(); ?>/Gamer/validReponse">
            <p class="info last"><input type="text" name="reponse"><input type="submit" name="soumettre"></p>
        </form>
    </p>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        var gauche; var droite;
        $("#trappeouverte").hide();
        $("#trappeferme").hide();
        $("#reponse").css('z-index', -2);


        $("#tonneaugauche").draggable({
            stop: function(e, ui){
                console.log(Math.abs(ui.position.top))
                console.log(Math.abs(ui.position.left))
                if ($( window ).width()>1700) {
                    if(Math.abs(ui.position.top)>1260 && Math.abs(ui.position.top)<1490 && Math.abs(ui.position.left)>745 && Math.abs(ui.position.left)<1100){
                        gauche=0;
                    }else{
                        gauche=1;
                        if(gauche==1 && droite==1) {
                            $("#reponse").css('z-index', 2);
                        }
                    }
                }
                if ($( window ).width()>=1500 && $( window ).width()<=1700) {
                    if(Math.abs(ui.position.top)>1115 && Math.abs(ui.position.top)<1310 && Math.abs(ui.position.left)>635 && Math.abs(ui.position.left)<945){
                        gauche=0;
                    }else{
                        gauche=1;
                        if(gauche==1 && droite==1) {
                            $("#reponse").css('z-index', 2);
                        }
                    }
                }
                if ($( window ).width()<1500) {
                    if(Math.abs(ui.position.top)>1004 && Math.abs(ui.position.top)<1180 && Math.abs(ui.position.left)>530 && Math.abs(ui.position.left)<820){
                        gauche=0;
                    }else{
                        gauche=1;
                        if(gauche==1 && droite==1) {
                            $("#reponse").css('z-index', 2);
                        }
                    }
                }
            }
        })

        $("#tonneaudroite").draggable({
            stop: function(e, ui){
                console.log(Math.abs(ui.position.top))
                console.log(Math.abs(ui.position.left))
                if ($( window ).width()>1700) {
                    if(Math.abs(ui.position.top)>1260 && Math.abs(ui.position.top)<1490 && Math.abs(ui.position.left)>745 && Math.abs(ui.position.left)<1100){
                        droite=0;
                    }else{
                        droite=1;
                        if(gauche==1 && droite==1) {
                            $("#reponse").css('z-index', 2);
                        }
                    }
                }
                if ($( window ).width()>=1500 && $( window ).width()<=1700) {
                    if(Math.abs(ui.position.top)>1115 && Math.abs(ui.position.top)<1310 && Math.abs(ui.position.left)>635 && Math.abs(ui.position.left)<945){
                        droite=0;
                    }else{
                        droite=1;
                        if(gauche==1 && droite==1) {
                            $("#reponse").css('z-index', 2);
                        }
                    }
                }
                if ($( window ).width()<1500) {
                    if(Math.abs(ui.position.top)>1004 && Math.abs(ui.position.top)<1180 && Math.abs(ui.position.left)>530 && Math.abs(ui.position.left)<820){
                        droite=0;
                    }else{
                        droite=1;
                        if(gauche==1 && droite==1) {
                            $("#reponse").css('z-index', 2);
                        }
                    }
                }
            }
        })
    })
</script>