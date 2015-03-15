<?php

function json ($error, $message) {

	$data = new stdClass();

	$data->code = $error;
	$data->data = $message;

	return $data;
}