function dostop(){
	$(".stop-delete").on("click", function(){
		var stop = $(this).data("stop");
		var cur_stop = $(this);
		var url = "stop/delete/" + stop.id;
		$.ajax({
			url: url,
			type: "GET",
			success: function(response){
				// console.log(response);
				if(response.deleted == "1"){
					cur_stop.closest('tr').remove();
				}else if(response.deleted == "0"){
					// error
				}
			}
		});
	});
}