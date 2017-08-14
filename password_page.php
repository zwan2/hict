<?php
include 'login_main.html';
?>
	<div class="container">
		<form method="post" action="password.php" onsubmit="return email_check();" name="password" class="form-horizontal">
			<div class="form-group">
			  	<div class="col-xs-12 col-sm-4 col-sm-offset-4">
				    <span id="helpBlock" class="help-block">가입 시 작성한 이메일을 입력하세요.</span>
				    <label for="email">이메일</label>
				    <input type="email" class="form-control" name="email" id="email" placeholder="이메일을 입력하세요">
			    </div>
		  	</div>
		  	<div class="form-group">
		  		<div class="col-xs-12 col-sm-4 col-sm-offset-4">
					<button type="submit" onclick="return confirm('제출하시겠습니까?');" class="btn btn-primary">제출</button>
					<button class="btn btn-default" type="button" onclick="location.href='login_page.php'">뒤로</button>
				</div>
			</div>
		</form>

	</div>

</div> <!--login_main.html 상의 div-->


<script>
function email_check(){
	var form = document.password;

	//이메일 필수 입력
	if(form.email.value == "") {
	    alert("이메일을 입력하세요.");
	    form.email.focus();
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