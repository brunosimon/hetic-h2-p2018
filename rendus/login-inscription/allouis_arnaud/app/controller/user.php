<?php

class User Extends Controller {

	public $title;
	public $render;

	/**
	 * [Display the login view]
	 */
	function login () {

		$this->isLogged();

		$this->data->title = "Login";

		$this->partial('login');

		$_SESSION['error'] = null;
		$_SESSION['info'] = null;
		$_SESSION['form'] = null;
	}

	/**
	 * [Display the register view]
	 */
	function register () {

		$this->isLogged();		

		$this->data->title = "Register";

		$this->data->captcha = new stdClass;
		$this->data->captcha->number1 = rand(1,10);
		$this->data->captcha->number2 = rand(0,16);

		$_SESSION['captcha'] = $this->data->captcha->number1 + $this->data->captcha->number2;

		$this->partial('register');

		$_SESSION['error'] = null;
		$_SESSION['form'] = null;
	}

	function profil () {

		$this->authNeeded();

		$this->load->model('userModel', 'user');

		$this->data->user = $this->load->user->readOne('id', $_SESSION['user']['id']);

		$this->data->title = "Register";

		$this->partial('profil');
	}

	function first () {

		$this->authNeeded();

		$this->data->title = "Register";

		$this->partial('first_time');
	}

	/**
	 * [processRegister Proced to parse the data of form]
	 * @param [string] [email] [email of user]
	 * @param [string] [password] [password of the user]
	 * @param [string] [scd_password] [second password, for sure]
	 * @return [type] [description]
	 */
	function processRegister () {

		$this->load->model('userModel', 'user');

		$data = array();

		if (isset($_POST)) {
			if (!empty($_POST['password']) && !empty($_POST['scd_password']) && $_POST['password'] === $_POST['scd_password']) {
				$data['password'] = hash('sha256', SALT, $_POST['password']);
			} else {
				$error['password'] = "Bad password";
			}
			if (empty($_POST['captcha']) || $_SESSION['captcha'] != $_POST['captcha']) {
				$error['captcha'] = "Bad captcha";
			}
			if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$mail_test = $this->load->user->readOne('email', $_POST['email']);
				if ($mail_test->code == 404) {
					$data['email'] = $_POST['email'];
				} else {
					$error['email'] = 'Email not good. YOLO';
				}
			} else {
				$error['email'] = 'Email not good. YOLO';
			}
		} else {
			$error['global'] = "Il faut renplir mon petit";
		}

		if (isset($error)) {
			$_SESSION['error'] = $error;
			$_SESSION['form'] = $_POST;
			header('Location: '.BASE_PATH.'user/register');
		} else {
			$this->load->user->createAccount($data);
		}
	}

	function processLogin () {

		$this->load->model('userModel', 'user');

		$data = array();

		if (isset($_POST)) {
			if (!empty($_POST['password'])) {
				$data['password'] = $_POST['password'];
			} else {
				$error['password'] = true;
			}
			if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$data['email'] = $_POST['email'];
			} else {
				$error['email'] = 'Email not good. YOLO';
			}
		} else {
			$error['global'] = "Il faut renplir mon petit";
		}

		if (isset($error)) {
			$_SESSION['error'] = $error;
			header('Location: '.BASE_PATH.'user/register');
		} else {
			$this->load->user->connect($data);
		}
	}

	function processFirstTime () {

		$this->load->model('userModel', 'user');

		if (isset($_POST)) {
			if (!empty($_POST['pseudo'])) {
				$data['pseudo'] = $_POST['pseudo'];
			} else {
				$error['pseudo'] = 'Pseudo not good. YOLO';
			}
		} else {
			$error['global'] = "Il faut renplir mon petit";
		}

		if (isset($error)) {
			$_SESSION['error'] = $error;
			header('Location: '.BASE_PATH.'user/first');
		} else {
			$this->load->user->firstTime($data);
		}
	}

	function validate ($params) {

		$this->load->model('userModel', 'user');

		$this->load->user->validate($params);
	}
}