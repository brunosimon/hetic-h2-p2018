<?php
	//Requiring files
	require_once '../../inc/include.php';

	//Checking if *SUPER SECRET PASSWORD* is set to confirm, just to be sure the script is not called by mistake
	if(isset($_GET["v"]) && $_GET['v'] == 'confirm')
		reseter();
	else //Trolling for a while
		echo 'You have no power here.';
