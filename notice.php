<?php
include 'main.html';
?>



<div class="container">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
		<h1 class="table_title"><a href="notice.php">공지사항</a></h1>
		<?	if($_SESSION['admin_code'] != 0) {
			echo"<a id=\"notice_write\" href=\"notice_write.php\" role=\"button\">글쓰기</a>";
		}?>
	</div>
	<br/><br/>
	<?=notice()?>
	<div class="col-xs-12 col-sm-8 col-sm-offset-2 no_padding">
		<a class="btn btn-default btn-block" id="notice_button" href="notice_main2.php" role="button">2학기 실습실 이용 안내</a>
	</div>
	<div class="col-xs-12 col-sm-8 col-sm-offset-2 no_padding">
		<a class="btn btn-default btn-block" id="notice_button" href="notice_main.php" role="button">실습실 관리 및 이용관련 공지 안내</a>
	</div>
</div>



<?php
include 'footer.html';
?>