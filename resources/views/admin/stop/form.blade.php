@extends('admin.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header">Add New Stop</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
	    <div class="col-lg-6">
	        <form role="form" class="form-horizontal" method="post" action="{{ URL('admin/stop/save') }}">
	        	{{ csrf_field() }}
	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="area-name" class="control-label">Area</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<select class="form-control" name="area-name" id="area-name">
							<option>Select Area</option>
							@foreach($areas as $area)
								{{ $selected = "" }}
	                    		@if($stop_detail->area_id == $area->id)
	                    			{{ $selected = "selected" }}
	                    		@else
	                    			{{ $selected = "" }}
	                    		@endif
								<option value="{{ $area->id }}" {{ $selected }}>{{ $area->name }}</option>
							@endforeach
						</select>
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="stop-name" class="control-label">Stop Name</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<input type="text" name="stop-name" id="stop-name" class="form-control" placeholder="Enter stop name" value="{{ $stop_detail->name }}">
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="full-address" class="control-label">Full Address</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<textarea class="form-control" rows="3" placeholder="Enter full address" name="full-address" id="full-address">{{ $stop_detail->full_address }}</textarea>
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="description" class="control-label">Description</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<textarea class="form-control" rows="3" placeholder="Enter Description" name="description" id="description">{{ $stop_detail->description }}</textarea>
	                </div>
	            </div>

	            <input type="hidden" name="stop-id" value="{{ $stop_detail->id }}">

	            <button type="submit" class="btn btn-default btn-block">Submit</button>
	            <!-- <button type="reset" class="btn btn-default col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-5 col-md-5 col-sm-5 col-xs-5"></button> -->
	        </form>
	    </div>
	</div>
@endsection