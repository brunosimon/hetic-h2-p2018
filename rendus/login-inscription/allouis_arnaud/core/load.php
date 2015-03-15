<?php

class Load {

	public function model ($file, $name) {

		$f = 'app/model/'.$file.'.php';

		require_once($f);

		$this->$name = new $file();
	}
}