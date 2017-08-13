<?php
include 'login_main.html';
?>
	<div class="container">
		<form method="post" action="login.php" onsubmit="return login_check();" name="login" class="form-horizontal">
			<div class="form-group">
				<div class="col-xs-12">
					<label for="student_number">학번</label>
					<input type="number" class="form-control" name="student_number" placeholder="학번">
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<label for="password">비밀번호</label>
					<input type="password" class="form-control" name="password" placeholder="비밀번호">
				</div>
			</div>
		  
			<div class="form-group">
				<div class="col-xs-12">
					<button type="submit" class="btn btn-default">로그인</button>
					<a href="member_page.php">회원가입</a>	
					<a href="password_page.php">비밀번호 찾기</a>
				</div>
			</div>
		</form>			
		<a href="introduction.php"><p class="text-center">휴먼ICT 실습실 소개 보러가기</p></a>
	</div>

</div> <!--login_main.html 상의 div-->




<script type="text/javascript">

function login_check(){
  var form = document.login;  
  
  //필수 입력
  if(form.student_number.value == "") {
    alert("학번을 입력하세요.");
    form.student_number.focus();
    return false;
  }
  else if(form.password.value == "") {
    alert("비밀번호를 입력하세요.");
    form.password.focus();
    return false;
  }
  //특수문자 처리
  $("#extra").bind("keyup",function(){
    re = /[~!@\#$%^&*\()\-=+_']/gi; 
    var temp=$("#extra").val();
    if(re.test(temp)){ //특수문자가 포함되면 삭제하여 값으로 다시셋팅
      $("#extra").val(temp.replace(re,"")); 
    } 
  });


}
</script>

<?php
include 'footer.html';
?>