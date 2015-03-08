<?php

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,'http://graph.facebook.com?id=4');
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$data = curl_exec($ch);

echo $data;

curl_close($ch);