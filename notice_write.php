<?php
include 'main.html';
?>

<div class="container">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
		<h1 class="table_title">글쓰기</h1>
	</div>
	<br/><br/><br/>
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
		<form method="post" action="notice_write2.php" name="notice" class="form-horizontal">
			<div class="form-group">
				<input type="text" class="form-control notice_input" name="title" placeholder="제목">
			</div>
			<div class="form-group"> 
				<textarea class="form-control notice_input" rows="15" name="content" placeholder="내용"></textarea>
				<br/>
			</div>

			<button type="submit" onclick="return confirm('공지를 작성하시겠습니까?');" class="grey">작성</button>

			<div class="float_right">
				<a href="#" class="font_700" onclick="window.history.back();" role="button">뒤로</a>
			</div>
		</form>
	</div>
</div>


<?php
include 'footer.html';
?>