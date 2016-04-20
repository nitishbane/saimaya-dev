$(document).ready(function()
{
	
	getSource();
	
});

function getSource()
{
	$.ajax({
		url:'getSource',
		success : function(data)
		{			
			console.log(data);
			var data = $.parseJSON(data);
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
				$('.select2-selection__rendered').html(data.text);
			});
		}

	});
}