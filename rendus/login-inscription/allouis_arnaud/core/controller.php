<?php

class Controller {

	function __construct () {

		$this->data = new stdClass();
		$this->load = new Load();
	}

	public function index () {

		$this->data->title = "Home";
		$this->partial('home');
	}

	public function partial ($file) {

		$array = get_object_vars($this->data);

		extract($array);

		if (is_file('app/view/'.$file.'.php')) {
			require('app/view/tpl/header.php');
			require('app/view/'.$file.'.php');
			require('app/view/tpl/footer.php');
		} else {
			require('app/view/tpl/header.php');
			require('app/view/home.php');
			require('app/view/tpl/footer.php');
		}
	}

	function authNeeded () {

		if ($_SESSION['user']['email'] && $_SESSION['user']['id']) {
			if ($_SESSION['user']['pseudo'] == null) {
				if ($_GET['action'] == 'first') {
					return true;
				} else {
					header('Location: '.BASE_PATH.'user/first');	
				}
			} else if ($_GET['action'] == 'first') {
				header('Location: '.BASE_PATH.'user/profil');
			}
			return true;
		} else {
			header('Location: '.BASE_PATH.'user/login');
		}
	}

	function logout () {

		$_SESSION['user'] = null;

		header('Location: '.BASE_PATH.'user/login');
	}

	function isLogged () {

		if ($_SESSION['user']['email'] && $_SESSION['user']['id']) {
			header('Location: '.BASE_PATH.'user/profil');
		} else {
			return true;
		}
	}
}