<?php

 function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
 }


 function getLocation($ip) {
    $url="https://api.ipinfodb.com/v3/ip-city/?key=your_api_key&ip=".$ip."&format=json";
    $json = file_get_contents($url);
    $data = json_decode($json, TRUE);

    $status = $data['statusCode'];
    $country = $data['countryName'];
    $town = $data['regionName'];
    $city = $data['cityName'];

    if ( $status == 'OK' ) {
      return "$city, $town, $country";
    } else {
      return "Something went wrong..";
    }
}

?>
