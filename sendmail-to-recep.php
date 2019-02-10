<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function GoEmail ($emails=array('info@prosperosirus.com'),$msg=array('Testting email sending from this service!'),$Topic='Company XYZ') {

//print_r($msg);

require 'cc/correo/src/Exception.php';
require 'cc/correo/src/PHPMailer.php';
require 'cc/correo/src/SMTP.php';

//$message = array();
$mail = new PHPMailer(true);

for ($i=0;$i<sizeof($emails);$i++) {

// Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;
    $mail->CharSet = 'UTF-8';                                 // Display better Latin Chars
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'youremailserver.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'yourserviceemail';                 // SMTP username
    $mail->Password = 'thatemailpasspword';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('companyxyzemail@server.com', 'A text to identify the email');
    $mail->addAddress($emails[$i]);     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('companyxyzreplyemail@server.com', 'Company XYZ - INFORMACION');
    $mail->addBCC('info@prosperosirus.com');


    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'A prospect from the Website of '.$Topic;
    $mail->Body    = $msg[$i];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $IsSent = "Email sent. Thank you";
    return $IsSent;

  } catch (Exception $e) {
    echo 'We could not send the email because: ', $mail->ErrorInfo;
   }

 }



}

//GoEmail();


?>