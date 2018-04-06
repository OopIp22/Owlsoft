<?php
    include "connect.php";
    $name = $_GET["name"];
    $ssn =  $_GET["ssn"];
    $bdate = $_GET["bdate"];

    $stmt = $pdo->prepare("SELECT SSN,Name,Birthdate FROM member");
    $stmt->execute();
    
    while($row = $stmt->fetch())
    {
        if($name == $row["Name"] && $ssn == $row["SSN"] && $bdate == $row["Birthdate"]){
            echo "fail";
        break;
        }
    }
    
?>