
@extends('layouts.master')

@section('title')
    Check your weather instantly
@endsection
@section('content')
    @include('includes.message-block')<div class="popular-cities animated bounceInUp">
        <center><h2>Top <span style="color: #ffc255;">10</span> popular searches</h2></center>
        @foreach($popular_cities as $city)
            <div class="row data-1">
                <div class="col-xl">
                    <h1>{{$city->city_name}}</h1>
                    <h4>{{$city->views}}<h5>views</h5></h4>
                </div>
            </div>

        @endforeach
    </div>

    @endsection