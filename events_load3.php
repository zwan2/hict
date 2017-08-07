<?php

//이벤트 렌더링
//calendar.js 에서 json 호출
$events = array();

$db = new mysqli("localhost", "root", "autoset", "hict");
$query = "SELECT * FROM booking WHERE booking_state = 2";

if($result = $db->query($query)) {
	while($row = $result->fetch_assoc()) {
		$event = array();

		$event['id'] = $row['booking_id'];
		$event['booking_state'] = $row['booking_state'];
		$event['title'] = $row['name'];
		$event['start'] = $row['start_time'];
		$event['end'] = $row['end_time'];
		$event['total_number'] = $row['total_number'];
		$event['purpose'] = $row['purpose'];
		$event['tool'] = $row['tool'];
		$event['extra'] = $row['extra'];


		$event['allDay'] = false;

		array_push($events, $event);
	}
}

echo json_encode($events);
?>