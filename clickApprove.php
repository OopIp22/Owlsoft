<?php
    include "connect.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";
    require "PHPMailer/Exception.php";

    $username = $_GET["username"];
    $email = $_GET["email"];
    $status = "member";
    $stmt = $pdo->prepare("UPDATE member SET Status = ? WHERE Username = ?");
    $stmt->bindParam(1, $status);
    $stmt->bindParam(2, $username);
    $stmt->execute();

    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'STARTTLS'; // secure transfer enabled REQUIRED for Gmail
    $mail->CharSet = 'UTF-8';
    $mail->Host = "smtp-mail.outlook.com";
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);
    $mail->Username = "owlsoft@hotmail.com";
    $mail->Password = "Owl12345";
    $mail->SetFrom("owlsoft@hotmail.com");
    $mail->Subject = "ข้อความจากชุมชนคนรักสวยรักงาม";
    $mail->Body = "Welcome to ชุมชนคนรักสวยรักงาม";
    $mail->AddAddress($email);

        if(!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
                echo "Message has been sent";
        }
   header("location: manageUser.php");
?>