$(document).ready(function() {

	$('#calendar').fullCalendar({


		schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
		
		editable: false,


		displayEventTime: false,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'agendaWeek, listWeek'
		},
		noEventsMessage: "예약 없음",			

		defaultView: 'agendaWeek',
		
		views: {
			listWeek: {
				buttonText: '목록'
			}
		},
		
		
  
		//가로줄
		allDaySlot: false,
		columnFormat: 'D ddd',
		
		
		//세로줄 
		contentHeight: 'auto',
		
		titleFormat: 'MM. D',
		
		slotLabelFormat: 'H',
		timeFormat: 'H:mm',

		minTime: '09:00:00',
		maxTime: '22:00:00',

	    eventSources: [

	        //대기
	        {
	            url: './events_load.php',                
	            color: '#666666',   
	            textColor: 'white',
	        },

	        //승인
	        {
	            url: './events_load2.php',                   
	            color: '#64B5F6',
	            textColor: 'white' 
	        },


	        //거절
	        {
	            url: './events_load3.php',                   
	            color: '#E57373',
	            textColor: 'white' 
	        }

  		],
	  	
	

		eventClick: function(event, jsEvent, view) {
			$('#start').html(moment(event.start).format('MMM Do H:mm'));
			$('#end').html(moment(event.end).format('H:mm'));
			$('#name').html(event.title);
			$('#total_number').html(event.total_number);

			$('#purpose').html(event.purpose);
			$('#tool').html(event.tool);
			$('#extra').html(event.extra);

            $('#detail_data').modal();
		}	



	});
	
});


