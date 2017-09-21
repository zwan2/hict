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

if(empty($_POST['tool'])) {
	$tool = "없음";	
}
else {
	$tool = $_POST['tool'];
}
if(empty($_POST['extra'])) {
	$extra = "없음";	
}
else {
	$extra = $_POST['extra'];
}

$receive_time = date("Y-m-d H:i:s",time());
$start_time = $booking_date." $start_time".":00";
$end_time = $booking_date." $end_time".":00";


$query = "INSERT INTO booking(booking_state, receive_time, student_number, name, tel, start_time, end_time, total_number, purpose, tool, extra) VALUES ('$booking_state', '$receive_time', '$student_number', '$name', '$tel', '$start_time', '$end_time', '$total_number', '$purpose', '$tool', '$extra');";

if($result = $db->query($query)) {
	
	echo"<script>alert('예약 완료! 내 예약을 확인하세요.'); location.href='calendar.php';</script>";
}
else {
	echo"<script>alert('에러가 발생했습니다. 관리자에게 문의하십시오.'); location.href='calendar.php';</script>";
}



function sendMessage(){
	$content = array(
		"en" => 'English Message'
	);
	$heading = "건국대 휴먼ICT 실습실";
	$subtitle = "새 예약이 접수되었습니다";
	
	$fields = array(
		'app_id' => "3e6f0b89-edba-412c-89f1-5e86f2a6d776",
		'included_segments' => array('All'),
  		'data' => array("foo" => "bar"),
		'contents' => $content,
		'headings' => $heading,
		'subtitle' => $subtitle
	);
	
	$fields = json_encode($fields);
	print($fields);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic NGEwMGZmMjItY2NkNy0xMWUzLTk5ZDUtMDAwYzI5NDBlNjJj'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	$response = curl_exec($ch);
	curl_close($ch);
	
	return $response;
}

$response = sendMessage();
$return["allresponses"] = $response;
$return = json_encode( $return);

print("\n\nJSON received:\n");
print($return);
print("\n");

?>