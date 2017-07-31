<?php
    include 'main.html';
?>
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
      <tr>
        <td>3</td>
      	<td> <a href="#" data-toggle="modal" data-target="#detail_data"> 2017.00.00.(금) 09:00 ~ 10:00 </a> </td>
        <td>ㅇㅇㅇ</td>
      	
      	<td><u data-toggle="modal" data-target="#change">승인</u></td>

      </tr>
      <tr>
        <td>2</td>
      	<td> <a href="#" data-toggle="modal" data-target="#detail_data"> 2017.00.00.(금) 09:00 ~ 10:00 </a> </td>
      	<td>ㅇㅇㅇ</td>
        
      	<td><u data-toggle="modal" data-target="#change">대기</u></td>

      </tr>

      <tr>
        <td>1</td>
        <td> <a href="#" data-toggle="modal" data-target="#detail_data"> 2017.00.00.(금) 09:00 ~ 10:00 </a> </td>
        <td>ㅇㅇㅇ</td>
        
        <td><u data-toggle="modal" data-target="#change">거절</u></td>
   
      </tr>    
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


 <!-- 상세 예약 정보 modal -->
  <div class="modal fade" id="detail_data" tabindex="-1" role="dialog" aria-labelledby="detail_dataLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modalTitle">상세 예약 정보</h4>
        </div>

        <!--MODAL-->
        <div class="modal-body" id="modalBody">
          <h4 class="modal-title">시간</h4>
          <p>07-03 13:00 ~ 07-03 14:00</p>
          <br/>
          <h4 class="modal-title">총 인원</h4>
          <p>이재완 포함 5명</p>
          <br/>
          <h4 class="modal-title">용도</h4>
          <p>스터디</p>
          <br/>
          <h4 class="modal-title">장비</h4>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="" checked disabled>
              VR
            </label>
            <label>
              <input type="checkbox" value="" disabled>
              3D 프린터
            </label>  
            <label>
              <input type="checkbox" value="" disabled>
              TV
            </label>      
              <label>
              <input type="checkbox" value="" disabled>
              카메라
            </label>
            <label>
              <input type="checkbox" value="" checked disabled>
              프린터
            </label>
            <label>
              <input type="checkbox" value="" checked disabled>
              삼성 기어
            </label>
            <label>
              <input type="checkbox" value="" disabled>
              삼성 360
            </label>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>
        </div>
      </div>
    </div>
  </div>


<!-- 상태변경(대기, 승인, 취소) modal -->
<div class="modal fade bs-example-modal-sm" id="change" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalTitle">승인 여부</h4>
      </div>


      <div class="modal-body">
        <h4 class="modal-title">승인 여부</h4>
        <label class="radio-inline">
          <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 승인
        </label>
        <label class="radio-inline">
          <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 거절
        </label>
        <br/><br/>

        <h4 class="modal-title">전달 사항(선택)</h4>
        <input type="text" class="form-control">

      </div>

       <div class="modal-footer">
        <button type="button" class="btn btn-primary">확인</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">뒤로</button>  
      </div>
      
    </div>
  </div>
</div>

</body>
</html>