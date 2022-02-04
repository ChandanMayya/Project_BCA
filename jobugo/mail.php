<?php

require 'PHPMailerAutoload.php';
include ("mailconst.php");

function mailer($mailid,$name,$sub,$bdy){
$mail = new PHPMailer;


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = from;                 // SMTP username
$mail->Password = pass;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('jobugo.online@gmail.com', 'Jobugo');
$mail->addAddress($mailid, $name);     // Add a recipient
$mail->addReplyTo('jobugo.online@gmail.com', 'Jobugo');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $sub;
$mail->Body    = $bdy;
$mail->AltBody = ' JOBUGO: This is an test mail sent from our Jobugo: The online job portal. This email is generated using an extension from GitHub: PHPMailer. It is very easy to install and use it. We can sent email to anyone from localhost using this extension. I am using the https://github.com/PHPMailer/PHPMailer/tree/5.2-stable PHPMailer 5.2.28 latest stable version from GitHub.';

if(!$mail->send()) {
    echo 'Message could not be sent. Please Check your Internet Connection..';
} 
}

?>