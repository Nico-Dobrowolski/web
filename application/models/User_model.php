<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function set_data_city_cookie($lieu){
		//set cookie
		$cookie = array(
			'name'   => 'lieu',
			'value'  => $lieu,
			'expire' => 30000,
		);
		 
		set_cookie($cookie);

	   /*$data = file_get_contents('http://api.openweathermap.org/data/2.5/find?q='.$ville.'&appid=54391dbba72ecf2c12392e443a719024&units=metric', false);*/

	  /* http://api.openweathermap.org/data/2.5/find?q=douai&appid=54391dbba72ecf2c12392e443a719024&units=metric*/
	}





	function get_json_weather(){
		
		$lieu = get_cookie('lieu');
		if(is_null($lieu)){$lieu = "PARIS,FR";}

		$data_json = file_get_contents('http://api.weatherbit.io/v2.0/forecast/daily?city='.$lieu.'&key=642daad000b84f20bc942d91bbac593e&days=7&lang=fr');

		if ($data_json == NULL) {
			$data_json = file_get_contents('http://api.weatherbit.io/v2.0/forecast/daily?city=Paris,FR&key=642daad000b84f20bc942d91bbac593e&days=7&lang=fr');
		}

		// convert json => object
		$data_obj = json_decode($data_json);
		//var_dump( $data_obj);

		// new api weater http://api.weatherbit.io/v2.0/forecast/daily?city=douai&key=642daad000b84f20bc942d91bbac593e&day=7
		//$dataArray = json_decode($data); //sinon Illegal string offset 'city_name' (avec true) sinon sans true on va avoir object data->extract data :: JSON_FORCE_OBJECT == true
		return $data_obj;


	}

	/*function send_data_weather(){

		$weather_all_data = $this->get_json_weather();
		//$data_obj = json_decode($weather_all_data,true);
		//$dataArray = json_decode($weather_all_data,true);
		return $weather_all_data;

	}*/

	function send_data_country_news(){

		$lieu = get_cookie('lieu');
		if(is_null($lieu)){$lieu = "PARIS,FR";}

		$data_json_weather = file_get_contents('http://api.weatherbit.io/v2.0/forecast/daily?city='.$lieu.'&key=642daad000b84f20bc942d91bbac593e&days=7&lang=fr'); 

		if ($data_json_weather == NULL) {
			$data_json_weather = file_get_contents('http://api.weatherbit.io/v2.0/forecast/daily?city=Paris,FR&key=642daad000b84f20bc942d91bbac593e&days=7&lang=fr');
		}

		// convert json => object
		$data_obj = json_decode($data_json_weather);

		$only_countrycode = $data_obj->country_code; // only_countrycode exemple fr


		$data_json_news = file_get_contents('https://newsapi.org/v2/top-headlines?country='.$only_countrycode.'&apiKey=0d4a27122b994b9193c380237fca22fd');
		

		if ($data_json_news == NULL) {
			$data_json_news = file_get_contents('https://newsapi.org/v2/top-headlines?country=fr&apiKey=0d4a27122b994b9193c380237fca22fd');
		}

		$data_obj_all_news = json_decode($data_json_news);
		return $data_obj_all_news;

		//var_dump( $cookie);
	
		//var_dump($objet_data);
		
		//echo $cookie["countrycode"];

		// new api weater http://api.weatherbit.io/v2.0/forecast/daily?city=douai&key=642daad000b84f20bc942d91bbac593e&day=7

	}






}
