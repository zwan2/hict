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



		events: [
			
			
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d-3, 16, 0),
				allDay: false
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d+4, 16, 0),
				allDay: false
			},
			{
				title: 'Meeting',
				start: new Date(y, m, d, 10, 30),
				allDay: false
			},
			{
				title: 'Lunch',
				start: new Date(y, m, d, 12, 0),
				end: new Date(y, m, d, 14, 0),
				allDay: false
			},
			
		],

		eventClick: function(event, jsEvent, view) {
			//$('#modalTitle').html(event.title);
            $('#modal_start').html(event.start);
            
            $('#modal_body').html(event.description);
            
            
            $('#detail_data').modal();
		}	
	});

	
	
});


