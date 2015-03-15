<?php

$text = 'Salut toto bonjour tout le monde tata tutu toto tete toto tata !';
$text = preg_replace('/(t[aeiouy]t[aeiouy])/','<strong>$1</strong>',$text);

echo $text;
