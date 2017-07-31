<?
    include 'main.html';
    include 'function.php';
?>
<div class="container">
  <div class="page-header">
      <h1>계정 설정</h1>
  </div>

    <form class="form-horizontal">
     
      <div class="form-group">
        <div class="col-xs-10">
          <label for="student_number"> 학번</label>
          <p class="form-control-static">123456789</p>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="password">비밀번호</label>
          <input type="password" class="form-control" id="password" placeholder="영문, 숫자 혼용 8-20자리" maxlength="20">
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="password2">비밀번호 확인</label>
          <input type="password" class="form-control" id="password2" maxlength="20">
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="name">이름</label>
          <p class="form-control-static">ㅇㅇㅇ</p>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="major">원전공</label>
          <p class="form-control-static">ㅇㅇㅇㅇㅇㅇ</p>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="email">E-mail</label>
          <input class="form-control" id="focusedInput" type="text" value="aaaa@naver.com">
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <label for="tel">연락처</label>
          <input class="form-control" id="focusedInput" type="text" value="000-0000-0000">
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <button class="btn btn-default" type="button">저장</button>
        </div>
      </div>
      
    </form>   
</div>

</body>
</html>
