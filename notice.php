<?php
include 'main.html';
?>



<div class="container">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
		<h1 class="table_title">공지사항</h1>
		<?	if($_SESSION['admin_code'] != 0) {
			echo"<a id=\"notice_write\" href=\"notice_write.php\" role=\"button\"><strong>글쓰기</strong></a>";
		}?>
	</div>
	<br/><br/>
	<?=notice()?>
</div>



<?php
include 'footer.html';
?>