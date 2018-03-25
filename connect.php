<?php
try{
$pdo = new PDO("mysql:host=localhost;dbname=beauty_community", "root", "");
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$pdo->exec ( "SET NAMES \"utf8\"" );
    
}
catch(PDOException $e){
    die('Error connecting to database');
}
?>