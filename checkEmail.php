<?php
    include "connect.php";
    
    $email = $_GET["email"];
    $stmt = $pdo->prepare("SELECT Email FROM member WHERE Email = ?");
    $stmt->bindParam(1, $email);
    $stmt->execute();
    if($row = $stmt->fetch()){
        echo "fail";
    }else{
        echo "pass";
    }
?>