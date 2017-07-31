<?php
if(!isset($_SESSION)) { 
	session_start(); 
}

$student_number = $_POST['student_number'];
$password = $_POST['password'];

$db = mysqli_connect("localhost", "root", "autoset", "hict");
$query = "SELECT admin_code, member_code FROM member WHERE student_number = $student_number AND password = $password";


if($result = mysqli_query($db, $query)) {

	//로그인 성공
	if($row = mysqli_fetch_assoc($result)) {

		$_SESSION['admin_code'] = $row['admin_code'];
		$_SESSION['member_code'] = $row['member_code'];
		echo"<script>location.href = 'calendar.php';</script>";
	}
	//로그인 실패
	else {
		echo"<script>alert('로그인에 실패하였습니다. 다시 입력하세요.'); location.href='login.html';</script>";
	}		
}



?>
