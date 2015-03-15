<?php


function flash ($name) {
	if (isset($_SESSION['error'][$name])) {
		return $_SESSION['error'][$name];
	} else {
		return false;
	}
}

function session ($name) {
	if (isset($_SESSION[$name])) {
		return $_SESSION[$name];
	} else {
		return false;
	}
}