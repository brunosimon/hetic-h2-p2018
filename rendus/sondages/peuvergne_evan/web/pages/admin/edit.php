<?php

	include 'web/config.php';

	$id = explode('/', $_GET['q']); $id = $id[sizeof($id) - 1];

	echo '<input type="hidden" name="survey_id" value="' . $id . '"/>';

	// GET SURVEY
	$survey = $pdo->prepare('SELECT * FROM surveys WHERE id = :id');
	$survey->execute(array(
		'id' => $id
	));
	$survey = $survey->fetch();
	
	$issues = $pdo->prepare('SELECT i.id AS IssueID , i.title AS IssueTitle, p.name AS ProposalName, p.image AS ProposalImage FROM issues AS i RIGHT JOIN proposals AS p ON i.id = p.issue_id WHERE i.survey_id = :survey_id');
	$issues->execute(array(
		'survey_id' => $id
	));
	$proposals = $issues->fetchAll();

?>

<main>
	<div class="container h-centered-container">
	
		<h1><?php echo $survey->name; ?></h1>
	
		<div class="controls">
			
			<a href="../../view/<?php echo $id; ?>" class="btn btn-next"><span>Voir</span></a>
	
		</div>
	
		<div class="issues">
	
			<?php
	
				$lastIssue = null;
				$issuesIndex = 0;
				$proposalsIndex = 0;
				$number = sizeof($proposals);
				foreach($proposals as $proposal)
				{
	
					if($lastIssue == $proposal->IssueID)
					{
	
						?>
	
							<div class="f-col" style="background-image:url('<?php echo $proposal->ProposalImage; ?>');">
								<h4><?php echo $proposal->ProposalName; ?></h4>
							</div>
	
							<?php if($proposalsIndex == ($number - 1)): ?>
	
									</div>
								</div>
	
							<?php endif; ?>
	
						<?php
	
					}
					else
					{
						?>
							
							<?php if($issuesIndex != 0): ?>
								
									</div>
								</div>
	
							<?php endif; ?>
	
							<div class="issue">
								<h3>Question <?php echo $issuesIndex + 1; ?></h3>
								<h2><?php echo $proposal->IssueTitle; ?></h2>
								<div class="proposals row">
									<div class="f-col" style="background-image:url('<?php echo $proposal->ProposalImage; ?>');">
										<h4><?php echo $proposal->ProposalName; ?></h4>
									</div>
	
	
							<?php if($proposalsIndex == ($number - 1)): ?>
	
									</div>
								</div>
	
							<?php endif; ?>
								
	
						<?php
	
						$issuesIndex++;
	
					}
	
					$lastIssue = $proposal->IssueID;
					$proposalsIndex++;
	
				}
	
	
			?>
	
		</div>
	
		
		<!-- NEW ISSUE -->
	
		<div class="new-issue">
				
			<h2>Ajouter une question</h2>
			<div class="form row">
				<div class="input col col-12">
					<input type="text" name="title">
					<label for="title">Question</label>
				</div>
			</div>
	
			<h3>Propositions<a href="#" class="new-proposal" id="btn-add-proposal">Ajouter</i></a></h3>
	
			<div class="new-proposals">
				<div class="proposal">
					<div class="row">
						<div class="proposal-number col col-1">
							<span>1</span>
						</div>
						<div class="input col col-5">
							<input type="text" name="proposal-1-name">
							<label for="name">Intitulé</label>
						</div>
						<div class="input col col-6">
							<input type="text" name="proposal-1-image">
							<label for="image">Image (url)</label>
						</div>
					</div>
				</div>
			</div>
	
			<a href="#" class="btn btn-submit" id="btn-add-issue">
				<span>Ajouter une question</span>
			</a>
	
		</div>
		
	
	</div>
</main>