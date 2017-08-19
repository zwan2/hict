<!DOCTYPE html> 
<html> 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#4285f4">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#4285f4">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#4285f4">

  <title>휴먼ICT 실습실</title>


  <script src="//code.jquery.com/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/latest/css/bootstrap.min.css">
    
  <link rel="stylesheet" type="text/css" href="introduction.css">
</head>


<body>

  
    <div class="float_right">
      <a href="login_page.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
    </div>

    <div class="col-xs-12 col-sm-12 intro_bg" id="intro1">
      <h1 class="table_title">휴먼 ICT 연계 전공</h1>
      <div class="col-xs-12 col-sm-8 col-sm-offset-2" >
        <a class="btn btn-default btn-block ellipsis button" href="#intro2" role="button"><strong>실습실은 어떤 곳인가요?</strong> <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> </a>
      </div>

    </div>

    <div class="col-xs-12 col-sm-12 intro_bg" id="intro2">
      <h1 class="table_title">휴먼 ICT 연계 전공</h1>
      
      <div class="col-xs-12 col-sm-8 col-sm-offset-2" >
        <a class="btn btn-default btn-block ellipsis button" href="#intro3" role="button">어떤 장비를 보유하고 있나요?</a>
      </div>
    </div>


    <div class="col-xs-12 col-sm-12 intro_bg" id="intro3">
      <h1 class="table_title">휴먼 ICT 연계 전공</h1>

      <div class="col-xs-12 col-sm-8 col-sm-offset-2" >
        <a class="btn btn-default btn-block ellipsis button" href="login_page.php" role="button">예약하러 가기</a>
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