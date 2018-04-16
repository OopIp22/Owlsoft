<?php
    include "connect.php";
    $ans1 = $_GET["ans1"];
    $username = $_GET["username"];
    $stmt = $pdo->prepare("SELECT Ans1 FROM member WHERE Username = ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $row = $stmt->fetch();
    
    if($row["Ans1"] == $ans1){
       echo 1;
       
    }else{
        echo 0;
    }
?>