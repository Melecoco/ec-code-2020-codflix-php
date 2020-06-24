<?php ob_start(); 
$error_msg = $_POST['error_msg'];
$success_msg = $_POST['success_msg'];

?>

<div class="landscape">
  <div class="bg-black">
    <div class="row no-gutters">
      <div class="col-md-6 full-height bg-white">
        <div class="auth-container">
          <a href=index.php> <h2><span>Cod</span>'Flix</h2></a>
          <h3>Nous Contacter</h3>

          <form method="post" action="index.php?action=contact" class="custom-form">

            <div class="form-group">
              <label for="name">Your name</label>
              <input type="text" name="name" value="" id="name" class="form-control" />
            </div>

            <div class="form-group">
              <label for="email">Your email</label>
              <input type="email" name="email" id="email" class="form-control" />
            </div>

            <div class="form-group">
              <label for="comment">Message</label>
              <textarea class="form-control" name="content" rows="5" id="content"></textarea>
            </div>

            <div class="form-group">
              <div class="row d-flex justify-content-center">               
                  <button type="submit" class="btn bg-red">Send</button>
            </div>
          </div>

            <span class="error-msg">
              <?= isset( $error_msg ) ? $error_msg : null; ?>
            </span>
            <span class="success-msg">
              <?= isset($success_msg) ? $success_msg : null; ?>
            </span>
            
          </form>
          <div class="d-flex justify-content-center">
          <button class="btn bg-red" onclick="location.href='index.php'">Revenir à la page précédente</button>
          </div>    
          
        </div>
      </div>
      <div class="col-md-6 full-height">
        <div class="auth-container">
          <h1>Contact</h1>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require( 'view/base.php' ); ?>