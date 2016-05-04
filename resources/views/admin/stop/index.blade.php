@extends('admin.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header">Stops</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form role="form" action="{{ URL('admin/stop/save') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
	                <label for="stop-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">stop</label>

	                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
	                    <input type="text" name="stop-name" id="stop-name" class="form-control" placeholder="Enter stop name">
	                </div>
	            </div>

                <input type="hidden" name="stop-id" id="stop-id" value="">
                
                <button type="submit" class="btn btn-default col-lg-3 col-md-3 col-sm-3 col-xs-3">Save</button>
                <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
            </form>
        </div>
    </div>

    <div class="row">
        &nbsp;
    </div>

    @if(count($stops))
    <div class="row">
        <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th class="col-lg-8 col-md-8 col-sm-8 col-xs-8">Name</th>
                        <th class="col-lg-4 col-md-4 col-sm-4 col-xs-4">&nbsp;</th>
                        <!-- <th>Username</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($stops as $stop)
                        <tr>
                            <!-- <td>{{ $stop->id }}</td> -->
                            <td>{{ $stop->name }}</td>
                            <td>
                                <i class="fa fa-edit btn btn-default edit-stop" data-toggle="modal" data-target="#edit-stop-modal" data-stop="{{ json_encode($stop) }}"></i>
                                <i class="fa fa-times btn btn-default delete-stop" data-stop="{{ json_encode($stop) }}"></i>
                            </td>
                            <!-- <td>@mdo</td> -->
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">{{ $stops->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection