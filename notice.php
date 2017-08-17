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
</div>



<?php
include 'footer.html';
?>