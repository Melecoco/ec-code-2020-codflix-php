<?php 
function sendMail(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $formcontent="From: $name \n Message: $message";
    $recipient = "melec.duhalgouet@itescia.fr";
    $subject = "Contact Form";
    $mailheader = "From: $email \r\n";
    $headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
    mail($recipient, $subject, $formcontent, $headers) or die("Error!");
    echo "Thank You!";

    require('view/contactUs.php');
}

    
?>