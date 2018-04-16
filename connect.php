<?php
try{
$pdo = new PDO('mysql:host=localhost;dbname=beauty_community;charset=utf8', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "เชื่อมได้";
}catch(PDOException $e){
    die('Error connecting to database');
}
?>