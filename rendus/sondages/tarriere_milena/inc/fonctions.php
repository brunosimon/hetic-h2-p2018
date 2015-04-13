<?php 

$ch = curl_init();

function getShow ($imdb_id) {
	
	global $ch;

	curl_setopt($ch,CURLOPT_URL,'http://eztvapi.re/show/'.$imdb_id);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

	
	$data = json_decode(curl_exec($ch));

	return $data;

}

function updateVote ($show_id) {

	global $pdo;

	$prepare = $pdo->prepare( 'UPDATE votes SET vote = vote + 1 WHERE id = :id' );
	$prepare->bindValue(':id',$_GET['vote']);
	$prepare->execute();
}

/*function classification () {

	global $pdo;

	$query = $pdo->query('SELECT * FROM shows LEFT JOIN votes ON shows.id = votes.show_id');
}*/

function getShows ($pages = 0, $ranked = false) {

	global $pdo;

	$page = intval($pages) * 10;

	$sql = 'SELECT * FROM shows LEFT JOIN votes ON shows.id = votes.show_id';

	if ($ranked) {
		$sql .= ' ORDER BY vote DESC';
	}

	$sql .= ' LIMIT '.$page.', 10';

	$query = $pdo->query($sql);

	$data = $query->fetchAll();

	return $data;

}

?>