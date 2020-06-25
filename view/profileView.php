<?php ob_start(); ?>
 
<?php
 require_once( 'model/user.php' );
include("../model/database.php");
$user_id = $_SESSION['user_id'];
$userId = $_POST['userId'];

$user_data = User::getUserById($user_id);

//var_dump($user_data);
$user_mail = $user_data["email"];

$error_msg = $_POST['err_password'];
$success_msg = $_POST['success_password'];

$error_mail = $_POST['err_mail'];
$success_mail = $_POST['success_mail'];
?>

<div class="row">
  <div class="auth-container"><h2>votre em<span>'ail : <?php echo $user_mail ?><span></h2></div>
</div>

<div class="media-list justify-content-around mt-4">
        <div class="col-6">
        <form method="post" action="index.php?action=newMail" class="custom-form m-3">

          <div class="form-group">
            <label for="newMail">Nouvelle adresse mail</label>
            <input type="email" name="newMail" id="newMail" class="form-control" />
          </div>

          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <input type="submit" name="Valider" class="btn btn-block bg-red" />
              </div>
            </div>
          </div>
          <span class="error-msg">
            <?= isset( $error_mail ) ? $error_mail : null; ?>
          </span>
          <span class="success-msg">
            <?= isset( $success_mail ) ? $success_mail : null; ?>
          </span>
        </form>
      </div>
      <div class="col-6">
        <form method="post" action="index.php?action=newPassword" class="custom-form m-3">

          <div class="form-group">
            <label for="oldPassword">Ancien mot de passe</label>
            <input type="password" name="oldPassword" value="" id="oldPassword" class="form-control" />
          </div>

          <div class="form-group">
            <label for="newPassword">Nouveau mot de passe</label>
            <input type="password" name="newPassword" id="newPassword" class="form-control" />
          </div>

          <div class="form-group">
            <label for="confirmPassword">confirmer nouveau mot de passe</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" />
          </div>

          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <input type="submit" name="Valider" class="btn btn-block bg-red" />
              </div>
            </div>
          </div>
          <span class="error-msg">
            <?= isset( $error_msg ) ? $error_msg : null; ?>
          </span>



          <span class="success-msg">
            <?= isset( $success_msg ) ? $success_msg : null; ?>
          </span>
        </form>
</div>

        </div>

</div>

</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>

