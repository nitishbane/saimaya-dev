@extends('admin.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header">Bus Form</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
	    <div class="col-lg-6">
	        <form role="form" class="form-horizontal" method="post" action="{{ URL('admin/bus/save') }}">
	        	{{ csrf_field() }}

	        	<div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="bus-type" class="control-label">Bus Type</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<select class="form-control" name="bus-type" id="bus-type">
							<option value="">Select Bus Type</option>
							<option value="seater" {{ ($bus->type == "seater") ? "selected" : "" }}>Seat</option>
							<option value="sleeper" {{ ($bus->type == "sleeper") ? "selected" : "" }}>Sleeper</option>
							<option value="semi_sleeper" {{ ($bus->type == "semi_sleeper") ? "selected" : "" }}>Semi-Sleeper</option>
						</select>
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="bus-name" class="control-label">Bus Name</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<input type="text" name="bus-name" id="bus-name" class="form-control" placeholder="Enter bus name" value="{{ $bus->name }}">
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="bus-number" class="control-label">Bus Number</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<input type="text" name="bus-number" id="bus-number" class="form-control" placeholder="Enter bus number" value="{{ $bus->number }}">
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="is-video-coach" class="control-label">Video Coach</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<select class="form-control" name="is-video-coach" id="is-video-coach">
							<option value="0" {{ ($bus->is_video_coach == "0") ? "selected" : "" }}>No</option>
							<option value="1" {{ ($bus->is_video_coach == "1") ? "selected" : "" }}>Yes</option>
						</select>
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="is-ac" class="control-label">AC</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<select class="form-control" name="is-ac" id="is-ac">
							<option value="0" {{ ($bus->is_ac == "0") ? "selected" : "" }}>No</option>
							<option value="1" {{ ($bus->is_ac == "1") ? "selected" : "" }}>Yes</option>
						</select>
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="cost-per-seat" class="control-label">Cost Per Seat</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<input type="text" name="cost-per-seat" id="cost-per-seat" class="form-control" placeholder="Enter cost per seat" value="{{ $bus->cost_per_seat }}">
	                </div>
	            </div>

	            <input type="hidden" name="bus-id" value="{{ $bus->id }}">

	            <button type="submit" class="btn btn-default btn-block">Submit</button>
	            <!-- <button type="reset" class="btn btn-default col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-5 col-md-5 col-sm-5 col-xs-5"></button> -->
	        </form>
	    </div>
	</div>
</div>
@endsection