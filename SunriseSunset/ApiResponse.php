<?php 
//this function should return an array containing weather data (including sunrise and sunset times)
//about the location that the user picked. 
function GetData($location, $key){
    $url = "https://api.openweathermap.org/data/2.5/forecast?q=$location,dk&cnt=5&appid=$key";
    
    $curl = curl_init($url);
    
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    
    $response = curl_exec($curl);
    curl_close($curl);
    $sunData =  json_decode(stripslashes($response), true);

    return $sunData;
}
 ?>
 