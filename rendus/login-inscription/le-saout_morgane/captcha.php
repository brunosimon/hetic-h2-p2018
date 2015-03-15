<?php
function word_captcha($n)
{
	// Séquence aléatoire (en choisir une)

	$word = substr(sha1(rand()),0,$n);
	
	return $word;
}

function captcha()
{
	$word = word_captcha(6);
	$_SESSION['captcha'] = $word;
	return $word;
}

?>