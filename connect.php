<?php
try{
$pdo = new PDO('mysql:host=10.199.66.227;dbname=sec01_ose;charset=utf8', 'Sec01_OSE', 'E87tO5p9',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "เชื่อมได้";
}catch(PDOException $e){
    die('Error connecting to database');
}
?>