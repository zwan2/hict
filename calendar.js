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



		events: 'events_load.php',

		eventClick: function(event, jsEvent, view) {
			//$('#modalTitle').html(event.title);
            $('#modal_start').html(event.start);
            
            $('#modal_body').html(event.description);
            
            
            $('#detail_data').modal();
		}	
	});

	
	
});


