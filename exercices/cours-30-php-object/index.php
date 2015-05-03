<?php

class MyClass
{
	public $foo = 'bar';
	public $counter;

	public function __construct()
	{
		echo '<br>Bonjour';

		$this->counter = 0;
	}

	public function doSomething()
	{
		echo '<br>foo is equal to '.$this->foo;
	}

	public function add()
	{
		$this->counter++;
		echo '<br>counter : '.$this->counter;
	}
}

$myClass1 = new MyClass();
$myClass1->add();
$myClass1->add();
$myClass1->add();
$myClass1->add();
$myClass1->add();

$myClass2 = new MyClass();
$myClass2->add();
$myClass2->add();