<?php
include "connect.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";
    require "PHPMailer/Exception.php";
        $username = $_POST['username'];
        $newpassword = $_POST['newpassword'];
        $stmt = $pdo->prepare("UPDATE member SET Password = ? WHERE Username = ?");
        $stmt->bindParam(1, $newpassword);
        $stmt->bindParam(2, $username);
        $stmt->execute();

        header("location: index.php?login=1");
        $stmt = $pdo->prepare("SELECT Email FROM member WHERE Username = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $row = $stmt->fetch();
        $email = $row['Email'];
        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'STARTTLS'; // secure transfer enabled REQUIRED for Gmail
        $mail->CharSet = 'UTF-8';
        $mail->Host = "smtp-mail.outlook.com";
        $mail->Port = 587; // or 587
        $mail->IsHTML(true);
        $mail->Username = "owlsoftenterprise@hotmail.com";
        $mail->Password = "owl1234567890";
        $mail->SetFrom("owlsoftenterprise@hotmail.com");
        $mail->Subject = "ข้อความจากชุมชนคนรักสวยรักงาม";
        $mail->Body = "Password reset success";
        $mail->AddAddress($email);

        if(!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
                echo "Message has been sent";
        }
        
        
?>