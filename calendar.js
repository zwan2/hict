$(document).ready(function() {

	$('#calendar').fullCalendar({


		schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
		
		editable: false,


		displayEventTime: false,
		nowIndicator: true,
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
	        },


	        //배경 이벤트
	        {
		        events: [
					//관리자
			        {
				        dow: [1],
				        start: '13:00',
				        end: '16:00'
				    },
				    {
				        dow: [1],
				        start: '18:00',
				        end: '18:00'
				    },
				    {
				        dow: [2],		        
				        start: '09:00',
				        end: '10:30'
				    },
				    {
				        dow: [2],		        
				        start: '13:00',
				        end: '15:00'
				    },
				    {
				        dow: [3],		        
				        start: '12:00',
				        end: '15:00'
				    },
				    {
				        dow: [4],		        
				        start: '12:00',
				        end: '17:00'
				    },
				    {
				        dow: [4],		        
				        start: '17:00',
				        end: '19:00'
				    },
				    {
				        dow: [5],		        
				        start: '15:00',
				        end: '18:00'
				    },
				],
				rendering: 'background',
				backgroundColor: '#BBDEFB'
			},
			{
				events: [
				    //수업
				    {
				        dow: [2],		        
				        start: '10:30',
				        end: '12:00'
				    },
				    {
				        dow: [2],		        
				        start: '15:00',
				        end: '18:00'
				    },
				    {
				        dow: [3],		        
				        start: '15:00',
				        end: '17:00'
				    },
				    {
				        dow: [4],		        
				        start: '10:30',
				        end: '12:00'
				    },
				    {
				        dow: [5],		        
				        start: '11:00',
				        end: '15:00'
				    },
		   		],
		   		rendering: 'background',
		   		backgroundColor: '#FFCDD2'
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


