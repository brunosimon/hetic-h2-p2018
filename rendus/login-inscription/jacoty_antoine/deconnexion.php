<?php
	session_start();
	session_unset();
	session_destroy();
	header("refresh:2;url=index.php");
	echo "You have been disconnected. If you're not automatically redirected, please click <a href='index.php'>here</a>.";
	exit();
?>