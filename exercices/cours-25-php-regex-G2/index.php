<?php 

// if(preg_match('/^bonjour$/','bonjour bonjour'))
// 	die('vrai');
// else
// 	die('faux');

$test = 'toto tata t!t! salut tutu tete ca va toto toto tata toto tutu test test';
$test = preg_replace('/((t[aeiouy]){2})/','<strong>$1</strong>',$test);
echo $test;