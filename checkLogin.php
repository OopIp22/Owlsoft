<?php
    session_start();
    include "connect.php";

    $username = $_POST["user"];
    $password = $_POST["pass"];
    /*$sql = "SELECT * FROM member WHERE username = '$username' and password = '$password'";
    $result = $pdo->query($sql);
    if ($row = $result->fetch()) {
    echo "เข้าสู่ระบบสำเร็จ<br>";
    echo "ยินดีต้อนรับ ";
    echo $row["name"];
    } else {
        echo "เข้าสู่ระบบสำเร็จไม่สำเร็จ<br>";
        echo "Username หรือ Password ไม่ถูกต้อง";
    }*/

    $sql = "SELECT * FROM member WHERE username = ? and password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $username);
    $stmt->bindValue(2, $password);
    $stmt->execute(); //หลังจากที่กำหนดค่าใน prepare แล้วให้เริ่มทำการประมวลผลได้
    if ($row = $stmt->fetch()) {
        $_SESSION["username"] = $row["Username"];
        if($row["Username"] == 'admin'){
            header("location: dashboard.php");
        }else{
        header("location: index.php");
        }
       
    } else {
        echo "เข้าสู่ระบบสำเร็จไม่สำเร็จ<br>";
        echo "Username หรือ Password ไม่ถูกต้อง";
    }

?>
<html>
    <body>
        <br><br><br>
        <a href="logout.php">logout</a>
    </body>
</html>