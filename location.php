<?php

 include 'location_funcs.php';
 
 $ip = getRealIpAddr();
 $location = getLocation($ip);

 echo $ip;
 echo '<br>';
 echo $location;

?>