<?php

function partial ($file) {
	if (is_file('app/view/'.$file.'.php')) {
		include 'app/view/'.$file.'.php';
	} else {
		include 'app/view/home.php';
	}
}