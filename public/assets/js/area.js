function doarea(){
	$(".edit-area").on("click", function(){
		var area = $(this).data("area");
		// console.log($("#area-name").val());
		$(".area-name").val(area.name);
		$(".area-id").val(area.id);
	});

	$('#edit-area-modal').on('hidden.bs.modal', function (e) {
		$(".area-id").val("");
	});

	$(".delete-area").on("click", function(){
		var area = $(this).data("area");
		var cur_area = $(this);
		var url = "area/delete/" + area.id;
		$.ajax({
			url: url,
			type: "GET",
			success: function(response){
				console.log(response);
				if(response.deleted == "1"){
					cur_area.closest('tr').remove();
				}else if(response.deleted == "0"){
					// error
				}
			}
		});
	});
}