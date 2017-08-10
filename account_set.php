<?php
include 'function.php';

$student_number = $_POST['student_number'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$new_password = $_POST['new_password'];
$password = $_POST['password'];

$password = crypt('hict', $password);



$query = "SELECT password FROM member WHERE student_number = $student_number";
if($result = $db->query($query)) 
	$row = $result->fetch_assoc();

if($password == $row['password']) {
	
	//비밀번호 변경
	if(isset($new_password)) {
		$new_password = crypt('hict', $new_password);
		$query = "UPDATE member SET password = '$new_password' WHERE student_number = '$student_number'";
		$result = $db->query($query);
	}

	//계정 정보 변경
	$query = "UPDATE member SET email = '$email', tel = '$tel' WHERE student_number = '$student_number'";
	if($result = $db->query($query)) {
		echo"<script>alert('저장되었습니다.'); location.href='account.php';</script>";
	}

}

else {
	echo"<script>alert('비밀번호를 잘못 입력하였습니다.'); location.href='account.php';</script>";
}







?>