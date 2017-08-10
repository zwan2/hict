<?php
include 'main.html';


$student_number = $_SESSION['student_number'];

$query = "SELECT password FROM member WHERE student_number = $student_number";
  
if($result = $db->query($query)) {
  $row = $result->fetch_assoc();  
  $password = $row['password'];
}

?>
<div class="container">
  <div class="page-header">
    <h1>계정 설정</h1>
  </div>
<a class="btn btn-default" onclick="window.history.back();" role="button">뒤로</a><br/><br/>
<form method="post" action="account_delete2.php" onsubmit="return password_check();" name="account" class="form-horizontal">
	<input type="hidden" name="crypt_password" value="<?=$password?>">
	<div class="form-group">
		<div class="col-xs-10">
			<label for="password">비밀번호</label>
			<input type="password" class="form-control" name="password" placeholder="영문, 숫자 혼용 8-20자리" maxlength="20">
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-10">
			<label for="password2">비밀번호 확인</label>
			<input type="password" class="form-control" name="password2" maxlength="20">
		</div>
	</div>

	<div class="form-group">
    <div class="col-xs-10">
      <input class="btn btn-default" type="submit" onclick="return confirm('정말 탈퇴하시겠습니까?');" value="탈퇴">
    </div>
  </div>
</form>

 </div>

<script type="text/javascript">

function password_check(){
  var form = document.account;
  if(form.password.value=="") {
    alert("비밀번호를 입력해야합니다.");
    form.password.focus();
    return false;
  } 
  
  if(form.password.value!="") {
    //비밀번호 != 비밀번호 확인
    if(form.password.value != form.password2.value) {
      alert("비밀번호가 일치하지 않습니다.");
      form.password.focus();
      return false;
    }  
  }
}
</script>
