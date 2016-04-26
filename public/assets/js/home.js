$(document).ready(function()
{
	$('.to-stop').select2({
		  placeholder: "Select Destination",
		  allowClear: true
	});
	initDatePicker();
	getSource();
	
});

function getSource()
{
	$('.to-stop').prop("disabled", true);
	$('.to-stop').select2({
		  	placeholder: "Select Destination",
		  	allowClear: true
	});
	$.ajax({
		url:'getSource',
		success : function(data)
		{			
			console.log(data);
			//var data = $.parseJSON(data);
			var select_html = '<option value="Select">Select Source</option>';
			for(var i=0;i<data.length;i++)
			{
				select_html += '<option value="'+data[i].id+'">'+data[i].text+'</option>';
			}
			$('.from-stop').html(select_html);
			$('.from-stop').select2({
		  		placeholder: "Select Source",
		  		allowClear: true
			});
			console.log(data);

			$('.from-stop').on('change',function()
			{

				var data = $(this).select2('data')[0];
		  		console.log(data.text);
		  		$('.from-stop').each(function()
		  		{
		  			$(this).val(data.id);
		  		});
		  		$('input[name="hidden_source"]').val(data.text);
				$('.from-stop').parent().find('.select2-selection__rendered').html(data.text);
				if(data.id == 'Select')
					$('.to-stop').prop("disabled", true);
				else
				{
					$('.to-stop').prop("disabled", false);
					getDestination(data);
				}
				
			});
		}

	});
}

function getDestination(data)
{
	$.ajax({
		url : 'getDestination/'+data.id,
		success : function(data)
		{
			console.log(data);
			var select_html = '<option value="Select">Select Destination</option>';
			for(var i=0;i<data.length;i++)
			{
				select_html += '<option value="'+data[i].id+'">'+data[i].text+'</option>';
			}
			$('.to-stop').html(select_html);
		}
	});

	$('.to-stop').on('change',function()
			{

				var data = $(this).select2('data')[0];
		  		console.log(data.text);
		  		$('.to-stop').each(function()
		  		{
		  			$(this).val(data.id);
		  		});
				$('.to-stop').parent().find('.select2-selection__rendered').html(data.text);
				$('input[name="hidden_dest"]').val(data.text);
			});
}

function initDatePicker()
{
	$('.date').datepicker({
		minDate : new Date(),
		maxDate : "+1M",
		onSelect : function(selected_date)
		{
			$('.date').val(selected_date);
		}
	});
}

function validateForm()
{
	var from = $('.from-stop').val();
	var to = $('.to-stop').val();
	var date = $('.date').val();
	if(from == '' || from == 'Select')
	{
		alert('Please Select Source');
		return false;
	}
	else if(to == '' || to == 'Select')
	{
		alert('Please Select Destination');
		return false;
	}
	else if(date == '')
	{
		alert('Please Select Date Of Journey');
		return false;
	}

}