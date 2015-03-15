<?php
require_once('../requires.php');

$req = $db->prepare('SELECT * FROM `blacklist`');
$req->execute();
while($data = $req->fetch()) {
	// On télécharge le fichier
	exec('cd '.ROOT_DIR.'tmp/ && wget "'.$data['url'].'" -O "dl.gz" && gzip -d "dl.gz" > /dev/null');
	
	// On ouvre le fichier et on vérifie qu'on est bien réussi à l'ouvrir
	$handle = fopen(ROOT_DIR.'tmp/dl', 'r');
	if($handle) {
		while(($line = fgets($handle)) !== false) {
			// On récupère le contenu
			if(preg_match('`(.+):(.+)-(.+)`', $line, $output)) {
				// on check si l'ip est déjà enregistré en bdd
				$req_count_ip = $db->prepare('SELECT COUNT(*) AS nbr FROM blacklist_ips WHERE ip_range_first_number = :ip_range_first_number AND ip_range_last_number = :ip_range_last_number AND id_blacklist = :id_blacklist');
				$req_count_ip->execute(array(
					'ip_range_first_number' => ip2long($output[2]),
					'ip_range_last_number' => ip2long($output[3]),
					'id_blacklist' => $data['id_blacklist'],
				));
				$data_count_ip = $req_count_ip->fetch();
					
				if($data_cont_ip['nbr'] == 0) {
					// On ajoute l'ip en bdd
					$req_add_ip = $db->prepare('INSERT INTO `blacklist_ips`(`id_blacklist`, `ip_range_first`, `ip_range_last`, `ip_range_first_number`, `ip_range_last_number`, `comment`, `date_added`) VALUES (:id_blacklist, :ip_range_first, :ip_range_last, :ip_range_first_number, :ip_range_last_number, :comment, NOW())');
					$req_add_ip->execute(array(
						'id_blacklist' => $data['id_blacklist'],
						'ip_range_first' => $output[2],
						'ip_range_last' => $output[3],
						'ip_range_first_number' => ip2long($output[2]),
						'ip_range_last_number' => ip2long($output[3]),
						'comment' => $output[1],
					));
				}
			}
		}
	}
	
	// On supprime le fichier
	unlink(ROOT_DIR.'tmp/dl');
}