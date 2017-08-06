<?php
$db = mysqli_connect("localhost", "root", "autoset", "hict");

if(mysqli_connect_errno()) {
	mysqli_connect_error();
}

function dom($day) {
	$dom = array("일","월","화","수","목","금","토");
	return $dom[date('w',strtotime($day))];
}

function ensure_logged_in() {
    if(!isset($_SESSION['student_number'])) {
        echo"<script>alert('로그인하세요.'); location.href='login.html';</script>";
    }
}

function mybooking() {
	global $db;
	$student_number = $_SESSION['student_number'];

	$query = "SELECT * FROM booking WHERE student_number = $student_number ORDER BY booking_id DESC";
	
	if($result = $db->query($query)) {
		$num = mysqli_num_rows ($result);
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			
			//#
			echo "<td> $num </td>";
			$num--;
			
			//날짜
			$start_day = date("Y-m-d", strtotime($row['start_time']));
			$dom = dom($row['start_time']);
			$start_time = date("G:i", strtotime($row['start_time']));
			$end_time = date("G:i", strtotime($row['end_time']));
			
			$booking_id = $row['booking_id'];
			echo "<td> <a data-toggle=\"modal\" data-target=\"#detail_data\" data-id = $booking_id id = \"modal_toggle\"> $start_day ($dom) $start_time - $end_time </a> </td>";
			
			//상태
			mybooking_db_conversion($row['booking_state'], $row['booking_id']);
			
			echo"</tr>";
			
		
		}
	}

}

//booking state 변환 함수
function mybooking_db_conversion($booking_state, $booking_id) {
	//승인 대기
	if($booking_state == 0) {
		echo "<td><p class=\"text-muted\">승인 대기</p> 
		<a href=\"mybooking_cancel.php?booking_id=$booking_id\">
		<u onclick=\"return confirm('정말 예약을 취소하시겠습니까?');\">취소</u></td>";
	}
	//승인
	else if($booking_state == 1) {
		echo "<td><u data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\">승인</p></td>";
	}
	//거절
	else if($booking_state == 2) {
		echo"<td><u data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\">거절</p></td>";
	}
	//취소
	else if($booking_state ==3) {
		echo "<td><p class=\"text-muted\">취소</p></td>";
	}
}


function accountset_load() {
	global $db;
	$student_number = $_SESSION['student_number'];

	$query = "SELECT * FROM member WHERE student_number = $student_number";
		
	if($result = $db->query($query)) {
		$row = $result->fetch_assoc();
	}
}


function notice() {
	global $db;
	$student_number = $_SESSION['student_number'];

	$query = "SELECT * FROM notice ORDER BY notice_id DESC";

	if($result = $db->query($query)) {
		$num = mysqli_num_rows ($result);
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			
			//#
			echo "<td> $num </td>";
			$num--;

			//제목
			$title = $row['title'];
			$notice_id = $row['notice_id'];
			echo "<td><a href=\"notice2.php?notice_id=$notice_id\"> $title </a></td>";

			//날짜
			$write_time = $row['write_time'];
			echo "<td> $write_time </td>";	
			
			echo"</tr>";
			
		
		}
	}

}



function bookinglist() {
	global $db;
	//관리자만 사용 가능
	if($_SESSION['admin_code'] == 1) {
	
		$query = "SELECT * FROM booking ORDER BY booking_id DESC";
		
		if($result = $db->query($query)) {
			$num = mysqli_num_rows ($result);
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				
				//#
				echo "<td> $num </td>";
				$num--;
				
				//날짜
				$start_day = date("Y-m-d", strtotime($row['start_time']));
				$dom = dom($row['start_time']);
				$start_time = date("G:i", strtotime($row['start_time']));
				$end_time = date("G:i", strtotime($row['end_time']));
				
				$booking_id = $row['booking_id'];
				echo "<td> <a data-toggle=\"modal\" data-target=\"#detail_data\" data-id = $booking_id id = \"modal_toggle\"> $start_day ($dom) $start_time - $end_time </a> </td>";
				//예약자
				$name = $row['name'];
				$student_number = $row['student_number'];
				echo "<td> $name($student_number) </td>";
				//상태
				mybooking_db_conversion($row['booking_state'], $row['booking_id']);
				
				echo"</tr>";
				
			
			}
		}		

	}
	else {
		echo"<script>alert('관리자가 아닙니다.')</script>";
	}



}


?>