<?php

class MyClass
{
	public function __construct($test)
	{
		echo 'Init : '.$test;
	}
}

$myClass = new MyClass('toto');

$myClass->create($_POST);