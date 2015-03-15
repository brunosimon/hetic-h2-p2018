<?php
// Let's start a session to place the result of Captcha in it
session_start();

// Will conains the captcha
$captcha_string = '';

// Let's create a random string of 6 letters (uppercase)
for ($i = 0; $i < 6; $i++) {
	$captcha_string .= chr(rand(65,90)); //concatenate each character every loop (65 - 90 correspond to Upper Case ASCII code)
}

$_SESSION['captcha'] = $captcha_string; // Let's give the string to the info captcha in the session id

// Let's define our image
$image = imagecreatetruecolor(172, 60); // Defining dimensions

// RGB values of colors used in image
$bgcolor = imagecolorallocate($image, 200, 100, 90); // text color, dark pink
$ponycolor = imagecolorallocate($image, 255,182,193); // background color, light pink
$secondColor = imagecolorallocate($image, rand(0,50), rand(0,255), rand(0,255)); // security layer, dark purple
$thirdColor = imagecolorallocate($image, rand(0,50), rand(0,255), rand(0,255));
$forthColor = imagecolorallocate($image, rand(0,50), rand(0,100), rand(0,100));
imagefilledrectangle($image,0,0,172,60,$ponycolor); // Background of image

//Let's add 2 other rectangle to try to stop robots
imagefilledrectangle($image,0,0,172,60,$forthColor);
imagefilledrectangle($image,0,15,172,30,$secondColor);
imagefilledrectangle($image,0,50,172,40,$thirdColor);

//imagettftext lets us add text to image , we'll be using MyLittlePony Font and text will be the one we add in Session earlier
imagettftext ($image, 30, -5, 10, 40, $bgcolor,"fonts/Equestria.otf", $_SESSION['captcha']);

// We indicate our image is a png
imagepng($image);

//redirect the image
header("Content-type: image/png");

?>