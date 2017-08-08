<?php
	include 'main.html';
?>



<div class="container">

	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">공지사항</div>


		<table class="table">
			<tr>
				<th>#</th>
		    	<th>제목</th>
		    	<th>작성일</th>
		    </tr>
		    <?=notice()?>
		</table>
	</div>

	<?	if($_SESSION['admin_code'] != 0) {
		echo"<br/><a class=\"btn btn-default\" href=\"notice_write.php\" role=\"button\">공지 작성</a>";
	}?>


</div>

</body>
</html>