<?php
$db = mysqli_connect("localhost", "root", "autoset", "hict");

$student_number = $_POST['student_number'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$new_password = $_POST['new_password'];
$password = $_POST['password'];

$password = crypt('hict', $password);
$new_password = crypt('hict', $new_password);

$query = "SELECT password FROM member WHERE student_number = $student_number";
if($result = $db->query($query)) 
	$row = $result->fetch_assoc();

if($password == $row['password']) {
	//계정 정보 변경
	$query = "UPDATE member SET email = '$email', tel = '$tel', password = '$new_password' WHERE student_number = '$student_number'";
	if($result = $db->query($query)) {
		echo"<script>alert('저장되었습니다.'); location.href='account.php';</script>";
	}
}
else {
	echo"<script>alert('비밀번호를 잘못 입력하였습니다.'); location.href='account.php';</script>";
}







?>