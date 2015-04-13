<?php

echo uniqid().'<br>';

if(preg_match('/^Fo{3}$/','Foooooo'))
	die('vrai');
else
	die('faux');


// $matches = array();

// preg_match_all('/(lo)(rem) (ipsum|dolores)/','lorem dolores',$matches);

// echo '<pre>';
// print_r($matches);
// echo '</pre>';



// $result = preg_replace('/(toto|tata)/','<strong>$1</strong>','toto tata tutu toto tete toto tata');

// echo '<pre>';
// print_r($result);
// echo '</pre>';






// $matches = array();

// preg_match_all('/(https?|ftp):\/\/([a-z-.]+)\.([a-z]{2,3})(:[0-9]+)?(.*)/','http://images.google.com:80/chemin/test',$matches);

// echo '<pre>';
// print_r($matches);
// echo '</pre>';