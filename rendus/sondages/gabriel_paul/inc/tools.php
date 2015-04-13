<?php

/* ----------------------------------------------------------------------------- */
/* --- THIS FILE LISTS USEFUL FUNCTIONS. THOSE ARE CALLED IN INDEX.PHP
/* ----------------------------------------------------------------------------- */


/* ----------------------------------------------------------------------------- */
/* --- 1. CONTENDERS INFORMATION
/* ----------------------------------------------------------------------------- */


//Function used to fetch a contender (id, title, picture URL)
function fetch_contenders(){
	global $pdo;

	//Preparing Query, randomly picked, only 2
	$list_contenders = $pdo->query('SELECT * FROM contenders ORDER BY RAND() LIMIT 2');

		echo'<ul><form>';

		//Fetching Data
		while ($contender = $list_contenders->fetch()){

				//Dirty echo of result
				echo '<li class="shadow-1">
				<a href="#"><label>
					<div class="name">'.
						$contender->title.'<br>
					 </div>'.'
				 	<input type="radio" name="vote" value="'.$contender->id.'" />
				  	<div class="picture">
				  	<img src="'.$contender->picture.'"><br>
				  	</div>
				</label></a>
				</li>';

		}
		echo'</ul></form>';
}

//Function used to fetch stats of contenders, can be used as single (pass id as parameter), or for all (pass all as parameter)
function fetch_stats($data){

	global $pdo;

	if($data == "all"){ //Fetching all scores, highest first in order to easily determine who's the best

	$contender_request = $pdo->query('SELECT * FROM contenders ORDER BY `score` DESC');

	$contender_request->execute();

	$contender_stats=$contender_request->fetchAll();

	}

	else{
	//Fetching Stats of the first Contender
	$contender_request = $pdo->query('SELECT * FROM contenders WHERE id ='.$data);

	$contender_request->execute();

	$contender_stats=$contender_request->fetch();

	}

	return $contender_stats;
}


//Function used to determine a contender's extreme score, can be used for min or max, depending on the mode (pass ASC or DESC as second parameter)
function extreme_score($id, $mode){

	global $pdo;

	if($mode == 'ASC'){ //Searching for lowest score

		$lowest_request = $pdo->query('SELECT * FROM vote_history WHERE contender_id = '.$id.' ORDER BY `former_score` ASC');

		$lowest_request->execute();

		$lowest_score = $lowest_request->fetch(); //Will take only ONE line (making LIMIT 1 useless in MySQL request)

		if(isset($lowest_score)){ //If no score is set yet, function will call fetch_stats to get the current score of the contender (very likely 1000), to avoid errors
			return $lowest_score;
		}
		else
			return fetch_stats($id);
	}
	else if($mode =='DESC'){ //Searching for highest score

		$highest_request = $pdo->query('SELECT * FROM vote_history WHERE contender_id = '.$id.' ORDER BY `former_score` DESC');

		$highest_request->execute();

		$highest_score = $highest_request->fetch(); //Will take only ONE line (making LIMIT 1 useless in MySQL request)

		if(isset($highest_score)){ //If no score is set yet, function will call fetch_stats to get the current score of the contender (very likely 1000), to avoid errors
			return $highest_score;
		}
		else
			return fetch_stats($id);
	}
	else{ //If no mode is set, better return the current score
		return fetch_stats($id);
	}


}

//Function used to fetch the 15 last scores of the contender
function fetch_history($id){

	global $pdo;

		$history_request = $pdo->query('SELECT * FROM vote_history WHERE contender_id = '.$id.' ORDER BY `id` LIMIT 15');

		$history_request->execute();

		$history = $history_request->fetchAll();

		if(empty($history)) //If no votes have occured yet, better say it nice.
			return 'No votes for this character yet';
		else
			return $history;
}

/* ----------------------------------------------------------------------------- */
/* --- 2. UPDATE AND INSERT FUNCTION
/* ----------------------------------------------------------------------------- */

//Function used to save the score of the contender in the history table, before it changes
function score_save($id){

	global $pdo;

	//Preparing Insertion
	$prepare = $pdo->prepare('INSERT INTO vote_history (ip, contender_id, former_score, `date`) VALUES (:ip, :contender_id, :former_score, NOW())');

	//Binding Values
	$prepare->bindValue (":ip", $_SERVER['REMOTE_ADDR']);
	$prepare->bindValue (":contender_id",$id->id);
	$prepare->bindValue (":former_score",$id->score);

	//Executing Request
	$prepare->execute();

}

//Function used to update the current score of the player in the contenders table
function score_updater($id,$score){

	global $pdo;

	//Preparing Update
	$prepare = $pdo->prepare('UPDATE `contenders` SET `score`= :score WHERE id = :id');

	//Binding Values
	$prepare->bindValue (":id", $id);
	$prepare->bindValue (":score", $score);

	//Executing
	$prepare->execute();

}

//Function used to return current amount of votes (since the scores of both contenders are saved, the actual amount is 2 times less than this)
function vote_count(){

	global $pdo;

	$rows = $pdo->query('SELECT COUNT(*) from vote_history')->fetchColumn(); 
	
	//Dividing by two
	$rows = $rows / 2;

	return $rows;


}

/* ----------------------------------------------------------------------------- */
/* --- 3. ADMIN FUNCTIONS
/* ----------------------------------------------------------------------------- */

//Admin function used to reset votes (basically truncates the history table and sets all scores to 1000 in contenders table).
function reseter(){

	global $pdo;

	//Preparing Update
	$prepare = $pdo->prepare('UPDATE `contenders` SET `score`= 1000');
	$empty = $pdo->prepare('TRUNCATE vote_history');
	//Binding Values


	//Executing
	$prepare->execute();
	$empty->execute();



	echo 'Scores were reset';

}

