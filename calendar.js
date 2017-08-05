$(document).ready(function() {

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();	


	$('#calendar').fullCalendar({


		schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
		
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'agendaWeek, listWeek'
		},
		
		views: {
			listWeek: {
				buttonText: '목록'
			}
		},
		noEventsMessage: "예약 없음",			

		defaultView: 'agendaWeek',
		
		//가로줄
		allDaySlot: false,
		columnFormat: 'D ddd',



		editable: false,
		
		
		//세로줄 
		contentHeight: 'auto',
		
		titleFormat: 'MM. D',
		
		slotLabelFormat: 'H',
		timeFormat: 'H:mm',

		minTime: '09:00:00',
		maxTime: '22:00:00',



		events: '/events_load.php',

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


