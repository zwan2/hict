<?php
include 'main.html';
?>
<div class="container">
  <div class="page-header">
      <h1>관리자 게시판</h1>

  </div>


<form> 
    <textarea class="form-control" rows="3" placeholder="Text input"></textarea>
    <br/>
    <button type="submit" class="btn btn-default">작성</button>
  </form>





  <br/>
  <table class="table">
    <tr>
      <th>#</th>
        <th>내용</th>
        <th>작성일</th>
        <th>작성자</th>
        <th>삭제</th>
      </tr>
      <tr>
        <td>2</td>
        <td>휴먼 ICT 실습실 공지</td>
        <td>ㅇㅇ</td>
        <td>2017.07.28</td>
        <td><span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="confirm('정말 삭제하시겠습니까?');"></span></td>
      </tr>
      <tr>
        <td>1</td>
        <td>휴먼ICT 실습실 공지</td>
        <td>ㅇㅇ</td>
        <td>2017.07.28</td>
        <td><span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="confirm('정말 삭제하시겠습니까?');"></span></td>
      </tr>

  </table>

</div>

<?php
include 'footer.html';
?>

