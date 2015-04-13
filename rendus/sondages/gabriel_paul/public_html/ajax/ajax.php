<?php
	
	//Requiring all files
	require_once '../../inc/include.php';


	if(isset($_POST['r'])){ //R means request, and is used to identify the data requested

		if($_POST['r'] == 'scoring'){ //Fetching the scores of all contenders

				//Getting all stats from contenders (see tools.php for function explanations), storing them into temporary variable	
				$temp = fetch_stats("all");
				
				//Encoding the result into JSON in order to be easily manipulated with JavaScript
				$stats = json_encode($temp);

				//Echoing JSON in order for AJAX request to get it
				echo $stats;
		
		}

		else if($_POST['r'] == 'vote'){ //Submitting a vote

			if(isset($_POST["winner"]) && isset($_POST['loser'])){ //Checking if parameters are set

				//Getting user stats
				$winner = fetch_stats($_POST['winner']);
				$loser = fetch_stats($_POST['loser']);

				//Saving user scores to history table before calculating new ones
				score_save($winner);
				score_save($loser);

				//Getting Ratings from ELO class (not mine)
				$rating = new Rating($winner->score, $loser->score, 1, 0);
				$results = $rating->getNewRatings();

				//Updating scores in contenders table
				score_updater($winner->id,$results['a']);
				score_updater($loser->id,$results['b']);

			}
			else{ //If unset parameters, redirecting user to mainpage
				header("Location: /");
				exit();
			}
		}

		else if($_POST['r'] == 'pair'){ //Getting a new pair of contenders
			
				//Fetching a new pair of contenders (see tools.php for function explanations)
				fetch_contenders();

		}

		else if($_POST['r'] == 'amount'){//Getting the vote amount

			//Calling vote_count function
			$count = vote_count();
			
			//Echoing for the result to be get by AJAX request
			echo $count;

		}
	}
	else { //Trolling for a while
		echo 'An error occured, your request is illegal.';
	}


