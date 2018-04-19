@extends('layouts.master')

@section('title')
    Check your weather instantly
    @endsection
@section('content')
    @include('includes.message-block')
@if(isset($weather_now)&&isset($weather_forecast))
    <div class="container">
    <div class="row">
        <div class="col-lg-12 main-text">
            <h1><span>Today in </span>{{$weather_now['name']}} <span>{{$weather_now['sys']['country']}}</span></h1>
        </div>
    </div>
    <div class="temp animated rubberBand"><h1>{{$weather_now['main']['temp']}}°C</h1>
        <h3>{{$weather_now['weather'][0]['description']}}.</h3></div>

    <div class="row data-1 animated bounceInUp">
        <div class="col-md-3">
            <h3>Pressure</h3>
            <h1 class="wow tada"><span>{{$weather_now['main']['pressure']}}</span>hPa</h1>
        </div>
        <div class="col-md-3">
            <h3>Humidity</h3>
            <h1 class="wow tada"><span>{{$weather_now['main']['humidity']}}</span>%</h1>
        </div>
        <div class="col-md-3">
            <h3>Wind speed</h3>
            <h1 class="wow tada"><span>{{$weather_now['wind']['speed']}}</span>m/s</h1>
        </div>
    </div>
        <center><h2 class="animated forecast-weather-title bounceInUp">Next <span style="color: #ffc255;">3</span> hours</h2></center>
    <div class="row data-2 wow bounceInUp">
        <h1>{{$weather_forecast['list'][0]['weather'][0]['description']}}</h1>
       <div class="col-xl-12">

               <div class="row forecast-weather animated bounceInUp">

                   <div class="col-md-3">
                       <h3>Temperature</h3>
                       <h1 class="wow tada"><span>{{$weather_forecast['list'][0]['main']['temp']}}</span>°C</h1>
                   </div>
                   <div class="col-md-3">
                       <h3>Pressure</h3>
                       <h1 class="wow tada"><span>{{$weather_forecast['list'][0]['main']['pressure']}}</span>hPa</h1>
                   </div>
                   <div class="col-md-3">
                       <h3>Wind speed</h3>
                       <h1 class="wow tada"><span>{{$weather_forecast['list'][0]['wind']['speed']}}</span>m/s</h1>
                   </div>
                   <div class="col-md-3">
                       <h3>Sea level</h3>
                       <h1 class="wow tada"><span>{{$weather_forecast['list'][0]['main']['sea_level']}}</span>m</h1>
                   </div>
                   <div class="col-md-3">
                       <h3>Wind speed</h3>
                       <h1 class="wow tada"><span>{{$weather_forecast['list'][0]['wind']['speed']}}</span>m/s</h1>
                   </div>
               </div>

        </div>
    </div>
    </div>
@else
    <div class="hello-block animated bounceInUp">
        <center><h1>Welcome in weather app</h1></center>
    </div>
    <div class="popular-cities animated bounceInUp">
        <center><h2>Most popular searches</h2></center>
        <div class="row city">
        @foreach($popular_cities as $city)

                    <div class="col-md-3 ">
                        <h1>{{$city->city_name}}</h1>
                        <h4>{{$city->views}} views</h4>
                    </div>

            @endforeach
            <a href="{{route('popularcities')}}">More...</a>
        </div>
    </div>
    @endif
@endsection