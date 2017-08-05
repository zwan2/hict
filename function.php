<?php
$db = mysqli_connect("localhost", "root", "autoset", "hict");

if(mysqli_connect_errno()) {
	mysqli_connect_error();
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
	
	$i = 1;
	if($result = $db->query($query)) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			//#
			echo "<td> $i </td>";
			
			//날짜
			$start_time = date("Y-m-d G:i", strtotime($row['start_time']));
			$end_time = date("G:i", strtotime($row['end_time']));
			$booking_id = $row['booking_id'];
			echo "<td> <a data-toggle=\"modal\" data-target=\"#detail_data\" data-id = $booking_id> $start_time - $end_time </a> </td>";
			

			mybooking_db_conversion($row['booking_state'], $row['booking_id']);
			
			echo"</tr>";
			$i++;
		?>

		<?
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
		echo "<td><u data-toggle=\"modal\" data-target=\"#message\">승인</p></td>";
	}
	//거절
	else if($booking_state == 2) {
		echo"<td><u data-toggle=\"modal\" data-target=\"#message\">거절</p></td>";
	}
	//취소
	else if($booking_state ==3) {
		echo "<td><p class=\"text-muted\">취소</p></td>";
	}
}

function mybooking_modal_show() {
	global $db;

	$query = "SELECT * FROM booking WHERE student_number = $student_number AND booking_id = $booking";
}
?>
