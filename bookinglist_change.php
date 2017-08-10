<?php
if(!isset($_SESSION)) { 
	session_start(); 
}
include 'function.php';
ensure_logged_in();


//관리자 정보 수집	
$student_number = $_SESSION['student_number'];
$query = "SELECT * FROM member WHERE student_number = $student_number AND admin_code = 1";
if($result = $db->query($query)) {
	if($row = $result->fetch_assoc()) {
		$admin_name = $row['name'];
		$admin_tel = $row['tel'];
		
	}
}


$booking_id = $_POST['booking_id'];
$booking_state = $_POST['booking_state'];
$message = $_POST['message'];

$query = "UPDATE booking SET booking_state = $booking_state, admin_name = '$admin_name', admin_tel = '$admin_tel', message = '$message' WHERE booking_id = $booking_id";

if($result = $db->query($query)) {
	echo"<script>alert('저장되었습니다.'); location.href='bookinglist.php';</script>";
}



?>