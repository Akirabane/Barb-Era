<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Barb'Era</title>
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>/assets/logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles.css">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
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
                <li><a href="<?php echo base_url(); ?>/Gamer/Profil">Profil</a></li>
                <li><a id="profil" href="<?php echo base_url(); ?>/Gamer/AccueilGamer">Jouer</a></li>
            <?php endif ?>
        </ul> 
    </nav>
</header>