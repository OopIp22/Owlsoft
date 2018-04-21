<?php
include "connect.php";

try{
    $username = $_POST['username'];
    $status = "disapproved";
    
    if($_FILES){
        $filessn = "SSN_".$username;
        $img = "SSN_".$username.".jpg";
        $tmp = $_FILES["SSNimage"]["tmp_name"];
        move_uploaded_file($tmp, "SSN_img/".$img);
    }else{
        echo "cant upload";
    }
	
    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["ssn"]);
    $stmt->bindParam(2, $_POST["name"]);
    $stmt->bindParam(3, $_POST["username"]);
    $stmt->bindParam(4, $_POST["password"]);
    $stmt->bindParam(5, $_POST["Birthdate"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->bindParam(7, $status);
    $stmt->bindParam(8, $_POST["Q1"]);
    $stmt->bindParam(9, $_POST["Q2"]);
    $stmt->bindParam(10, $_POST["Q3"]);
    $stmt->bindParam(11, $_POST["Ans1"]);
    $stmt->bindParam(12, $_POST["Ans2"]);
    $stmt->bindParam(13, $_POST["Ans3"]);
    $stmt->bindParam(14, $filessn);
    $stmt->execute();
     header("location: successRegis.php");
    
}catch(Exception $e){
    header("location : register.php");
    echo "<script> alert('ข้อมูลไม่ถูกต้อง');</script>";
     
}
?>