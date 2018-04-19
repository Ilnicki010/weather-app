<nav class="navbar navbar-inverse navbar-dark main-header">
    <div class="container-fluid">
        <div class="navbar-header">
            <i class="fa fa-cloud" style="color: #fff"></i>
            <a class="navbar-brand" href="{{route('home')}}">WeatherAPP</a>
        </div>
    </div>
</nav>
</br>
<div class="container">
<div class="row">
    <div class="col-md-12 weather-check">
        <h3>Check weather in your city</h3>
        <form action="{{route('checkweather')}}" method="post">
            <div class="input-group">
                <label for="city"></label>
                <input class="form-control" type="text" name="city_name" id="city_name" placeholder="city name here..." width="100%">

            <button type="submit" class="btn btn-outline-warning">Check Weather!</button>
            <input type="hidden" name="_token" value="{{Session::token()}}"> </div>
        </form>
        </br>
    </div>
</div>
</div>