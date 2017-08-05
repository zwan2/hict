<?php
if(!isset($_SESSION)) { 
	session_start(); 
}
include 'function.php';
ensure_logged_in();

$db = new mysqli("localhost", "root", "autoset", "hict");

$booking_id = $_GET['booking_id'];
$query = "UPDATE booking SET booking_state = 3 WHERE booking_id = 
$booking_id";

if($result = $db->query($query)) {
	echo"<script>alert('취소되었습니다.'); location.href='mybooking.php';</script>";
}		

?>