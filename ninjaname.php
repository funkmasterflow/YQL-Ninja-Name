<?php

$yourname = $_POST['yourname'];

$query = 'use \"http://github.com/yql/yql-tables/raw/master/fun/ninjaname.xml\" as ninjatrans;select * from ninjatrans where name=\"'.$yourname.'\"';
$api = 'http://query.yahooapis.com/v1/public/yql?q='.
        urlencode($query).'&format=json';
               
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $api);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$data = json_decode($output);

$ninjaname = $data->query->results->translated->ninjaname;

//do some data saving stuff
    $allGood = saveMethod($ninjaname);
 
    if($allGood){ 
        echo 1;
    }else{
        echo 2; 
    }


function saveMethod($translatedNinjaname){
  //do some DB queries
  return true;
}
?>