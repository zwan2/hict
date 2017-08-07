$(document).ready(function(){
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
          url: 'getmybooking_message.php',
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
  })
});