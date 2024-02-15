<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

class email{
    function sendemail($receiver,$subject,$body){  // receiver mail, subject, body 
        //Create an instance; passing `true` enables exceptions   
        $mail = new PHPMailer(true);

        try {
            // Server settingss
            // $mail->SMTPDebug  = SMTP::DEBUG_SERVER;             //Enable verbose debug output
            $mail->isSMTP();                                   //Send using SMTP
            $mail->Host       = "mail.visionizex.tech";
            $mail->SMTPAuth   = true;                          //Enable SMTP authentication
            $mail->Username   = 'kaushikramanuj123@visionizex.tech';       //SMTP username
            $mail->Password   = '=@t-tsjGp*S(';                            //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
            $mail->Port       = 465;

            // $mail->Password   = '3Q=agFkzU(aV';                         //SMTP password
            // $mail->SMTPSecure   = "tls";
            
            //Recipients
            // $mail->setFrom('filmybits01@gmail.com', 'mailer kaushik');
            $mail->setFrom('kaushikramanuj123@visionizex.tech', 'mailer kaushik');
            $mail->addAddress($receiver, 'Receaver name');                //Add a recipient
            // $mail->addAddress('kaushikramanuj01@gmail.com', 'Receaver vivek');     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
        
            $mail->send();
            return 'Message has been sent';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}

?>