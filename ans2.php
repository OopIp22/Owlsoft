<?php
    include "connect.php";
    $ans2 = $_GET["ans2"];
    $username = $_GET["username"];
    $stmt = $pdo->prepare("SELECT Ans2 FROM member WHERE Username = ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $row = $stmt->fetch();
    
    if($row["Ans2"] == $ans2){
       echo 1;
       
    }else{
        echo 0;
    }
?>