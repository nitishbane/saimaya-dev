@extends('layouts.app')

@section('content')
<!-- Slider -->
<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="item active" style="background-image: url(assets/images/slide1.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <form class="form-horizontal well col-sm-8 hidden-xs animation animated-item-4" onSubmit="return validateForm();" method="post" action="{{url('findBus')}}">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="from-stop" class="col-sm-3 control-label">Source</label>
                                            <div class="col-sm-9">
                                                <select class="form-control from-stop" name="source">
                                                    
                                                </select>
                                                <!--<input type="text" class="form-control from-stop" placeholder="Source">-->
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="to-stop" class="col-sm-3 control-label">Destination</label>
                                            <div class="col-sm-9">
                                               <select class="form-control to-stop" name="destination">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="date" class="col-sm-3 control-label">Date</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control date" placeholder="Date" name="journey_date">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">   
                                            <label for="date" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary ">Search Bus</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        <!-- <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="images/slider/img1.png" class="img-responsive">
                            </div>
                        </div> -->

                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(assets/images/slide2.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <form class="form-horizontal well col-sm-8 hidden-xs animation animated-item-4" onSubmit="return validateForm();" method="post" action="{{url('findBus')}}">
                                       {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="from-stop" class="col-sm-3 control-label">Source</label>
                                            <div class="col-sm-9">
                                                 <select class="form-control from-stop" name="source">
                                                   
                                                </select>
                                                <!--<input type="text" class="form-control from-stop" placeholder="Source">-->
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="to-stop" class="col-sm-3 control-label">Destination</label>
                                            <div class="col-sm-9">
                                                <select class="form-control to-stop" name="destination">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="date" class="col-sm-3 control-label">Date</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control date" placeholder="Date" name="journey_date">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">   
                                            <label for="date" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary ">Search Bus</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        <!-- <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="images/slider/img2.png" class="img-responsive">
                            </div>
                        </div> -->

                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(assets/images/slide3.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                               <form class="form-horizontal well col-sm-8 hidden-xs animation animated-item-4" onSubmit="return validateForm();" method="post" action="{{url('findBus')}}">
                                       {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="from-stop" class="col-sm-3 control-label">Source</label>
                                            <div class="col-sm-9">
                                                 <select class="form-control from-stop" name="source">
                                                    
                                                </select>
                                                <!--<input type="text" class="form-control from-stop" placeholder="Source">-->
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="to-stop" class="col-sm-3 control-label">Destination</label>
                                            <div class="col-sm-9">
                                                <select class="form-control to-stop" name="destination">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="date" class="col-sm-3 control-label">Date</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control date" class="date" placeholder="Date" name="journey_date">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">   
                                            <label for="date" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary ">Search Bus</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        <!-- <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="images/slider/img2.png" class="img-responsive">
                            </div>
                        </div> -->

                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</section>

<!-- Features -->
<section id="feature">
    <div class="container">
       <div class="center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <h2>Features</h2>
            <p class="lead">Some of our features</p>
        </div>

        <div class="row">
            <div class="features">
                <div class="col-md-4 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                    <div class="feature-wrap">
                        <i class="fa fa-bullhorn"></i>
                        <h2>Fresh &amp; Clean</h2>
                        <h3>Fresh bus environment and Clean buses, Always</h3>
                    </div>
                </div><!--/.col-md-4-->

                <div class="col-md-4 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                    <div class="feature-wrap">
                        <i class="fa fa-comments"></i>
                        <h2>Air Suspension</h2>
                        <h3>High quality Air Suspension so that you fill at home</h3>
                    </div>
                </div><!--/.col-md-4-->

                <div class="col-md-4 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                    <div class="feature-wrap">
                        <i class="fa fa-cloud-download"></i>
                        <h2>Easy Booking</h2>
                        <h3>Book tickets Online &amp; Offline</h3>
                    </div>
                </div><!--/.col-md-4-->
            
                <div class="col-md-4 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                    <div class="feature-wrap">
                        <i class="fa fa-leaf"></i>
                        <h2>Compfortable Seating</h2>
                        <h3>Comfortable seating arrangement with ample leg room</h3>
                    </div>
                </div><!--/.col-md-4-->

                <div class="col-md-4 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                    <div class="feature-wrap">
                        <i class="fa fa-cogs"></i>
                        <h2>Overhead Compartments</h2>
                        <h3>Overhead compartments for your small bags</h3>
                    </div>
                </div><!--/.col-md-4-->

                <div class="col-md-4 col-sm-6 wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeInDown;">
                    <div class="feature-wrap">
                        <i class="fa fa-heart"></i>
                        <h2>Pickup &amp; Drop</h2>
                        <h3>Convenient Pickup and Drop locations</h3>
                    </div>
                </div><!--/.col-md-4-->
            </div><!--/.services-->
        </div><!--/.row-->    
    </div><!--/.container-->
</section>

<!-- Popular routes -->
<section id="services" class="service-item">
    <div class="container">
        <div class="center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
            <h2>Popular Routes</h2>
            <!-- <p class="lead">Saimaya travels provides bus services to passengers on a daily basis</p> -->
        </div>

        <div class="row">

            <div class="col-sm-6 col-md-4">
                <div class="media services-wrap wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="pull-left">
                        <!-- <img class="img-responsive" src="images/services/services1.png"> -->
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Mumbai To Ratnagiri</h3>
                        <p>Two Buses daily with estimated travel time of 7 hours</p> 
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="media services-wrap wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="pull-left">
                        <!-- <img class="img-responsive" src="images/services/services2.png"> -->
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Mumbai To Shirdi</h3>
                       <p>Two Buses daily with estimated travel time of 7 hours</p> 
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="media services-wrap wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="pull-left">
                        <!-- <img class="img-responsive" src="images/services/services3.png"> -->
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Mumbai To Goa</h3>
                        <p>Two Buses daily with estimated travel time of 15 hours</p> 
                    </div>
                </div>
            </div>  

            <div class="col-sm-6 col-md-4">
                <div class="media services-wrap wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="pull-left">
                        <!-- <img class="img-responsive" src="images/services/services4.png"> -->
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Mumbai To Pune</h3>
                       <p>Four Buses daily with estimated travel time of 4 hours</p> 
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="media services-wrap wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="pull-left">
                        <!-- <img class="img-responsive" src="images/services/services5.png"> -->
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Mumbai To Nashik</h3>
                       <p>Two Buses daily with estimated travel time of 7 hours</p> 
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="media services-wrap wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="pull-left">
                        <!-- <img class="img-responsive" src="images/services/services6.png"> -->
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Mumbai To Chiplun</h3>
                        <p>Two Buses daily with estimated travel time of 6 hours</p> 
                    </div>
                </div>
            </div>                                                
        </div><!--/.row-->
    </div><!--/.container-->
</section>

@endsection
