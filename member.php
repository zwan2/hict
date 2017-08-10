<?php
include 'function.php';

$student_number = $_POST['student_number'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];




//학번 중복 확인
$query = "SELECT student_number FROM member WHERE student_number = $student_number";

//중복
if($result = $db->query($query)) {	
	if($row = $result->fetch_assoc()) {
		echo"<script>alert('학번 중복입니다.'); window.history.back();</script>";
	}
	else {
		$password = crypt('hict', $password);	
		//DB에 정보 입력
		$query = "INSERT INTO member(student_number, password, name, email, tel, admin_code) VALUES ('$student_number', '$password', '$name', '$email', '$tel', 0);";
		if($result = $db->query($query)) {
			echo"<script>alert('회원가입이 완료되었습니다.'); location.href='login.html';</script>";
		}
		else {
			echo"<script>alert('회원가입 실패'); location.href='member.html';</script>";
		}

	}

}


?>
