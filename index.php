<?php

require_once( 'controller/homeController.php' );
require_once( 'controller/loginController.php' );
require_once( 'controller/signupController.php' );
require_once( 'controller/mediaController.php' );
require_once('controller/mailController.php');
require_once('controller/profileController.php');


/**************************
* ----- HANDLE ACTION -----
***************************/

if ( isset( $_GET['action'] ) ):

  switch( $_GET['action']):

    case 'login':

      if ( !empty( $_POST ) ) login( $_POST );
      else loginPage();

    break;

    case 'signup':

      signupPage();

    break;

    case 'profile':

      profilePage();
    
    break;

    case 'logout':

      logout();

    break;

    case 'contact':

      sendMail();

    break;

    case 'newPassword':

      setNewPassword();

    break;
    case 'newMail':

      setNewEmail();

    break;

    case 'mediaListDisplayer':
      mediaListDisplayer();

    break;

  endswitch;

else:

  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( $user_id ):
    mediaPage();
  else:
    homePage();
  endif;

endif;
