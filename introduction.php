<!DOCTYPE html> 
<html> 
<head>
  <link href='//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSans-kr.css' rel='stylesheet' type='text/css'>
  <!--
  <link href="//fonts.googleapis.com/earlyaccess/notosanskr.css" rel="stylesheet" type="text/css">
  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/latest/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="introduction.css">
  <script src="//code.jquery.com/jquery.min.js"></script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#666666">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#666666">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#666666">

  <title>휴먼ICT 실습실</title>


</head>


<body>

  
    <div class="float_right">
      <a href="login_page.php"><i class="material-icons">clear</i></a>
    </div>

    <div class="col-xs-12 col-sm-12 intro_bg" id="intro1">
      <h1 class="table_title">휴먼 ICT 연계 전공</h1>
      <p id="intro1_text">미디어 콘텐츠에 실용 가치를 부여하는 창조인재 육성문화</p>
      <div class="col-xs-12 col-sm-8 col-sm-offset-2" >
        <a class="btn btn-default btn-block ellipsis button" href="#intro2" role="button"><strong>실습실은 어떤 곳인가요?</strong> <i class="material-icons">arrow_downward</i> </a>
      </div>

    </div>

    <div class="col-xs-12 col-sm-12 intro_bg" id="intro2">
      <h1 class="table_title">휴먼 ICT 연계 전공</h1>
      
      <div class="col-xs-12 col-sm-8 col-sm-offset-2" >
        <a class="btn btn-default btn-block ellipsis button" href="#intro3" role="button"><strong>어떤 장비가 있나요?</strong> <i class="material-icons">arrow_downward</i> </a>
      </div>
    </div>


    <div class="col-xs-12 col-sm-12 intro_bg" id="intro3">
      <h1 class="table_title">휴먼 ICT 연계 전공</h1>

      <div class="col-xs-12 col-sm-8 col-sm-offset-2" >
      <div class="panel panel-default">
        <div class="panel-body">
          Basic panel example
        </div>
      </div>

        <a class="btn btn-default btn-block ellipsis button" href="#" onclick="location.href='login_page.php'" role="button"><strong>예약하러 가기</strong> <i class="material-icons">arrow_downward</i></a>
      </div>
    </div>





</body>
   
<script type="text/javascript">
jQuery(document).ready(function($) {
  $(".button").click(function(event){            
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
  });
});
</script>




<?php
include 'footer.html';
?>