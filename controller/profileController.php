<?php
require_once( 'model/user.php' );

function profilePage() {
  require('view/profileView.php');

};

function setNewEmail(){
  $user_id = $_SESSION['user_id'];
  $new_mail = $_POST['newMail'];

  if(empty($new_mail)){
    $err_msg = "Le champ est vide O_O";
  }
  else{
    User::updateUserEmail($user_id, $new_mail);
    $success_msg = "Le mail a été modifier";
  }

  if(isset($err_msg)){
    $_POST['err_mail'] = $err_msg;
  }
  if(isset($success_msg)){
    $_POST['success_mail'] = $success_msg;
  }
  require('view/profileView.php');
}

//hash('sha256') is used to cript the password
//validations and message for the user

function setNewPassword(){
  $user_id = $_SESSION['user_id'];
  
  $user = User::getUserById($user_id);
  $currentPassword = $user['password'];

  $oldPassword = $_POST['oldPassword'];
  $newPassword = $_POST['newPassword'];
  $confirmPassword = $_POST['confirmPassword'];

  $oldPasswordHASHED = hash('sha256', $oldPassword);

  if(empty($oldPassword) || empty($newPassword) || empty($confirmPassword)){

    $err_msg = "Au moins un champ est vide O_O";
  }
  elseif(!($oldPasswordHASHED === $currentPassword)){

    $err_msg = "Le mot de passe ne correspond pas avec l'ancien mot de passe";
  }  
  elseif(!($newPassword === $confirmPassword)){

    $err_msg = "Les nouveaux mots de passe ne correspondent pas";
  }
  else{

    User::updateUserPassword($user_id, $newPassword);
    $success_msg = "le mot de passe a été modifier";
  }

  if(isset($err_msg)){
    $_POST['err_password'] = $err_msg;
  }
  if(isset($success_msg)){
    $_POST['success_password'] = $success_msg;
  }

  require('view/profileView.php');
}
