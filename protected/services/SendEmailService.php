<?php

require_once (Yii::app()->basePath .'\vendor\PHPMailer\src\Exception.php');
require_once (Yii::app()->basePath .'\vendor\PHPMailer\src\PHPMailer.php');
require_once (Yii::app()->basePath .'\vendor\PHPMailer\src\SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class SendEmailService
{


    public function Send($nombre,$apellido,$email,$mensaje){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'programacionweb3@gmail.com';                 // SMTP username
            $mail->Password = 'Montoto123';                           // SMTP password
          /*  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted */
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('dcastellini89@gmail.com', 'Joe User');     // Add a recipient
      /*      $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com'); */

            //Attachments
          /*  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name */

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
	
}
