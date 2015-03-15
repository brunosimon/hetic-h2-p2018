<?php 
/* ----- Redirect ----- */

function redirect_hp () {
	header("Location: homepage.php");
	die();
}

/* ----- Set Cookie ----- */
function set_Cookie ($mail, $password) {
	$cookie_name 		= "user";
	$cookie_value 		= $mail;
	$cookie_password 	= $password;
					
	setcookie($cookie_name, $cookie_value);
}

/* ----- Testing Functions ----- */


function check_Mail($request, $mail) {

	$mail = $mail;
	if (!preg_match('/(@)/', $mail)) {
		// echo "You must use @";
		return false;
	}
	else if ($request == false) {
		// echo "Your mail is in the database";
		return false;
	}

	else {
		return true;
	}
}


function check_Password ($password, $mail, $number) {
	$password 	= $password;
	$mail 		= $mail;
	$number		= $number;

	$is_numeric 	= preg_match('/[1-9]/', $password);
	$is_char_min 	= preg_match('/[a-z]/', $password);
	$is_char_maj 	= preg_match('/[A-Z]/', $password);

	$is_no_space	= !preg_match('/\\s/', $password);
	$password_len	= strlen($password) < $number;

	

	if ( $is_no_space == false) {
		// echo "Your Password is not correct,it must not contain spaces";
		return false;
	} 
	else if ($password_len !== false) {
		// echo "Your Password is not correct,it must contain at least 8 charaters";
		return false;
	}
	else if ($is_numeric + $is_char_min + $is_char_maj < 2) {
		// echo "Your Password is not correct,it must contain at least a MAJ, a min & a number";
		return false;		
	}
	else {
		return true;
	}

}

function check_password_2 ($password, $password_2 ) {
	$password 		= $password;
	$password_2 	= $password_2;

	if ($password !== $password_2) {
		// echo "Your 2 passwords doesn't match";
		return false;
	}
	else {
		return true;
	}
}



/* Generate random password for login */

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}



