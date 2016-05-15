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
                <td>{{65 - $bus->total_seats}}</td>
                <td><span>{{$bus->cost_perseat}}</span>
                    <span>   
                        <button type="button" class="btn btn-info loadseats" data-route_map="{{$bus->bus_route_map_id}}" data-date="{{$details["date"]}}" data-bus_type="{{$bus->type}}">Book Seats</button>
                    </span>       
                </td>
            </tr>
            @endforeach    
        </table>
     </div>   
</div>

<div id="businfo" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <form method="post" action="{{url('bookticket')}}" onSubmit="return validateSeats()">
         {!! csrf_field() !!}
         <input type="hidden" name="bus_route_map" value="">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Booking Status</h4>
            </div>
            <div class="modal-body">

                <div class="seat-container">
                    <div class="left-side-column">
                        <table id="passenger_details" class="table">
                    
                        </table>
                    </div>
    
                    <div class="right-side-column">
                        <div class="ChartDisplay">
                            <table align="Center" border="0" class="seater">
                                <tbody>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >D</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="D">D</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >C</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="C">C</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >B</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="B">B</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >A</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="A">A</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >E</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="E">E</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >F</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="F">F</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >G</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="G">G</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >H</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="H">H</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="L">L</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >K</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="K">K</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >J</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="J">J</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >I</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="I">I</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >M</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="M">M</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >N</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="N">N</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >1</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="1">1</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >2</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="2">2</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >6</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="6">6</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >5</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="5">5</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >4</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="4">4</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >3</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="3">3</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                    </tr>
                                    <tr>                                                                                                                                                                                                                                                                                                                                                             
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox"><label>7</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="7">7</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td id="td_SingleTrip51" valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox"><label>8</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="8">8</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td id="62" valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px">
                                            <span style="display:none;"><input type="checkbox"><label >9</label></span>
                                            <button type="button"  align="center" class="tableCell" data-seat_no="9">9</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >10</label></span>
                                            <button type="button"  align="center" class="tableCell" data-seat_no="10">10</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="2" style="display:none;height:80px;">
                                            <span></span>
                                        </td>
                                    </tr>
                                    <tr>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox"><label>14</label></span>
                                            <button type="button"  align="center" class="tableCell" data-seat_no="13">14</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >13</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="13">13</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">12</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="12">12</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">11</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="11">11</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                            <td id="75" valign="middle" align="center" class="blankCell" rowspan="2" style="display:none;height:80px;">
                                            <span></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">15</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="15">15</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">16</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="16">16</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">17</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="17">17</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">18</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="18">18</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="2" style="display:none;height:80px;">
                                            <span></span>
                                        </td>
                                    </tr>           
                                    <tr>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">22</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="22">22</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">21</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="21">21</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">20</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="20">20</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">19</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="19">19</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="2" style="display:none;height:80px;">
                                            <span></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">23</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="23">23</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">24</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="24">24</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">25</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="25">25</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">26</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="26">26</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="2" style="display:none;height:80px;">
                                            <span></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">30</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="30">30</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">29</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="29">29</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">28</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="28">28</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">27</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="27">27</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="2" style="display:none;height:80px;">
                                            <span></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">31</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="31">31</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">32</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="32">32</button>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">33</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="33">33</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">34</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="34">34</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td  valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none">35</span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="35">35</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="2" style="display:none;height:80px;">
                                            <span></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" class="blankCell" rowspan="2" style="display:none;height:80px;"><span></span></td>
                                    </tr>
                                </tbody>
                            </table> 

                            <table align="Center" border="0" class="sleeper">
                                <tbody>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >1U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="1U">1U</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >1L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="1L">1L</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;" width="60px">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >7L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="7L">7L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >8L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="8L">8L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >7U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="7U">7U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox"><label>8U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="8U">8U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >2U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="2U">2U</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >2L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="2L">2L</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >9L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="9L">9L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >10L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="10L">10L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >9U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="9U">9U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox"><label>10U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="10U">10U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >3U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="3U">3U</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >3L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="3L">3L</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >11L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="11L">11L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >12L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="12L">12L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >11U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="11U">11U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox"><label>12U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="12U">12U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >4U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="4U">4U</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >4L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="4L">4L</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >13L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="13L">13L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >14L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="14L">14L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >13U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="13U">13U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox"><label>14U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="14U">14U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >5U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="5U">5U</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >5L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="5L">5L</button>
                                            <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="blankCell" rowspan="1" style="height:40px;">
                                            <span></span>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >15L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="15L">15L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >16L</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="16L">16L</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox" ><label >15U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="15U">15U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>
                                        <td valign="middle" align="center" class="tooltips" rowspan="1" style="height:40px;">
                                            <span style="display:none;"><input type="checkbox"><label>16U</label></span>
                                            <button type="button"  align="center"  class="tableCell" data-seat_no="16U">16U</button>
                                             <input type="hidden" name="seats[]" disabled>
                                        </td>

                                    </tr>
                                    
                                    <tr>
                                        <td valign="middle" align="center" class="blankCell" rowspan="2" style="display:none;height:80px;"><span></span></td>
                                    </tr>
                                </tbody>
                            </table> 



                        </div>
                    </div>
                </div>
            
            
            </div>
			
			<div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button> 
            </div>   

    </form>
        </div>
    </div>
</div>


<script src="{{ URL::asset('assets/js/seatbooking.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/seatbooking.css') }}">
@endsection