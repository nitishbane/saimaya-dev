@extends('admin.layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
            <h1 class="page-header">Bus</h1>
        </div>

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <a class="page-header fa fa-plus btn btn-default" href="{{ URL('admin/bus/create') }}"></a>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @if(count($buses))
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
                    @foreach($buses as $bus)
                        <tr>
                            <!-- <td>{{ $bus->id }}</td> -->
                            <td>{{ $bus->name }}</td>
                            <td>
                                <a class="fa fa-edit btn btn-default" href="{{ URL('admin/bus/edit/'. $bus->id) }}"></a>
                                <i class="fa fa-times btn btn-default bus-delete" data-bus="{{ json_encode($bus) }}"></i>
                            </td>
                            <!-- <td>@mdo</td> -->
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">{{ $buses->links() }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @endif
</div>

<script type="text/javascript">
$(document).ready(function(){
    dobus();
});
</script>
@endsection

@section('js_content')
<script src="{{ URL::asset('assets/js/bus.js') }}"></script>
@endsection