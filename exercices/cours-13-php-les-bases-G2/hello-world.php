<?php 

	define('NUMBER',5);
	$number = 5;

    function multiply( $a, $b )
    {
    	global $number;

    	return $a * $b + NUMBER;
    }

    echo multiply( 100, 50 );