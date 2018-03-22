<?php
include('connect.php');
    $ssn = $_REQUEST["SSN"]
	$name = $_REQUEST["Name"];
	$username = $_REQUEST["Username"];
    $password = $_REQUEST["Password"];
    $birthdate = $_REQUEST["BirthDate"];
    $email = $_REQUEST["Email"];
    $status = $_REQUEST["Status"];
    $questtion1 = $_REQUEST["Question1"];
    $questtion2 = $_REQUEST["Question2"];
    $questtion3 = $_REQUEST["Question3"];
    $ans1 = $_REQUEST["Ans1"];
    $ans2 = $_REQUEST["Ans2"];
    $ans3 = $_REQUEST["Ans3"];
    $filessn = $_REQUEST["FileSSN"];

	
	$sql = "INSERT INTO member(SSN, Name, Username, Password, BirthDate, Email, Status, Question1, Question2, Question3, Ans1, Ans2, Ans3, FileSSN)
			 VALUES('$snn', '$name', '$username', '$password', '$email', '$birthdate', '$email', '$status', '$questtion1', '$questtion2', '$questtion3', '$ans1', '$ans2', '$ans3', $filessn)";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'success_register.php'; ";
	echo "</script>";
	}
	else{
        echo "<script type='text/javascript'>";
	    echo "window.location = 'success_register.php'; ";
	    echo "</script>";
}
?>