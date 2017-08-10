<?php
if(!isset($_SESSION)) { 
	session_start(); 
}
include 'function.php';
$fail_ip = $_SERVER['REMOTE_ADDR'];
$fail_time = time();



if(login()) {
	fail_reset();
	fail_lock();
	echo"<script>location.href = 'calendar.php';</script>";
}

else {
	fail_lock();
	fail_count();
	echo"<script>alert('로그인에 실패하였습니다. 다시 입력하세요.'); location.href='login.html';</script>";
}







//로그인 함수
function login() {
	global $db;

	$student_number = $_POST['student_number'];
	$password = $_POST['password'];
	$password = crypt('hict', $password);

	$query = "SELECT password FROM member WHERE student_number = $student_number";

	if($result = $db->query($query)) 
		$row = $result->fetch_assoc();

	if($password == $row['password']) {
	
		$query = "SELECT admin_code, student_number, name FROM member WHERE student_number = $student_number";
		if($result = $db->query($query)) {
		//로그인 성공
			$row = $result->fetch_assoc();
			$_SESSION['admin_code'] = $row['admin_code'];
			$_SESSION['student_number'] = $row['student_number'];
			$_SESSION['name'] = $row['name'];
			return TRUE;
		}
	}
		
}







//로그인 실패 카운트 함수
function fail_count() {
	global $db, $fail_ip, $fail_time;

	//fail 기록 있는지 검사
	$query = "SELECT * FROM fail_check WHERE fail_ip = '$fail_ip'";
	if($result = $db->query($query)) {
		
		//기록 존재 (1~4회 틀렸을 경우)
		if($row = $result->fetch_assoc()) {		
				
			$query = "UPDATE fail_check SET fail_count=fail_count+1, fail_time=$fail_time WHERE fail_ip = '$fail_ip';";
			$result = $db->query($query);
			
		}
		//기록 없음 -> 기록 추가
		else {
			
			$query = "INSERT INTO fail_check(fail_ip, fail_time, fail_count) VALUES ('$fail_ip', '$fail_time', '1');";
			$result = $db->query($query);
		}
	}
}


//로그인 횟수 초기화 함수
function fail_reset() {
	global $db, $fail_ip;

	//fail_lock 해제된 상황에만 초기화 작동
	if(!fail_lock()) {
		$query = "DELETE FROM fail_check WHERE fail_ip = '$fail_ip'"; $result = $db->query($query);
	}
}	


//로그인 잠금 함수 (30초 이내, 5회 이상 틀렸을 때)
function fail_lock() {
	global $db, $fail_time;

	$query = "SELECT fail_count, fail_time FROM fail_check WHERE fail_count >= 5 AND fail_time + 30 > $fail_time";
	if($result = $db->query($query)) {	
		//잠금 작동
		if($row = $result->fetch_assoc()) {

			echo"<script>alert('비밀번호를 5회 이상 잘못 입력하면 30초 동안 로그인이 불가능합니다.'); location.href='login.html';</script>";
			return TRUE;
		}
		//잠금 해제
		else
			return FALSE;
	}
}

?>
