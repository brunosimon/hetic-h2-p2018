<?php
/**
* @author baloran
* @link http://baloran.fr
*/

require_once('config.php');
require_once('autoload.php');
require_once('helper/json.php');
require_once('helper/session.php');
require_once('helper/swiftmailer/swift_required.php');
require_once('load.php');
require_once('controller.php');
require_once('model.php');

class Overall {
	
	/**
	* Permet de rooter les urls
	* #yolo
	*/

	public static function url(){

		session_start();

		if (!empty($_GET['page']))
		{

	        if (is_file('app/controller/'.$_GET['page'].'.php')) {

	        	$controller = Autoloader::yolo($_GET['page']);

	        	if (!empty($_GET['action']) && method_exists($controller,$_GET['action'])) {
	        		$action = $_GET['action'];
	        	} else {
	        		$action = 'index';
	        	}

	        	$params = (isset($_GET['params'])) ? $_GET['params'] : null;

       			call_user_func_array(array($controller, $action), array($params));

	        }
		}
		else{

	        include 'app/view/tpl/header.php';
	        include 'app/view/template.php';
	        include 'app/view/tpl/footer.php';
		}
	}
}