<?php 
function insert($pdo) {
	$prepare = $pdo->prepare( 'UPDATE candidates SET votes = votes + 1 WHERE id = :id' );
	$prepare->bindValue( ':id',$_GET['vote'] );
	$prepare->execute();

	$insert = $pdo->prepare( 'INSERT INTO vote values(null , :ip, :date, :vid_candidate)' );
	$insert->bindValue( ':ip',get_client_ip());
	$insert->bindValue( ':date', date('Y-m-d'));
	$insert->bindValue( ':vid_candidate', $_GET['vote']);
	$insert->execute();		
}

function insert_objet($pdo, $nom, $url, $com) {
	$insert = $pdo->prepare( 'INSERT INTO candidates values(null , :name, :url, :commentaire, :vote)' );
	$insert->bindValue( ':name',$nom);
	$insert->bindValue( ':url', $url);
	$insert->bindValue( ':commentaire', $com);
	$insert->bindValue( ':vote', '0');
	$insert->execute();		
}

function test_objet($pdo, $id, $ip) {
	$insert = $pdo->prepare( 'SELECT * FROM vote v WHERE v.id_candidates = :id AND v.ip =:ip limit 1');
	$insert->bindValue( ':id',$id);
	$insert->bindValue( ':ip', $ip);
	$insert->execute();		


	if($insert->fetchColumn() == 0)
	{
		return false;
	}

	return true;
}

function enlever_vote($pdo, $id, $ip) {
	$insert = $pdo->prepare( 'DELETE FROM vote WHERE id_candidates = :id AND ip =:ip; UPDATE candidates SET votes = votes - 1 WHERE id = :id');
	$insert->bindValue( ':id',$id);
	$insert->bindValue( ':ip', $ip);
	$insert->execute();		
}