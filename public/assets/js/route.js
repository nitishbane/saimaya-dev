function doroute(){
	$("#area-select").on("change", function(){
		var selected_area_id = $(this).val();
		var url = "/saimay/public/admin/stop/getStops/" + selected_area_id;
		$.ajax({
			url: url,
			type: "GET",
			success: function(response){
				$("#area-stop").empty();
				$("#area-stop").append(new Option("Select Stop", ""));
				if(response.data != "0"){
					// error
					// console.log(response);
					$.each(response.data, function(i, item){
						$("#area-stop").append(new Option(item.name, item.id));
					});
				}else{
					// console.log(response);	
				}
			}
		});
	});
	
	$("#area-stop").on("change", function(){
		var html = '<div class="row"><div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label class="control-label">'+$("#area-stop option:selected").text()+'</label></div><div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><input type="text" name="stop-time[]" class="stop-time form-control" placeholder="Enter stop time"></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-times"></i></div></div>';
		$(".stop-table").append(html);
	});
}