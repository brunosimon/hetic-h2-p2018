<?php
	require_once '../inc/config.php';
	require_once '../inc/tools.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" href="src/css/reset.css">
	<link rel="stylesheet" href="src/css/style.css">
	<link rel="stylesheet" href="src/css/individual.css">

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Alegreya+SC|Roboto:100,300,400' rel='stylesheet' type='text/css'>
	<?php require_once '../inc/favicon.php'; ?>
	<meta charset="UTF-8">
	<title>Score History</title>
</head>
<body>
<?php
		$contender = fetch_stats($_GET['id']); //Getting current stats for this contender
		$history = fetch_history($_GET['id']); //Getting contender's history

		$current = $contender->score;

		if(is_object(extreme_score($contender->id,"DESC"))){ //Verifying that extreme score didn't return a default value
			if(extreme_score($contender->id,"DESC")->former_score < $contender->score){ //Checking if current score is higher than highest former score
				$highest = $contender->score; //Setting contender's current score as highest score
			}
			else {
				$highest = extreme_score($contender->id,"DESC")->former_score; //Setting higher former score as highest score
			}
		}
		else
			$highest = 1000; //Setting highest score to a default value (means no votes have occured for this contender yet)
		
		if(is_object(extreme_score($contender->id,"ASC"))){ //Verifying that extreme score didn't return a default value
			if(extreme_score($contender->id,"ASC")->former_score > $contender->score){ //Checking if current score is lower than lowest former score
				$lowest = $contender->score; //Setting contender's current score as lowest score
			}
			else{
			$lowest = extreme_score($contender->id,"ASC")->former_score; //Setting lower former score as lowest score
			}
		}
		else
			$lowest = 1000; //Setting lowest score to a default value (means no votes have occured for this contender yet)

?>
	<div class="header">
		
		<h1><span>BADASS</span> POLL</h1>

	</div>

	<a href="http://badass.pgab.me">
		<div class="return">
			Return
		</div>
	</a>

	<div class="choice">
		<ul>
			<li class="shadow-1">
				<div class="name"><?php echo $contender->title;?><br></div> 
				<div class="picture">
					<img src=<?php echo '"'.$contender->picture.'"';?>><br>
				</div>
			</li>
		</ul>
	</div>

	<div class="overview shadow-1">
		
		<ul>
			<li class="current">Current Score : <span><?php echo $current;?></span></li>
			<li class="highest">Highest Score : <span><?php echo $highest;?></span></li>
			<li class="lowest">Lowest Score : <span><?php echo $lowest;?></span></li>
		</ul>

	</div>

	<div class="history shadow-1">
		<div class="present">History (last 15 scores)</div>
			<div class="scores">
			
				<?php

					$i=0;
					if(is_string($history)){ //Checking if history exists, else echoing default value (no votes yet)
						echo '<div class="no_entry">'.$history.'</div>';
					}
					else{
						foreach($history as $entries){ //If history exists, echoing each former score (limit 15)
		
							echo '<div class="entry id'.$i.'"> '.$entries->former_score.' </div>';
							$i++;
						}
						
					}
	
				?>
			
			</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="src/js/individual.js"></script>
	<?php include '../inc/analytics.php'; ?>

</body>
</html>