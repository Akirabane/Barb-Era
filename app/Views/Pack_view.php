<h1>Le pack Barb'Era (carte + livre)</h1>

<div class="endroitProduit">

    <div class="Produitavendre">
    <img src="<?php echo base_url(); ?>/assets/produits/pack.png" alt="image du produit">

    <button class="open-button" onclick="openForm()"><strong>Ouvrir la forme</strong>

    <div class="form-popup" id="popup-Form">
      <form action="/action_page.php" class="form-container">
        <h2>Veuillez vous connecter</h2>
        <label for="email">
        <strong>E-mail</strong>
        </label>
        <input type="text" placeholder="Votre Email" name="email" required>
        <label for="psw">
        <strong>Mot de passe</strong>
        </label>
        <input type="password" placeholder="Votre mot de passe" name="psw" required>
        <button type="submit" class="btn">Se connecter</button>
        <button type="submit" class="btn cancel" onclick="closeForm()">Annuler</button>
      </form>
    </div>
    </div>

    <div class="informationDuProduitaVendre">

    </div>

</div>
