<?php
include 'login_main.html';
?>

	<div class="container">
		<br/><br/>
		<div class="center-block">
			<form method="post" action="login.php" onsubmit="return login_check();" name="login" class="form-horizontal">
				<div class="form-group">
					<div class="col-xs-12 col-sm-4 col-sm-offset-4">	
						<input type="number" class="form-control" name="student_number" placeholder="학번">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12 col-sm-4 col-sm-offset-4">
						<input type="password" class="form-control" name="password" placeholder="비밀번호">
					</div>
				</div>
			  
				<div class="form-group">
					<div class="col-xs-12 col-sm-4 col-sm-offset-4">
						<input class="btn btn-default btn-lg btn-block form-control" id="login_box" type="submit" value="로그인">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12 col-sm-4 col-sm-offset-4">
						<input class="btn btn-default btn-lg btn-block form-control" id="login_box2" type="button" onclick="location.href='introduction.php'" value="더 알아보기">
					</div>
				</div>
			</form>
		</div>
		
	
		<br/>
		<div class="col-xs-12 col-sm-12 center-block">
			<div class="text-center">
				<a href="password_page.php"  id="login_link">비밀번호 찾기</a> 　·　 
				<a href="member_page.php" id="login_link">회원가입</a>　　
			</div>
		</div>

		

		

	</div>



</div> <!--login_main.html 상의 div-->




<script type="text/javascript">


function login_check(){
	var form = document.login;  

	//필수 입력
	if(form.student_number.value == "") {
		form.student_number.focus();
		return false;
	}
	else if (strlen(form.student_number.value) !=9) {
		form.student_number.focus();
	return false;
	}
	else if(form.password.value == "") {
		form.password.focus();
	return false;
	}
	//특수문자 처리
	$("#password").bind("keyup",function(){
		re = /[~!@\#$%^&*\()\-=+_']/gi; 
		var temp=$("#password").val();
		if(re.test(temp)){ //특수문자가 포함되면 삭제하여 값으로 다시셋팅
		  $("#password").val(temp.replace(re,"")); 
		} 
	});

}




</script>

<?php
include 'footer.html';
?>