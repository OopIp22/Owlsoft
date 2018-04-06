<?php
    include "connect.php";

    $userName = $_GET["username"];
    $stmt = $pdo->prepare("SELECT username FROM member ");
    $stmt->execute();

    //check username from datebase if username from Ajax == username from database return fail to Ajax
    while($row = $stmt->fetch()){
    if($userName == $row["username"]){
       echo "fail"; 
    break;
    }
    }
?>