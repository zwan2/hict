<?php
include 'login_main.html';
?>		
<div class="container">

	<form method="post" action="member.php" onsubmit="return member_check();" name="member" class="form-horizontal">
		<div class="form-group">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4">
			<button class="btn btn-default" type="button" onclick="location.href='/'">뒤로</button>
			</div>
		</div>
		<div class="panel-group col-xs-12 col-sm-4 col-sm-offset-4" id="accordion" role="tablist" aria-multiselectable="true">
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingOne">
		      <h4 class="panel-title">
		        <a class="black" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		          개인정보 수집, 이용 동의 내용
		        </a>
		      </h4>
		    </div>

		    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		      <div class="panel-body">
	      	 	<p class="black">1. 개인정보의 수집·이용 목적
				휴먼ICT실습실 예약 페이지는 이용자들의 실습실 예약을 위해 다음의 개인정보를 수집하고 있습니다.
				- 회원 가입 시에 '학번, 비밀번호, 이름'을 필수항목으로 수집합니다.
				- '이메일, 전화번호'를 선택적으로 수집합니다.
				2. 수집하는 개인정보의 항목
				-학번, 이름: 본인 식별 절차에 이용됩니다.
				-이메일: 비밀번호 찾기에 이용됩니다.
				-전화번호: 실습실 예약시 관리자와의 비상 연락에 이용됩니다.
				3. 개인정보의 보유·이용 기간
				- 회원의 개인정보를 서비스 이용시점부터 서비스를 제공하는 기간 동안에만 제한적으로 이용합니다.
				- 회원 탈퇴 시 즉시 파기됩니다.</p>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="form-group">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4">
				<label for="student_number"> 학번</label>
				<input type="number" class="form-control" name="student_number" placeholder="숫자 9자리" min=100000000 max="999999999">
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4">
				<label for="password">비밀번호</label>
				<input type="password" class="form-control" name="password" placeholder="영문, 숫자 혼용 8-20자리" maxlength="20">
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4">
				<label for="password2">비밀번호 확인</label>
				<input type="password" class="form-control" name="password2" maxlength="20">
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4">
				<label for="name">이름</label>
				<input type="name" class="form-control" name="name" maxlength="20" placeholder="이름">
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4">
				<label for="tel">연락처</label>
				<input type="tel" class="form-control" name="tel" maxlength="20" placeholder="연락처">
				<span id="helpBlock" class="help-block">관리자와의 비상 연락에 사용됩니다.</span>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4">
				<label for="email">(선택) E-mail</label>
				<input type="email" class="form-control" name="email" placeholder="E-mail을 입력하세요" maxlength="30">
				<span id="helpBlock" class="help-block">비밀번호 찾기에 사용됩니다.</span>
			</div>
		</div>

		<input type="hidden" name="admin_code" value ="0"> 

		<div class="form-group">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4">
				<button class="btn btn-default" type="submit">회원가입</button>
			</div>
		</div>
		
	</form>		

</div>

<script type="text/javascript">
function member_check(){
	var form = document.member;
	var special_pattern = /[`~!@#$%^&*|\\\'\";:\/?]/gi;


	//전부 입력했는지 검사
	if(form.student_number.value=="" || form.password.value=="" || form.password2.value=="" || form.name.value=="" || form.tel.value=="") {
		alert("필수 사항을 입력하지 않았습니다.");
		return false;
	}
	//비밀번호, 비밀번호 확인 일치
	else if(form.password.value != form.password2.value) {
		alert("비밀번호가 일치하지 않습니다.");
		form.password.focus();
		return false;

	}
	else if (!/^[A-Za-z0-9]*.{8,16}$/.test(form.password.value)) {
		alert('비밀번호는 숫자와 영문자 조합으로 8~20자리를 사용해야 합니다.');
		form.password.focus();
		return false; 
    }

	
}
</script>

<?php
include 'footer.html';
?>