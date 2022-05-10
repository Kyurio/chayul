<?php

require 'vendor/PHPMailer-master/src/Exception.php';
require 'vendor/PHPMailer-master/src/PHPMailer.php';
require 'vendor/PHPMailer-master/src/SMTP.php';
  //Luego tenemos que iniciar la validación por SMTP:
  $mail = new PHPMailer\PHPMailer\PHPMailer();

    //Server settings
    $mail->SMTPDebug = 4;                      //Enable verbose debug output
    $mail->isSMTP();   
        $mail->SMTPAuth   = true;   
        $mail->SMTPSecure = 'tls';
                                        //Send using SMTP
    $mail->Host       = 'mail.serviticket.cl';                     //Set the SMTP server to send through
                                //Enable SMTP authentication
    $mail->Username   = 'prueba@serviticket.cl';                     //SMTP username
    $mail->Password   = 's3rv1t1ck3t@';                               //SMTP password
    $mail->Port       = 465;                                   

    //Recipients
    $mail->setFrom('noreply@serviticket.cl', 'serviticket');
    $mail->addAddress('jcs.floresbarrera@gmail.com', 'asd');     //Add a recipient

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();



 ?>