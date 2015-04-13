<?php

	include 'web/config.php';


	/* GET SURVEY ID AND ISSUE INDEX */

	$params = explode('/', $_GET['q']);
	$surveyID = $params[sizeof($params)-2];
	$issueIndex = explode('-', $params[sizeof($params) - 1])[1];


	/* GET ISSUE */

	$issue = $pdo->prepare('SELECT * FROM issues WHERE survey_id = :survey_id LIMIT 1 OFFSET ' . (intval($issueIndex) - 1));
	$issue->execute(array(
		'survey_id' => $surveyID
	));
	$issue = $issue->fetch();

	if($issue){ echo '<input type="hidden" name="issue_id" value="' . $issue->id . '"/>'; }

	
	/* NO MORE ISSUES */

	if(!$issue)
	{
		include 'finish.php';
		die();   
	}


	/* GET PROPOSALS */

	$proposals = $pdo->prepare('SELECT * FROM proposals WHERE issue_id = :issue_id');
	$proposals->execute(array(
		'issue_id' => $issue->id
	));
	$proposals = $proposals->fetchAll();


?>


<main class="voting">
	
	<div class="issue">
		<h3>Question <?php echo $issueIndex; ?></h3>
		<h2><?php echo $issue->title ?></h2>
		<a href="issue-<?php echo $issueIndex + 1; ?>" class="btn btn-next"><span>Suivant</span></a>
	</div>

	<div class="proposals">

		<?php foreach($proposals as $proposal): ?>

			<div class="proposal" style="background-image:url('<?php echo $proposal->image; ?>');">
				<h2><?php echo $proposal->name; ?></h2>
				<a href="#" class="btn btn-submit btn-submit-vote" data-proposal="<?php echo $proposal->id; ?>"><span>Voter</span></a>
				<div class="filter">
					<div class="vote"></div>
				</div>
			</div>	

		<?php endforeach; ?>
	</div>

</main>