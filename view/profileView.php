<?php ob_start(); ?>

<?php

//delete this
include("../model/database.php");
?>

<div class="row">
    <div class="col-md-6 d-flex p-1">
       
            <button class="btn btn-block filterType-btn m-1 m-2">Séries</button>
            <button class="btn btn-block filterType-btn m-1  m-2">Films</button>
        
    </div>

    <div class="col-md-6 p-1">
        <form method="get">
            <div class="form-group has-btn m-2">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>

<div class="media-list justify-content-around mt-4">
<div class="landscape">
  <div class="bg-black">
    <div class="row no-gutters">
      <div class="full-height bg-white">
        <div class="auth-container">
          <h2><span>Cod</span>'Flix</h2>
          <h3>Connexion</h3>

          <form method="post" action="index.php?action=login" class="custom-form">

            <div class="form-group">
              <label for="email">Adresse email</label>
              <input type="email" name="email" value="" id="email" class="form-control" />
            </div>

            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="password" name="password" id="password" class="form-control" />
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <input type="submit" name="Valider" class="btn btn-block bg-red" />
                </div>
                <div class="col-md-6">
                  <a href="index.php?action=signup" class="btn btn-block bg-blue">Inscription</a>
                </div>
              </div>
            </div>

            <span class="error-msg">
              <?= isset( $error_msg ) ? $error_msg : null; ?>
            </span>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
