<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Barb'Era</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles2.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles5.css" />
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>/assets/logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<script>

    $(document).ready(function(){
        //variable énigme 1 & 3
        $('#macible').hide();
        $('#macible1').hide();
        $('#mort2').hide();
        $('#grenouille').hide();
        $('#texteDuMort').hide();
        $('#creatureQuestion').hide();

        var x=250; var y=250; var vity=0; var vitx=4; var sauter=0; var oldsauter=0; var xobs=475; var yobs=200; var compteur=0; var aide=0;

        var canvas1 = document.getElementById('monCanvas');
        var context = canvas1.getContext('2d');

        $('#premiereLettre').hide();
        $('#deuxiemeLettre').hide();
        $('#troisiemeLettre').hide();
        $('#quatreiemLettre').hide();
        $('#cinquiemeLettre').hide();
        $('#sixiemeLettre').hide();
        $('#septiemeLettre').hide();

        
        context.fillStyle="blue";
        context.fillRect(0 , 0 , 500 , 500);

        var sci = new Image();
        sci.src = "<?php echo base_url(); ?>/assets/enigme7/barre.png";
        var sci2 = new Image();
        sci2.src = "<?php echo base_url(); ?>/assets/enigme7/barre.png";
        var obs = new Image();
        obs.src = "<?php echo base_url(); ?>/assets/enigme7/obstacle.png";

        var ballon = new Image();
        ballon.src = "<?php echo base_url(); ?>/assets/enigme7/ballon.png";

        var fond = new Image();
        fond.src = "<?php echo base_url(); ?>/assets/enigme7/fond.png";
        //ballon
        var x_b = 250
        var y_b = 250
        var vitx = 4

        // sci
        var x_s1 = 0
        var y_s1 = -25
        var x_s2 = 0
        var y_s2 = 475

        var x_o = 470
        var y_o = 250

        var bw=30
        var bh=40
        var ow=48
        var oh=89

        context.drawImage(fond, 0, 0);
        context.drawImage(sci, x_s1, y_s1);
        context.drawImage(sci, x_s2, y_s2);
        context.drawImage(ballon, x_b, y_b);
        context.drawImage(obs, x_o, y_o);
        
        $('body').keydown(function(ev){
            if(ev.keyCode == 74) sauter=1 ;
        });
        
        $('body').keyup(function(ev){
            if(ev.keyCode == 74) {sauter=0;oldsauter=0} ;
        });

        $('body').keydown(function(ev){
            if(ev.keyCode == 187 && aide!=1) {compteur+=10; aide+=1}
        });

        $('body').keydown(function(ev){
            if(ev.keyCode == 74 && aide==1 && compteur==20) { aide-=1}
        });

        $('body').keydown(function(ev){
            if(ev.keyCode == 74 && aide==1 && compteur==40) { aide-=1}
        });

        $('body').keydown(function(ev){
            if(ev.keyCode == 74 && aide==1 && compteur==60) { aide-=1}
        });

        
        $('body').keydown(function(ev){
            if(ev.keyCode == 82 && compteur>=70) {
                $("#premiereLettre").show();
                $("#deuxiemeLettre").show();
                $("#troisiemeLettre").show();
                $("#quatreiemLettre").show();
                $("#cinquiemeLettre").show();
                $("#sixiemeLettre").show();
                $("#septiemeLettre").show();}
        });
        

        var montimer = setInterval(function()
            {
                if( sauter == 1 && oldsauter == 0 ) { oldsauter=1 ; vity-=4; }

                vity += 0.05
                y_b += vity
                    if ((y_b > 470) || (y_b < 0)){vity *= -0.8
                    compteur=0;aide=0}

                x_b += vitx
                    if ((x_b>470) || (x_b<0)) {
                        vitx *= -1
                        compteur++
                        if (vitx>0) {x_o = 475} else {x_o = -25}
                        y_o =Math.round(Math.random()*460+20)
                    }
                    
                if((y_b+bh/2 < y_o+oh) && (y_b+bh/2 > y_o) && ((x_b+bw/2 < x_o+ow) && (x_b+bw/2 > x_o) )) {
                    compteur = 0;
                    aide = 0;
                    vitx*=-1
                    //clearInterval(montimer)
                }
                    

                    //context.fillStyle="#7EBF1E"

                    context.fillRect(0 , 0 , 500 , 500)
                    context.drawImage(fond, 0, 0);
                    context.fillStyle="white";
                    context.font="24px sans-serif"
                    context.fillText("score : "+compteur, 20, 40)

                    context.drawImage(sci, x_s1, y_s1);
                    context.drawImage(sci, x_s2, y_s2);
                    context.drawImage(ballon, x_b, y_b);
                    context.drawImage(obs, x_o, y_o);
            }, 25 );
            
        //fonction énigme 3
        $("#mort").click(function(){
            $("#mort2").toggle();
            $("#mort").toggle();
            $("#creatureN3").toggle();
            $("#texteDuMort").toggle();
            $("#jénérale").toggle();
        })
        $("#mort2").click(function(){
            $("#mort").toggle();
            $("#mort2").toggle();
            $("#texteDuMort").toggle();
            $("#jénérale").toggle();
            $("#creatureN3").toggle();
        })

        $("#creatureN3").click(function(){
            $("#mort").toggle();
            $("#jénérale").toggle();
            $("#creatureN3").toggle();
            $('#grenouille').toggle();
            $("#creatureQuestion").toggle();
        })

    });
</script>

<body>
    <header>
        <div id="ban"></div>
        <nav>
           <ul>
            <li><a href="<?php echo base_url(); ?>">Accueil</a></li>
            
            <li><a href="<?php echo base_url(); ?>/Produits">Boutique</a></li>

            <li><a href="<?php echo base_url(); ?>/Gestion">Back-Office</a></li>
            
            <?php if($connecte==0): ?>
                <li><a href="<?php echo base_url(); ?>/Gamer">Connexion</a></li>
            <?php else: ?>
                <li><a href="<?php echo base_url(); ?>/Gamer">Déconnexion</a></li>
                <li><a href="<?php echo base_url(); ?>/Chat">Chat</a></li>
                <li><a href="<?php echo base_url(); ?>/Gamer/Profil">Profil</a></li>
                <li><a id="profil" href="<?php echo base_url(); ?>/Gamer/AccueilGamer">Jouer</a></li>
            <?php endif ?>
        </ul> 
    </nav>
</header>