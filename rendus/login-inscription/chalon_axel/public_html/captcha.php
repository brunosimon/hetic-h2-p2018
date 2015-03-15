<?php

header("Content-type: image/png");
header("Cache-Control: no-cache, must-revalidate");

session_start();
if (isset($_SESSION['captcha']))
{
	$imagewidth=100;
	$imageheight=40;

	$image=imagecreate($imagewidth,$imageheight);
	imagecolorallocate($image,230,230,230); // fond

	imagestring($image,5,rand(5,$imagewidth-60),rand(5,$imageheight-20),$_SESSION['captcha'],imagecolorallocate($image,0,0,0));

	imagepng($image);
}