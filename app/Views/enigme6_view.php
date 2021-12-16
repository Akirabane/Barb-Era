<h1>Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?></h1>
<p class="info2">Vous êtes à l'énigme <?php echo $profil[0]['user_enigme'] ?></p>
<p class="info2">Vous avez déjà fait <?php echo $profil[0]['user_essais'] ?> essais, <?php echo $profil[0]['user_essais_total'] ?> au total</p>
<div id="enigme">
    <div class="bg" style="background-image:url('<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_bg']?>');">
        <img class="creature creature2" src="<?php echo base_url(); ?>/assets/photos/enigmes/<?php echo $profil[0]['enigme_creature']?>"><br/>
        <img id="carte" style="width: 5%;left: 467px;top: 853px;position: absolute;"  src="<?php echo base_url(); ?>/assets/enigme6/carte-a.png"><br/>
        <img id="carte2" style="width: 5%;left: 562px;top: 1014px;position: absolute;" src="<?php echo base_url(); ?>/assets/enigme6/carte-e.png"><br/>
        <img id="carte3" style="width: 5%;left: 652px;top: 842px;position: absolute;" src="<?php echo base_url(); ?>/assets/enigme6/carte-e2.png"><br/>
        <img id="carte4" style="width: 5%;left: 801px;top: 921px;position: absolute;" src="<?php echo base_url(); ?>/assets/enigme6/carte-f.png"><br/>
        <img id="carte5" style="width: 5%;left: 734px;top: 1082px;position: absolute;" src="<?php echo base_url(); ?>/assets/enigme6/carte-h.png"><br/>
        <img id="carte6" style="width: 5%;left: 957px;top: 1072px;position: absolute;" src="<?php echo base_url(); ?>/assets/enigme6/carte-p.png"><br/>
        <img id="carte7" style="width: 5%;left: 1050px;top: 935px;position: absolute;" src="<?php echo base_url(); ?>/assets/enigme6/carte-t.png"><br/>
        <img id="carte8" style="width: 5%;left: 1310px;top: 917px;position: absolute;" src="<?php echo base_url(); ?>/assets/enigme6/carte-v.png"><br/>
        <img id="carte9" style="width: 5%;left: 1166px;top: 1040px;position: absolute;" src="<?php echo base_url(); ?>/assets/enigme6/carte-y.png"><br/>
        <p class="txt style-1"><?php echo $profil[0]['enigme_txt']?></p>
        <form id="reponse" method="POST" action="<?php echo base_url(); ?>/Gamer/validReponse">
            <p style="margin-bottom: 0;" class="info last"><input type="text" name="reponse"><input type="submit" name="soumettre"></p>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $("#carte").draggable({
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
        $("#carte2").draggable({
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
        $("#carte3").draggable({
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
        $("#carte4").draggable({
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
        $("#carte5").draggable({
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
        $("#carte6").draggable({
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
        $("#carte7").draggable({
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
        $("#carte8").draggable({
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
        $("#carte9").draggable({
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