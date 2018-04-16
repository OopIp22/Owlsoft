<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";
    require "PHPMailer/Exception.php";
    $email = "oopoip1394@gmail.com";
    
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'STARTTLS'; // secure transfer enabled REQUIRED for Gmail
    $mail->CHARSET = "UTF-8";
    $mail->Host = "smtp-mail.outlook.com";
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);
    $mail->Username = "owlsoftenterprise@hotmail.com";
    $mail->Password = "owl1234567890";
    $mail->SetFrom("owlsoftenterprise@hotmail.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress($email);

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
?>