<?php
//db 연결

ini_set('display_errors', 1); 
ini_set('error_reporting', E_ALL);

//aws ec2 db
$db = mysqli_connect("13.124.48.36", "zwan", "1233zz", "hict", "3306");
//$db = mysqli_connect("192.169", "root", "autoset", "hict");
//$db = mysqli_connect("localhost", "root", "autoset", "hict");
if(!$db) {
	echo" aa";
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


function admin_link($admin_code, $link) {
	if($admin_code == 0) {
		return "#";
	}
	else {
		return $link;
	}
}

function admin_back($admin_code) {
	if($admin_code == 0) {
		echo "<script>window.history.back()</script>";
	}

}

function main_hidden() {
	$admin_code = $_SESSION['admin_code'];
	if($admin_code!=0) {
		?>
		<li>
			<li><a href="bookinglist.php">관리자 페이지</a></li>
		</li>
        <?
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

//캘린더 페이지 상단 공지사항
function calendar_notice() {
	global $db;
	$query = "SELECT notice_id, title FROM notice ORDER BY notice_id DESC LIMIT 1";
	if($result = $db->query($query)) {
		$row = $result->fetch_assoc();
		$notice_id = $row['notice_id'];
		$title = $row['title'];
		echo"<a href=\"notice2.php?notice_id=$notice_id\">$title</a>";
	}
}

function notice() {
	global $db;
	$student_number = $_SESSION['student_number'];
	$admin_code = $_SESSION['admin_code'];

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
			
					
			//관리자: 삭제 권한
			if($admin_code != 0) {
				echo"<td><a href=\"notice_delete.php?notice_id=$notice_id\" onclick=\"return confirm('정말 공지를 삭제하시겠습니까?');\">삭제</a></td>";
			}
						
			
			echo"</tr>";
		}
	}


}



function mybooking() {
	global $db;
	$student_number = $_SESSION['student_number'];
	

	//페이지네이션 쿼리
	$query = "SELECT booking_id FROM booking WHERE student_number = $student_number";
	if($result = $db->query($query)) {
		$total_num = mysqli_num_rows($result);
		if($total_num == 0) {
			$total_num = 1;
		}
		//현재 위치한 페이지
		$page = (isset($_GET['page'])?$_GET['page']:1);
		$list = 10;
		$block = 5;
		//총 페이지 수
		$page_num = ceil($total_num/$list);
		//총 블록 수
		$block_num = ceil($page_num/$block);
		//현재 위치한 페이지 블록
		$now_block = ceil($page/$block);

		//블록의 시작
		$start_page = ($now_block*$block) - ($block - 1);
		if($start_page <= 1) {
			$start_page = 1;
		}
		//블록의 끝
		$end_page = $now_block*$block;
		if($page_num <= $end_page) {
			$end_page = $page_num;
		}

		$start_point = ($page-1) * $list;
		$prev_page = max($start_page - $block - 1, 1);
		$next_page = min($end_page + $block + 1, $page_num);

		$page = (isset($_GET['page'])?$_GET['page']:1);
		$list = 10;
		$start_point = ($page-1) * $list;	
		$num = ($page_num-$page)*10+($total_num%10);
	}

	//리스트 출력
	$query = "SELECT * FROM booking WHERE student_number = $student_number ORDER BY booking_id DESC LIMIT $start_point, $list";
	if($result = $db->query($query)) {
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
			echo "<td> <a href=\"#\" data-toggle=\"modal\" data-target=\"#detail_data\" data-id = $booking_id id = \"modal_toggle\"> $start_day ($dom) $start_time - $end_time </a> </td>";
			
			//상태
			mybooking_db_conversion($row['booking_state'], $row['booking_id']);
			
			echo"</tr>";
			
		
		}
		echo "</table></div>";
	}



	//페이지네이션 출력
	$php_self = $_SERVER['SCRIPT_NAME'];
	
	//이전
	echo"
	<nav>
		<ul class=\"pagination\">

		<li>
			<a href=\"$php_self?page=$prev_page\" aria-label=\"Previous\">
			<span aria-hidden=\"true\">&laquo;</span>
			</a>
		</li>";

	//블록
	for ($p=$start_page; $p<=$end_page; $p++) {
		echo"<li><a href=\"$php_self?page=$p\">$p</a></li>";
	}

	//다음
	echo"
		<li>
			<a href=\"$php_self?page=$next_page\" aria-label=\"Next\">
			<span aria-hidden=\"true\">&raquo;</span>
			</a>
		</li>

		</ul>
	</nav>";

}


//mybooking - booking state 변환 함수
function mybooking_db_conversion($booking_state, $booking_id) {
	//승인 대기
	if($booking_state == 0) {
		echo "<td><p class=\"text-muted\">대기</p> 
		<a href=\"mybooking_cancel.php?booking_id=$booking_id\">
		<u onclick=\"return confirm('정말 예약을 취소하시겠습니까?');\">취소</u></a></td>";
	}
	//승인
	else if($booking_state == 1) {
		echo "<td><a href=\"#\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><u>승인</u></a></td>";
	}
	//거절
	else if($booking_state == 2) {
		echo"<td><a href=\"#\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><u>거절</u></a></td>";
	}
	//취소
	else if($booking_state == 3) {
		echo "<td><p class=\"text-muted\">취소</p></td>";
	}
}



//예약 리스트 테이블 & 페이지네이션 & 검색
function bookinglist() {
	global $db;
	
	$query = "SELECT booking_id FROM booking";

	if($result = $db->query($query)) {
		$num = mysqli_num_rows($result);

		//현재 위치한 페이지
		$page = (isset($_GET['page'])?$_GET['page']:1);
		$list = 10;
		$block = 5;
		//총 페이지 수
		$page_num = ceil($num/$list);
		//총 블록 수
		$block_num = ceil($page_num/$block);
		//현재 위치한 페이지 블록
		$now_block = ceil($page/$block);

		//블록의 시작
		$start_page = ($now_block*$block) - ($block - 1);
		if($start_page <= 1) {
			$start_page = 1;
		}
		//블록의 끝
		$end_page = $now_block*$block;
		if($page_num <= $end_page) {
			$end_page = $page_num;
		}

		$start_point = ($page-1) * $list;
		$prev_page = max($start_page - $block - 1, 1);
		$next_page = min($end_page + $block + 1, $page_num);

	}
	
	$page = (isset($_GET['page'])?$_GET['page']:1);
	$list = 10;
	$start_point = ($page-1) * $list;

	//관리자만 사용
	if($_SESSION['admin_code'] != 0) {
		
		

		//검색 값이 있을 경우
		if(isset($_GET['search'])) {
			$search = "%".$_GET['search']."%";

			$query = "SELECT * FROM booking WHERE name LIKE '$search' OR admin_name LIKE '$search' ORDER BY booking_id DESC";
		}
	
		//default
		else 	
		{
			$query = "SELECT * FROM booking ORDER BY booking_id DESC LIMIT $start_point, $list";
		}
	


		if($result = $db->query($query)) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				
				//#
				$booking_id = $row['booking_id'];
				echo "<td> $booking_id </td>";
				
				
				//날짜
				$start_day = date("Y-m-d", strtotime($row['start_time']));
				$dom = dom($row['start_time']);
				$start_time = date("G:i", strtotime($row['start_time']));
				$end_time = date("G:i", strtotime($row['end_time']));			
				echo "<td> <a href=\"#\" data-toggle=\"modal\" data-target=\"#detail_data\" data-id = $booking_id id = \"modal_toggle\"> $start_day ($dom) $start_time - $end_time </a> </td>";

				//예약자
				$tel = $row['tel'];
				$name = $row['name'];
				$student_number = $row['student_number'];
				//alert(연락처)
				echo"<td> <u onclick=\"alert('연락처: $tel')\"> $name($student_number)</u> </td> ";
				
				//상태
				bookinglist_db_conversion($row['booking_state'], $row['booking_id']);
				
				echo"</tr>";

			}
			echo "</table></div>";
		}

	}



	//페이지네이션
	$php_self = $_SERVER['SCRIPT_NAME'];
	
	//이전
	echo"
	<nav>
		<ul class=\"pagination\">

		<li>
			<a href=\"$php_self?page=$prev_page\" aria-label=\"Previous\">
			<span aria-hidden=\"true\">&laquo;</span>
			</a>
		</li>";

	//블록
	for ($p=$start_page; $p<=$end_page; $p++) {
		echo"<li><a href=\"$php_self?page=$p\">$p</a></li>";
	}

	//다음
	echo"
		<li>
			<a href=\"$php_self?page=$next_page\" aria-label=\"Next\">
			<span aria-hidden=\"true\">&raquo;</span>
			</a>
		</li>

		</ul>
	</nav>";
	
}

//bookinglist - booking state 변환 함수
function bookinglist_db_conversion($booking_state, $booking_id) {
	//승인 대기
	if($booking_state == 0) {
		echo "<td><a href=\"#\" class=\"text-muted\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><u>대기</u></a></td>";
	}
	//승인
	else if($booking_state == 1) {
		echo "<td><a href=\"#\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><u>승인</u></a></td>";
	}
	//거절
	else if($booking_state == 2) {
		echo"<td><a href=\"#\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><u>거절</u></a></td>";
	}
	//취소
	else if($booking_state == 3) {
		echo "<td><p class=\"text-muted\">취소</p></td>";
	}
}

//su member table 관리
function su_member() {
	global $db;
	$student_number = $_SESSION['student_number'];
	$admin_code = $_SESSION['admin_code'];
	

	//페이지네이션 쿼리
	$query = "SELECT student_number FROM member";
	if($result = $db->query($query)) {
		$total_num = mysqli_num_rows($result);
		if($total_num == 0) {
			$total_num = 1;
		}
		//현재 위치한 페이지
		$page = (isset($_GET['page'])?$_GET['page']:1);
		$list = 10;
		$block = 5;
		//총 페이지 수
		$page_num = ceil($total_num/$list);
		//총 블록 수
		$block_num = ceil($page_num/$block);
		//현재 위치한 페이지 블록
		$now_block = ceil($page/$block);

		//블록의 시작
		$start_page = ($now_block*$block) - ($block - 1);
		if($start_page <= 1) {
			$start_page = 1;
		}
		//블록의 끝
		$end_page = $now_block*$block;
		if($page_num <= $end_page) {
			$end_page = $page_num;
		}

		$start_point = ($page-1) * $list;
		$prev_page = max($start_page - $block - 1, 1);
		$next_page = min($end_page + $block + 1, $page_num);

		$page = (isset($_GET['page'])?$_GET['page']:1);
		$list = 10;
		$start_point = ($page-1) * $list;	
		$num = ($page_num-$page)*10+($total_num%10);
	}


	if($_SESSION['admin_code'] == 2) {
		
		//검색 값이 있을 경우
		if(isset($_GET['search'])) {
			$search = "%".$_GET['search']."%";

			$query = "SELECT * FROM member WHERE name LIKE '$search'";
		}
	
		//default
		else 	
		{
			$query = "SELECT * FROM member LIMIT $start_point, $list";
		}
	}
	else
		admin_back();

	//리스트 출력
//	$query = "SELECT * FROM member LIMIT $start_point, $list";

	if($result = $db->query($query)) {
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			
			//#
			echo "<td> $num </td>";
			$num--;
			
			//학번
			$student_number = $row['student_number'];
			echo "<td> $student_number </td>";
			
			//이름
			$name = $row['name'];
			echo "<td> $name </td>";

			//이름
			$email = $row['email'];
			echo "<td> $email </td>";

			//전화번호
			$tel = $row['tel'];
			echo "<td> $tel </td>";

			//상태
			$admin_code = $row['admin_code'];
			su_member_conversion($admin_code, $student_number);
			
			echo"</tr>";
			
		
		}
		echo "</table></div>";
	}



	//페이지네이션 출력
	$php_self = $_SERVER['SCRIPT_NAME'];
	
	//이전
	echo"
	<nav>
		<ul class=\"pagination\">

		<li>
			<a href=\"$php_self?page=$prev_page\" aria-label=\"Previous\">
			<span aria-hidden=\"true\">&laquo;</span>
			</a>
		</li>";

	//블록
	for ($p=$start_page; $p<=$end_page; $p++) {
		echo"<li><a href=\"$php_self?page=$p\">$p</a></li>";
	}

	//다음
	echo"
		<li>
			<a href=\"$php_self?page=$next_page\" aria-label=\"Next\">
			<span aria-hidden=\"true\">&raquo;</span>
			</a>
		</li>

		</ul>
	</nav>";

}


//su_member - admin_code 변환 함수
function su_member_conversion($admin_code, $student_number) {

	//예약자 상태
	if($admin_code == 0) {
		echo "<td><a href=\"su_member_set.php?student_number=$student_number&admin_code=$admin_code\"><u onclick=\"return confirm('관리자로 설정하시겠습니까?');\">예약자</u></td>";
	}
	//관리자 상태
	else if($admin_code == 1) {
	
		echo "<td><a href=\"su_member_set.php?student_number=$student_number&admin_code=$admin_code\"><u onclick=\"return confirm('관리자를 해지하시겠습니까?');\">관리자</u></td>";
	

	}

}



?>