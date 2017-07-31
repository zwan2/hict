<?php
$db = mysqli_connect("localhost", "root", "autoset", "hict");


$student_number = $_POST['student_number'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$name = $_POST['name'];
$major = $_POST['major'];
$email = $_POST['email'];
$tel = $_POST['tel'];



//학번 중복 확인
$query = "SELECT student_number FROM member WHERE student_number = $student_number";
if($result = mysqli_query($db, $query)) {
	//중복
	if($row = mysqli_fetch_assoc($result)) {
		echo"<script>alert('학번 중복입니다.'); location.href='member.html';</script>";
	}

}
   
 

?>