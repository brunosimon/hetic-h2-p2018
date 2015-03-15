<?php
define('DB_HOST','localhost');
define('DB_NAME','exercice-login-soler_clement');
define('DB_USER','root');
define('DB_PASS','root');
define('SALT','bfnkfdbflvè3598734546(ty(çy)(u)(uu(à(fà435454');


try
{
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    die('Cound not connect');
};

//se souvenir de moi 
// class DB{
//   public function query($sql, $data = array()){
//   $req = $this->db->prepare($sql);
//   $req = execute($data);
//   return $req->fetchAll(PDO::FETCH_OBJ);
//   }
// }

// $db = new DB();

// if(isset($_COOKIE['authcook'])){
// 	$authcook = $_COOKIE['authcook'];
// 	$authcook = explode('---', $authcook);
// 	$user = $db->row('SELECT * FORM users WHERE id=:id', array('id' => $authcook[0]));
// 	$key = sha1($user->pseudo . $user->password);
// 	if($key == $authcook[1]){
// 		$_SESSION['membre'] = (array)$user;
// 		setcookie('authcook', $user->id . '---' . sha1($user->pseudo . $user->password), time() + 3600 * 5, '/', '', false, true);
// 	}else{
// 		$_SESSION['membre'] = (array)$user;
// 		setcookie('authcook', '', time() - 3600, '/', '', false, true);
// 	}
// }
// mettre -> "setcookie('authcook', '', time() - 3600, '/', '', false, true);" pour logout (destroy_session();)


