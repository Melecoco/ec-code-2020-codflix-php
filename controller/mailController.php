<?php 

//function not sending mail because no mail server are configurated
function sendMail(){

    if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    
    $error_msg = null;
      
    if(empty($name)){
        $error_msg =  "Le nom ne peut pas être vide";
     }
    elseif(empty($email)) {
        $error_msg =  "Le mail ne peut pas être vide";
     }
     elseif(empty($content)){
        $error_msg = "le corps du message ne peut pas être vide";
    }
    elseif(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
        $error_msg = "Le mail n'est pas valide";
    }
    else{
        $success_msg = "Le mail a bien été envoyé";
        $_POST['success_msg'] = $success_msg;

    }
    

    $mail = htmlentities(strtolower($email));

    $formcontent="From: $name \n Message: $message";
    $recipient = "contact@codflix.com";
    $subject = "Contact Form";
    $mailheader = "From: $email \r\n";
    $headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
    mail($recipient, $subject, $formcontent, $headers) or die("Error!");

    $_POST['error_msg'] = $error_msg;}
    require('view/contactUs.php');
}  
    
?>