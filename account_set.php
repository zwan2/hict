<?php
$db = mysqli_connect("localhost", "root", "autoset", "hict");

$student_number = $_POST['student_number'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$new_password = $_POST['new_password'];
$password = $_POST['password'];


$query = "SELECT student_number FROM member WHERE student_number = $student_number AND password = '$password'";
if($result = $db->query($query)) {
	if($row = $result->fetch_assoc()) {
		
		//계정 정보 변경
		$query = "UPDATE member SET email = '$email', tel = '$tel', password = '$new_password' WHERE student_number = '$student_number'";
		if($result = $db->query($query)) {
			echo"<script>alert('저장되었습니다.'); location.href='account.php';</script>";
		}

	}

	//입력 비밀번호 != db 비밀번호
	else {
		echo"<script>alert('비밀번호를 잘못 입력하였습니다.'); location.href='account.php';</script>";
	}
}




?>