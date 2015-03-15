<?php
//code non-fini
// dificulté a recupéré le token
include ("script/connect.php");
if ($_GET['token']) {
	$get_code = $_GET['token'];
	$q        = $conn->prepare("SELECT * FROM users WHERE token=:token ");
	$q->execute(array(
			':token' => $get_code,
		));
	while ($row = $q->fetch_assoc()) {
		$db_code = $row['passreset'];

	}
	if ($get_code == $db_code) {
		echo "
      <form action='forgot.php' method='post'>
      enter a new password <input type='password' name='newpass' value=''>
      re-enter password <input type='password' name='newpass1' value=''>
      <input type='submit' name=' value='update password'>
      </form>
		";

	}

}

?>