<?php
//db 연결
//aws ec2 db
$db = mysqli_connect("13.124.48.36", "zwan", "1233zz", "hict", "3306");

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
        echo"<script>alert('로그인하세요.'); location.href='login_page.php';</script>";
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
		<li><a href="bookinglist.php">관리자 페이지</a></li>
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
		?>
		<div class="col-xs-12 col-sm-8 col-sm-offset-2" >
			<a class="btn btn-default btn-block ellipsis" id="notice_button" href="notice2.php?notice_id=<?=$notice_id?>" role="button"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <?=$row['title']?></a>
		</div>
		<?
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
		
			?>
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<a class="btn btn-default btn-block" id="notice_button" href="notice2.php?notice_id=<?=$row['notice_id']?>" role="button"><p><?=$row['title']?></p></a>
			</div>
			<?
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

		
	//리스트 출력
	$query = "SELECT * FROM booking WHERE student_number = $student_number ORDER BY booking_id DESC LIMIT $start_point, $list";
	if($result = $db->query($query)) {
		while($row = $result->fetch_assoc()) {
		

			//날짜-상세정보 호출용 data
			$start_day = date("y.m-d", strtotime($row['start_time']));
			$dom = dom($row['start_time']);
			$start_time = date("G:i", strtotime($row['start_time']));
			$end_time = date("G:i", strtotime($row['end_time']));
			$booking_date =$start_day." (".$dom.") ". $start_time." - ".$end_time;

			$booking_id = $row['booking_id'];
	
			?>
			<div class="col-xs-10 col-sm-8 col-sm-offset-2 no_padding">
				<div class="panel panel-default" id="mybooking_panel">
				  <div class="panel-body">
				    <?=$num?>:
					<a href="#" data-toggle="modal" data-target="#detail_data" data-id = <?=$booking_id?> class="ellipsis" id = "modal_toggle"><?=$booking_date?></a>
				  </div>
				</div>
			</div>
			<div class="col-xs-2 col-sm-2 no_padding">
				<div class="panel panel-default" id="mybooking_button">
				  <div class="panel-body">
				    <?mybooking_db_conversion($row['booking_state'], $row['booking_id'])?>
				  </div>
				</div>
			</div>
			
			<?
			$num--;
		};
	}



	//페이지네이션 출력
	$php_self = $_SERVER['SCRIPT_NAME'];
	
	//이전
	echo"
	<div class=\"col-xs-12 col-sm-8 col-sm-offset-2\">
		<nav>
			<ul class=\"pagination\">

			<li>
				<a class=\"pager\" href=\"$php_self?page=$prev_page\" aria-label=\"Previous\">
				<span class=\"glyphicon glyphicon-menu-left\" aria-hidden=\"true\"></span>
				</a>
			</li>";

	//블록 (액티브)
	for ($p=$start_page; $p<=$end_page; $p++) {
		 if($page==$p) {
	        $c="active";
	    }
	    else {
	        $c="";
	    }
		echo"<li class=\"$c block\"><a href=\"$php_self?page=$p\">$p</a></li>";
	}


	//다음
	echo"
			<li>
				<a class=\"pager\" href=\"$php_self?page=$next_page\" aria-label=\"Next\">
				<span class=\"glyphicon glyphicon-menu-right\" aria-hidden=\"true\"></span>
				</a>
			</li>

			</ul>
		</nav>
	</div>";

	}
}

//mybooking - booking state 변환 함수
function mybooking_db_conversion($booking_state, $booking_id) {
	//승인 대기
	if($booking_state == 0) {
		echo "
		<a href=\"mybooking_cancel.php?booking_id=$booking_id\" >
		<inline class=\"grey\" onclick=\"return confirm('정말 예약을 취소하시겠습니까?');\">●</inline></a>";
	}
	//승인
	else if($booking_state == 1) {
		echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><inline class=\"blue\">●</inline></a>";
	}
	//거절
	else if($booking_state == 2) {
		echo"<a href=\"#\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><inline class=\"red\">●</inline></a>";
	}
	//취소
	else if($booking_state == 3) {
		echo "<inline class=\"text-muted\">-</inline>";
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
				
				
				
				
				//날짜-상세정보 호출용 data
				$start_day = date("y.m-d", strtotime($row['start_time']));
				$dom = dom($row['start_time']);
				$start_time = date("G:i", strtotime($row['start_time']));
				$end_time = date("G:i", strtotime($row['end_time']));
				$booking_date =$start_day." (".$dom.") ". $start_time." - ".$end_time;

				$booking_id = $row['booking_id'];			
				

				//예약자
				$tel = $row['tel'];
				$name = $row['name'];
				$student_number = $row['student_number'];
				//alert(연락처)
				//echo"<td> <inline onclick=\"alert('이름: $name\\n학번: $student_number \\n연락처: $tel')\"> $name</inline> </td> ";
				
				//상태
				//bookinglist_db_conversion($row['booking_state'], $row['booking_id']);
				?>
				<div class="col-xs-10 col-sm-8 col-sm-offset-2 no_padding">
					<div class="panel panel-default" id="mybooking_panel">
					  <div class="panel-body">
					    <?=$booking_id?>:
						<a href="#" data-toggle="modal" data-target="#detail_data" data-id = <?=$booking_id?> class="ellipsis" id = "modal_toggle"><?=$booking_date?></a>
					  </div>
					</div>
				</div>
				<div class="col-xs-2 col-sm-2 no_padding">
					<div class="panel panel-default" id="mybooking_button">
					  <div class="panel-body">
					    <?bookinglist_db_conversion($row['booking_state'], $row['booking_id'])?>
					  </div>
					</div>
				</div>
				
				<?
			

			}
			
		}

	}



	//페이지네이션
	$php_self = $_SERVER['SCRIPT_NAME'];
	
	//이전
	echo"
	<nav>
		<ul class=\"pagination\">

		<li>
			<a class=\"pager\" href=\"$php_self?page=$prev_page\" aria-label=\"Previous\">
			<span aria-hidden=\"true\">&laquo;</span>
			</a>
		</li>";

	//블록 
	for ($p=$start_page; $p<=$end_page; $p++) {
		 if($page==$p) {
	        $c="active";
	    }
	    else {
	        $c="";
	    }
		echo"<li class=\"$c\"><a href=\"$php_self?page=$p\">$p</a></li>";
	}

	//다음
	echo"
		<li>
			<a class=\"pager\" href=\"$php_self?page=$next_page\" aria-label=\"Next\">
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
		echo "<a href=\"#\" class=\"text-muted\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><inline class=\"grey\">●</inline></a>";
	}
	//승인
	else if($booking_state == 1) {
		echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><inline  class=\"blue\">●</inline></a>";
	}
	//거절
	else if($booking_state == 2) {
		echo"<a href=\"#\" data-toggle=\"modal\" data-target=\"#message\" data-id = $booking_id id = \"smodal_toggle\"><inline  class=\"red\">●</inline></a>";
	}
	//취소
	else if($booking_state == 3) {
		echo "<inline class=\"text-muted\">-</inline>";
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
		$num = ($page_num-$page+1)*10+($total_num%10);

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
	//$query = "SELECT * FROM member LIMIT $start_point, $list";

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
			<a class=\"pager\" href=\"$php_self?page=$prev_page\" aria-label=\"Previous\">
			<span aria-hidden=\"true\">&laquo;</span>
			</a>
		</li>";

	//블록 
	for ($p=$start_page; $p<=$end_page; $p++) {
		 if($page==$p) {
	        $c="active";
	    }
	    else {
	        $c="";
	    }
		echo"<li class=\"$c\"><a href=\"$php_self?page=$p\">$p</a></li>";
	}

	//다음
	echo"
		<li>
			<a class=\"pager\" href=\"$php_self?page=$next_page\" aria-label=\"Next\">
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