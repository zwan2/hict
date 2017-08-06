<?php
if(!isset($_SESSION)) { 
	session_start(); 
}
include 'function.php';
ensure_logged_in();

$db = new mysqli("localhost", "root", "autoset", "hict");
$student_number = $_SESSION['student_number'];
$booking_id = $_GET['booking_id'];
$query = "UPDATE booking SET booking_state = 3 WHERE booking_id = 
$booking_id AND student_number = $student_number";

if($result = $db->query($query)) {
	echo"<script>alert('취소되었습니다.'); location.href='mybooking.php';</script>";
}
else
	echo"<script>alert('본인만 예약 취소가 가능합니다.'); window.history.back();</script>";

?>