<?php
/*=====================================================
=                                     Mini Doc        =

$req->clientIP // IP de la requête
$req->protocol // Protocol (Ex : HTTP/1.1)
$req->userAgent // Navigateur

=====================================================*/

// Output
function display_msg($msg, $status) {
	header("Content-Type: application/json;", true, 202);
	$out = array(
		'status' => $status,
		'content' => $msg,
	);
	die(json_encode($out));
}


class Requests {
	/*=====================================================
	=            On lock les requets            =
	=====================================================*/
	public function __construct($ip) {
		global $db;
		$this->db = $db;
		$this->ip = $ip;
		$this->nbr_rqt_max_per_min = NBR_RQT_MAX_PER_MIN;
	}
	
	// On regarde si l'user peut faire une requête ou si il a atteint la limite
	public function is_possible_to_make_request() {
		$req = $this->db->prepare('SELECT COUNT(*) AS nbr_requests FROM request_log WHERE client_ip = :client_ip AND date_added > DATE_ADD(NOW(), INTERVAL -1 MINUTE)');
		$req->execute(array('client_ip' => $this->ip));
		$data = $req->fetch();
		
		if($data['nbr_requests'] > $this->nbr_rqt_max_per_min) display_msg('Vous avez fait plus de '.$this->nbr_rqt_max_per_min.' requêtes sur la dernière minute.', 'ERROR');
	}
	
	// Sauvegarde une requête en db
	public function add_request() {
		$req = $this->db->prepare('INSERT INTO `request_log`(`client_ip`, `date_added`) VALUES (:client_ip, NOW())');
		$req->execute(array('client_ip' => $this->ip));
	}
}

class Test {
	/*=====================================================
	=            API > Tester une IP            =
	=====================================================*/
	public function __construct() {
		global $db;
		$this->db = $db;
	}
	
	// Méthode API pour check une ipv4
	public function ipv4($req, $res) {
		$requests = new Requests($req->clientIP);
		$requests->is_possible_to_make_request();
		$requests->add_request();
		
		$req_ip = $this->db->prepare('SELECT * FROM `blacklist_ips` WHERE ip_range_first_number = :ip OR ip_range_last_number = :ip OR (:ip BETWEEN ip_range_first_number AND ip_range_last_number) LIMIT 1');
		$req_ip->execute(array('ip' => ip2long($req->params['ip'])));
		$data_ip = $req_ip->fetch();
		
		if($data_ip['comment']) {
			$output = array(
				'blacklisted' => 1,
				'ip' => $req->params['ip'],
				'comment' => $data_ip['comment'],
			);
			display_msg($output, 'OK');
		} else {
			display_msg(array('blacklisted' => 0), 'OK');
		}
	}
}
?>