<?php
    include 'main.html';
?>


<!-- 상세 예약 정보 modal -->
<div id="detail_data" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="modal-title" class="modal-title">상세 예약 정보</h4>
      </div>

      <!--ajax 기반 비동기 호출-->
      <div id="dynamic-content" class="modal-body">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>
      </div>
    </div>
  </div>
</div>



<!-- 상태변경(대기, 승인, 취소) modal -->
<div class="modal fade bs-example-modal-sm" id="message">
  <div class="modal-dialog modal-sm"> 
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalTitle">승인 여부</h4>
      </div>

      <form method="post" action="bookinglist_change.php" name="bookinglist_message" class="form-horizontal">
        <!--ajax 기반 비동기 호출-->
        <div id="sdynamic-content" class="modal-body">
        </div>


         <div class="modal-footer">
          <button type="submit" class="btn btn-primary" onclick="return confirm('예약 상태를 변경하시겠습니까?');">확인</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>  
        </div>
      </form>
      
    </div>
  </div>
</div>






<div class="container">
 <div class="panel panel-default">
    <div class="panel-heading">예약 리스트</div>

    <table class="table">
      <tr> 
        <th>#</th>
        <th>날짜</th>
        <th>예약자</th>
        
        <th>상태</th>
      </tr>
      <?=bookinglist()?>
    </table>
  </div>  



  

  <nav>
    <ul class="pagination">
      <li>
        <a href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  
</div>



</body>
</html>



<script>$(document).ready(function(){
$(document).ready(function(){
    //날짜 modal
    $(document).on('click', '#modal_toggle', function(e){
  
     e.preventDefault();
  
     var booking_id = $(this).data('id'); // get id of clicked row
  
     $('#dynamic-content').html(''); // leave this div blank
  
     $.ajax({
          url: 'getmybooking.php',
          type: 'POST',
          data: 'id='+booking_id,
          dataType: 'html'
     })
     .done(function(data){
          console.log(data); 
          $('#dynamic-content').html(''); // blank before load.
          $('#dynamic-content').html(data); // load here
     })
     .fail(function(){
          $('#dynamic-content').html('Something went wrong, Please try again...');
     });

    });


    //승인, 거절 message modal
    $(document).on('click', '#smodal_toggle', function(e){
  
     e.preventDefault();
  
     var booking_id = $(this).data('id'); // get id of clicked row
  
     $('#sdynamic-content').html(''); // leave this div blank
  
     $.ajax({
          url: 'bookinglist_message.php',
          type: 'POST',
          data: 'id='+booking_id,
          dataType: 'html'
     })
     .done(function(data){
          console.log(data); 
          $('#sdynamic-content').html(''); // blank before load.
          $('#sdynamic-content').html(data); // load here
     })
     .fail(function(){
          $('#sdynamic-content').html('Something went wrong, Please try again...');
     });

    });


})});
</script>
