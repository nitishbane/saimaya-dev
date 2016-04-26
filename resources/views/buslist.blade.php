@extends('layouts.app')

@section('content')
<h1 style="text-align:center;color:#000">{{$details["source"]}} To {{$details["destination"]}}</h1>
<h5 style="text-align:center;color:#000">{{$details["date"]}}</h5>
<div class="container">
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>Bus Name</th>
                <th>Departure </th>
                <th>Arrival </th>
                <th>Duration</th>
                <th>Seats Available</th>
                <th>Price</th>
            </tr>
            @foreach($buses as $bus)
            <tr>
                <td>{{$bus->name}}</td>
                <td>6:30</td>
                <td>4:30</td>
                <td>8 hrs</td>
                <td>30</td>
                <td>200</td>
            </tr>
            @endforeach    
        </table>
     </div>   
</div>

@endsection