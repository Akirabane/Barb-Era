<section class="container classement">

<h1 class="classement">Bienvenue <?php echo $profil[0]['user_prenom'].' '.$profil[0]['user_nom'] ?> alias <?php echo $profil[0]['user_pseudo']?></h1>

    <img class="gugus_vict" src="<?php echo base_url(); ?>/assets/photos/animation_v3.gif" alt="">

<h2 class="classement">Bravo, vous avez gagné !</h2>

<p class="classement">Voici quelques informations sur vos performances :</p>

<table style="margin-top: 60px" class="table table-hover table-borderless table-sm table-light border-dark info classement">
    <thead>
    <tr>
        <th scope="col">Place</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Enigme en cours</th>
        <th scope="col">Nombre d'essais total</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $numero = 1;
    foreach ( $lesjoueurs as $un):
        ?>
    <tr>
        <th scope="row"><?php echo $numero ?></th>
        <td><?php echo $un['user_pseudo'] ?></td>
        <td><?php echo $un['user_enigme'] ?></td>
        <td><?php echo $un['user_essais_total'] ?></td>
    </tr>
    <?php
    $numero ++;
    endforeach;
    ?>
    </tbody>
</table>




<p class="classement">Voici un code de réduction pour <a id="classe" href="<?php echo base_url(); ?>/Produits">notre boutique</a> : BARBARE2021</p>
  <div style="margin-bottom: 50px;">
    <a class="classement" href="<?php echo base_url(); ?>/Gamer/Concour">S'inscrire au concours !</a>
  </div>

</section>
