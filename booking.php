<?php
include 'function.php';

$booking_state = "0";
$student_number = $_POST['student_number'];
$name = $_POST['name'];
$booking_date = $_POST['booking_date'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$total_number = $_POST['total_number'];
$purpose = $_POST['purpose'];

//전화번호 DB에서 추출
$query = "SELECT tel FROM member WHERE student_number = $student_number";
if($result = $db->query($query)) {
	$row = $result->fetch_assoc();
	$tel = $row['tel'];
}

if(!empty($_POST['tool'])) {
	$tool = implode(", ", $_POST['tool']);
}
else {
	$tool = "없음";	
}
if(!empty($_POST['extra'])) {
	$extra = $_POST['extra'];
}
else {
	$extra = "없음";	
}



$start_time = $booking_date." $start_time".":00";
$end_time = $booking_date." $end_time".":00";


$query = "INSERT INTO booking(booking_state, student_number, name, tel, start_time, end_time, total_number, purpose, tool, extra) VALUES ('$booking_state', '$student_number', '$name', '$tel', '$start_time', '$end_time', '$total_number', '$purpose', '$tool', '$extra');";

if($result = $db->query($query)) {
	
	echo"<script>alert('예약 완료! 내 예약을 확인하세요.'); location.href='calendar.php';</script>";
}
else {
	echo"에러가 발생했습니다. 관리자에게 문의하십시오.";
}


?>