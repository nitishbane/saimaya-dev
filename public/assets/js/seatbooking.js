var selected_seats = 0;
var selected_seat_nos = [];
$(document).ready(function()
{
	$('.loadseats').on('click',function()
	{
		var bus_route_map = $(this).attr('data-route_map');
		var journey_date = $(this).attr('data-date');
		var bus_type = $(this).attr('data-bus_type').toLowerCase();
		$('input[name="seats[]"]').val('');
		$('.selected').removeClass('selected');
		$('#passenger_details').html('');
		selected_seats = 0;
		selected_seat_nos = [];
		$.ajax({
			url : 'getSeatInfo',
			data :{"bus_route_map_id":bus_route_map,"date":journey_date},
			success:function(data)
			{
				console.log(data);
				if(data.length > 0)
				{
					for(var i=0;i<data.length;i++)
					{
						$('.tableCell[data-seat_no="'+data[i].seat_no+'"]').attr('disabled',true);
						$('.tableCell[data-seat_no="'+data[i].seat_no+'"]').parent().find($('input[name="seats"]')).attr('disabled',true);					
						$('.tableCell[data-seat_no="'+data[i].seat_no+'"]').addClass('Booked');
					}
				}
				$('#businfo .seater').hide();
				$('#businfo .sleeper').hide();
				if(bus_type == 'seater')
					$('#businfo .seater').show();
				else
					$('#businfo .sleeper').show();
				$('#businfo').modal('show');

			}

		});		
		
		$('input[name="bus_route_map"]').val(bus_route_map);
	});
	$('.tableCell').on('click',function()
	{
		var seat_no = $(this).html();
		var index = $.inArray(seat_no,selected_seat_nos);
		if(index == -1)
		{
			if(selected_seats < 10)
			{
				selected_seat_nos.push(seat_no);				
			}
			else
			{
				alert('You can book maximun of 10 tickets at once');
				return;
			}
		}
		else
		{
			selected_seat_nos.splice(index,1);
		}
		
		if($(this).hasClass('selected'))
		{
			$(this).removeClass('selected');
			$(this).parent().find('input[type="hidden"]').attr('disabled',true);
			$(this).parent().find('input[type="hidden"]').val('');
			selected_seats--;
		}
		else
		{
			selected_seats++;
			$(this).addClass('selected');
			$(this).parent().find('input[type="hidden"]').attr('disabled',false);
			$(this).parent().find('input[type="hidden"]').val(seat_no);
		}
		console.log(selected_seat_nos);
		createPassengerDetails();
	});
	
});

function createPassengerDetails()
{
	var html = '';
	for(var i=0;i<selected_seat_nos.length;i++)
	{
		html += '<tr><td><label>Passenger Name:</lable></td><td><input type="text" name="pname[]" placeholder="Passenger Name" class="form-control"></td><td><label>Gender</label></td><td><select class="form-control" name="gender[]"><option value="M">Male</option><option value="F">Female</option></select></td></tr>';	
	}
	$('#passenger_details').html(html);
	
}

function validateSeats()
{
	$('input[name="pname[]"]').each(function()
	{

	});	

}