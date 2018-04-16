<?php
    session_start();
    include "connect.php";

    $username = $_POST["username"];
    $password = $_POST["pass"];
    
    $back = $_SERVER['HTTP_REFERER'];
    $error = $_SERVER['HTTP_REFERER']."?&error=1";
    
try{
    $sql = "SELECT * FROM member WHERE Username = ? and password = ? and Status IN ('member','admin')";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $username);
    $stmt->bindValue(2, $password);
    $stmt->execute(); //หลังจากที่กำหนดค่าใน prepare แล้วให้เริ่มทำการประมวลผลได้
    if ($row = $stmt->fetch()) {
        $_SESSION["username"] = $row["Username"];
        if( $username == 'admin'){
            header("location: dashboard.php");
        }else{
        header("location: $back");
        }
       
    } else {
        header("location: $error");
    }
}
catch(Exception $e){
    
    echo "ข้อมูลไม่ถูกต้อง";
}

?>
