<?php
    include "connect.php";
    $ans3 = $_GET["ans3"];
    $username = $_GET["username"];
    $stmt = $pdo->prepare("SELECT Ans3 FROM member WHERE Username = ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $row = $stmt->fetch();
    
    if($row["Ans3"] == $ans3){
       echo 1;
       
    }else{
        echo 0;
    }
?>