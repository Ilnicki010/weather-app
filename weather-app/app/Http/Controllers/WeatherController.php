<?php
namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class WeatherController extends Controller {

    //make curl request
    public function askAPI($url){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
        $result=json_decode($result, true);

        return($result);
    }

    public function postCheckWeather(Request $request){

        $weather=new Weather(); //create weather object

        //validate input
        $this->validate($request,[
            'city_name'=>'required|max:1024'
        ]);

        $city_name=$request['city_name'];
        $url_today="http://api.openweathermap.org/data/2.5/weather?q=$city_name&mode=json&units=metric&APPID=65189f5a3dff41a99fb14099b3eaccef";
        $url_forecast="http://api.openweathermap.org/data/2.5/forecast?q=$city_name&mode=json&units=metric&APPID=65189f5a3dff41a99fb14099b3eaccef";


        $result_today=$this->askAPI($url_today);
        $result_forecast=$this->askAPI($url_forecast);

        //if city not found
        if($result_today['cod']==404){

        return view('city_404');

        //city found
        }else{

        $popular_cities = DB::table('popular_cities')
            ->where('city_name', '=', $result_today['name'])
            ->first();

        if (is_null($popular_cities)) {
            $weather->city_name=$result_today['name'];
            $weather->views=1;
            $weather->save();
        } else {
            DB::table('popular_cities')->where('city_name','=',$result_today['name'])->increment('views');
        }

        return view('welcome',['weather_now'=>$result_today,'weather_forecast'=>$result_forecast]);
        }
    }


    public function getPopularCities(){

        $cities = Weather::all()->sortByDesc("views")->take(4);

        return view('welcome',['popular_cities'=>$cities]);
    }
    public function getAllPopularCities(){
        $all_cities = Weather::all()->sortByDesc("views")->take(10);

        return view('popular_cities',['popular_cities'=>$all_cities]);
    }

}
