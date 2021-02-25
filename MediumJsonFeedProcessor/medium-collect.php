<?php
//Script Created by Outback Games https://outbackgames.com.au

$rss_url = 'https://medium.com/feed/@YOUR_MEDIUM_USERNAME';
$api_endpoint = 'https://api.rss2json.com/v1/api.json?rss_url=';
$data = json_decode(file_get_contents($api_endpoint.urlencode($rss_url)), true);
$posts[] = array();
$count = 0;
$maxPostCount = 10;

//This could be simplified as medium only shows the most recent 10 posts. However, this was scalped from my YouTube collector.
if($data['status'] == 'ok'){
    foreach($data['items'] as $item){
        if($count > $maxPostCount){
            break; //break loop.
        }
        $posts[] = $item;
        $count++;
    }
}



?>