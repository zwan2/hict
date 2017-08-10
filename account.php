<?php
include 'main.html';


$student_number = $_SESSION['student_number'];

$query = "SELECT * FROM member WHERE student_number = $student_number";
  
if($result = $db->query($query)) {
  $row = $result->fetch_assoc();  
}


//echo $row['password'];
?>
<div class="container">
  <div class="page-header">
      <h1>계정 설정</h1>
  </div>

    <form method="post" action="account_set.php" onsubmit="return account_check();" name="account" class="form-horizontal">
     
      <div class="form-group">
        <div class="col-xs-10">
          <label for="student_number"> 학번</label>
          <input type="hidden" name="student_number" value="<?=$row['student_number']?>">
          <p class="form-control-static"><?=$row['student_number']?></p>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="name">이름</label>
          <p class="form-control-static"><?=$row['name']?></p>
        </div>
      </div>

     

      <div class="form-group">
        <div class="col-xs-10">
          <label for="email">E-mail</label>
          <input class="form-control" name="email" type="email" value="<?=$row['email']?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="tel">연락처</label>
          <input class="form-control" name="tel" type="tel" value="<?=$row['tel']?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="password">새 비밀번호</label>
          <input type="password" class="form-control" name="new_password" placeholder="영문, 숫자 혼용 8-20자리" maxlength="20">
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="password2">새 비밀번호 확인</label>
          <input type="password" class="form-control" name="new_password2" maxlength="20">
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="password">비밀번호(필수)</label>
          <input type="password" class="form-control" name="password" placeholder="기존 비밀번호 입력" maxlength="20">
        </div>
      </div>

      



      <div class="form-group">
        <div class="col-xs-10">
          <input class="btn btn-default" type="submit" onclick="return confirm('이대로 계정을 저장하시겠습니까?');" value="저장">
        </div>
      </div>
      
    </form>   

    <a href="#"><button class="btn btn-default" type="button" onclick="location.href='account_delete.php'">회원탈퇴</button>
</div>

</body>
</html>

<script type="text/javascript">

function account_check(){
  var form = document.account;
  if(form.password.value=="") {
    alert("비밀번호를 입력해야합니다.");
    form.password.focus();
    return false;
  } 
  
  if(form.new_password.value!="") {
    //새 비밀번호 != 새 비밀번호 확인
    if(form.new_password.value != form.new_password2.value) {
      alert("새 비밀번호가 일치하지 않습니다.");
      form.password.focus();
      return false;
    }  
    else if (!/^[A-Za-z0-9]*.{8,16}$/.test(form.new_password.value)) {
      alert('비밀번호는 숫자와 영문자 조합으로 8~20자리를 사용해야 합니다.');
      form.password.focus();
      return false; 
    }
  }
}
</script>
