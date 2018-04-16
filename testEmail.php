<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer.php";
require "SMTP.php";

 $email= $_GET["email"];

$mail             = new PHPMailer(); //เรียกใช้งาน class phpmailer
$mail->CharSet = 'UTF-8';
$mail->IsSMTP(); // เปิดการใช้งาน SMTP
$mail->SMTPSecure = "ssl";
$mail->SMTPAuth   = true;                  // เปิดการใช้งานการตรวจสอบสิทธิ์
$mail->Host       = "smtp.gmail.com"; // เรียกใช้ SMTP server ของ Gmail
$mail->Port       = 465;                    // กำหนด SMTP port ของ Gmail server
$mail->Username   = "owlowleiei@gmail.com"; // E-mail account Gmail ของผู้ใช้
$mail->Password   = "owl123456789";        // Password ของ E-mail ที่ได้กำหนดไว้ข้างต้น
$mail->isHTML(true);
$mail->SetFrom('owlowleiei@gmail.com', 'First Last');  // กำหนด E-mail และชื่อผู้ส่ง
$mail->Subject    = "Owl Soft";  //กำหนดหัวเรื่อง
$mail->Body = "ข้อความจาก owl"; //กำหนดเนื้อหาข้อความภายใน E-mail
$mail->AddAddress($email); //กำหนด E-mail และชื่อของผู้รับ

if(!$mail->Send()) { //ดำเนินการส่งอีเมล์และตรวจสอบผลการทำงาน
  echo "Mailer Error: " . $mail->ErrorInfo; //แสดงข้อผิดพลาดของการทำงาน
} else {
  echo "Message sent!"; //แสดงผลการทำงานเมื่อดำเนินการสำเร็จ
}


?>