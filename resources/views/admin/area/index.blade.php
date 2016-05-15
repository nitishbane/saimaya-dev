@extends('admin.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="page-header">Areas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form role="form" action="{{ URL('admin/area/save') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
	                <label for="area-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Area</label>

	                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
	                    <input type="text" name="area-name" id="area-name" class="form-control" placeholder="Enter area name">
	                </div>
	            </div>

                <input type="hidden" name="area-id" id="area-id" value="">
                
                <button type="submit" class="btn btn-default col-lg-3 col-md-3 col-sm-3 col-xs-3">Save</button>
                <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
            </form>
        </div>
    </div>

    <div class="row">
        &nbsp;
    </div>

    @if(count($areas))
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
                    @foreach($areas as $area)
                        <tr>
                            <!-- <td>{{ $area->id }}</td> -->
                            <td>{{ $area->name }}</td>
                            <td>
                                <i class="fa fa-edit btn btn-default edit-area" data-toggle="modal" data-target="#edit-area-modal" data-area="{{ json_encode($area) }}"></i>
                                <i class="fa fa-times btn btn-default delete-area" data-area="{{ json_encode($area) }}"></i>
                            </td>
                            <!-- <td>@mdo</td> -->
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">{{ $areas->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- edit area modal -->
    <div class="modal fade" id="edit-area-modal" tabindex="-1" role="dialog" aria-labelledby="edit-area-modal-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ url('admin/area/save') }}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}

                        <!-- Amount -->
                        <div class="form-group">
                            <label for="area-name" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Area</label>

                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <input type="text" name="area-name" id="area-name" class="form-control area-name" placeholder="Enter area name">
                            </div>
                        </div>

                        <!-- Add bill Button -->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <button type="button" onClick="this.form.reset()" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                        </div>

                        <input type="hidden" name="area-id" id="area-id" class="area-id" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit area modal end -->
    @endif
</div>

<script type="text/javascript">
$(document).ready(function(){
    doarea();
})
</script>
@endsection

@section('js_content')
<script src="{{ URL::asset('assets/js/area.js') }}"></script>
@endsection