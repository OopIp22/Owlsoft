<?php
    include "connect.php";
    $username = $_GET["username"];
    $status = "member";
    if($username == null){
        echo "blank";
    }else{
    $stmt = $pdo->prepare("SELECT Username FROM member WHERE Username = ? AND Status = ?");
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $status);
    $stmt->execute();
    if($row = $stmt->fetch()){
        echo "pass";
    }else{
        echo "fail";
    }
    }
?>