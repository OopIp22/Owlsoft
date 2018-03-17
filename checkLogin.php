<?php
    session_start();
    include "connect.php";

    $username = $_POST["user"];
    $password = $_POST["pass"];
    
try{
    $sql = "SELECT * FROM member WHERE username = ? and password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $username);
    $stmt->bindValue(2, $password);
    $stmt->execute(); //หลังจากที่กำหนดค่าใน prepare แล้วให้เริ่มทำการประมวลผลได้
    if ($row = $stmt->fetch()) {
        $_SESSION["username"] = $row["Username"];
        if( $row['status'] == 'admin'){
            header("location: dashboard.php");
        }else{
        header("location: index.php");
        }
       
    } else {
        header("location: index.php?error=1");
    }
}
catch(Exception $e){
    $pdo->rollBack();
    echo "ข้อมูลไม่ถูกต้อง";
}

?>
