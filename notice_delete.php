<?php
if(!isset($_SESSION)) { 
	session_start(); 
}
include 'function.php';
ensure_logged_in();

$db = new mysqli("localhost", "root", "autoset", "hict");


$admin_code = $_SESSION['admin_code'];
$student_number = $_SESSION['student_number'];
$notice_id = $_GET['notice_id'];

if($admin_code !=0) {
	$query = "DELETE FROM notice WHERE notice_id = $notice_id";

	if($result = $db->query($query)) {
		echo"<script>alert('삭제되었습니다.'); location.href='notice.php';</script>";
	}

}
?>