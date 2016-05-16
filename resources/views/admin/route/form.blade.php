@extends('admin.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header">Route Form</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
	    <div class="col-lg-6">
	        <form role="form" class="form-horizontal" method="post" action="{{ URL('admin/route/save') }}">
	        	{{ csrf_field() }}

	        	<div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="source-area" class="control-label">Source</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<select class="form-control" name="source-area" id="source-area">
							<option>Select Source Area</option>
							@foreach($areas as $area)
								<option value="{{ $area->id }}">{{ $area->name }}</option>
							@endforeach
						</select>
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="destination-area" class="control-label">Destination</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<select class="form-control" name="destination-area" id="destination-area">
							<option>Select Destination Area</option>
							@foreach($areas as $area)
								<option value="{{ $area->id }}">{{ $area->name }}</option>
							@endforeach
						</select>
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="destination-area" class="control-label">Bus</label>
	            	</div>
	                
	                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	                	<select class="form-control" name="destination-area" id="destination-area">
							<option>Select Bus</option>
							@foreach($buses as $bus)
								<option value="{{ $bus->id }}">{{ $bus->name }}</option>
							@endforeach
						</select>
	                </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	            		<label for="destination-area" class="control-label">Stop</label>
	            	</div>

	            	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
	            		<div class="row add-stop">
	            			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	            				<button type="button" class="btn btn-default btn-block fa fa-plus" data-toggle="modal" data-target="#stops-modal"></button>
	            			</div>
	            		</div>
	            	</div>
	            </div>

	            <button type="submit" class="btn btn-default btn-block">Submit</button>
	            <!-- <button type="reset" class="btn btn-default col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-5 col-md-5 col-sm-5 col-xs-5"></button> -->
	        </form>
	    </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="stops-modal" tabindex="-1" role="dialog" aria-labelledby="stops-modalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="stops-modalLabel">Modal title</h4>
			</div>
			<div class="modal-body">
				Modal body
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    doroute();
});
</script>
@endsection

@section('js_content')
<script src="{{ URL::asset('assets/js/route.js') }}"></script>
@endsection