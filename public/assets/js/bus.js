function dobus(){
	$(".bus-delete").on("click", function(){
		var bus = $(this).data("bus");
		var cur_bus = $(this);
		var url = "bus/delete/" + bus.id;
		$.ajax({
			url: url,
			type: "GET",
			success: function(response){
				// console.log(response);
				if(response.deleted == "1"){
					cur_bus.closest('tr').remove();
				}else if(response.deleted == "0"){
					// error
				}
			}
		});
	});
}