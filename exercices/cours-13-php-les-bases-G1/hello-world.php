<?php 

	$names = array(
		'toto' => 'Charlie',
		'tata' => 'John',
		'titi' => 'Tom',
		'tutu' => 'Ben',
		'tete' => 'Paul',
	);

	foreach($names as $key => $name)
	{
		echo '<br>'.$key.' = '.$name;
	}
