<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';
require 'actions.php' //details du php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HeticStats</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-2.1.3.min.js" type="text/javascript"></script>
</head>
<body>
	<section class="wrapper">
		<h1>HeticStats : results</h1>
		
		<!-- page results -->
		<div class="divs"> <span>Total Girl = </span>
	 		<?php echo $resultgirl->sumgirl; ?>
	 	</div>
	 	<div class="divs"> <span>Total Boy = </span>
	 		<?php echo $resultboy->sumboy; ?>
	 	</div> 
		<div class="divs"><p>Total héticiens <?= $total_numb ?></p>
		</div>
		<div class="percent_girls"><p>% Girls = <?= $percent_girls ?></p>
		</div>
		<div class="percent_boys"><p>% Boys = <?= $percent_boys ?></p>
		</div>
		<div class="divs div_end">
			<p><a href="index.php">Come back</a><br/></p>
		</div>
	</section>
	<script type="text/javascript">
        $(document).ready(function() {
            $('.percent_girls').animate({width:'<?= $percent_girls ?>'+'%'},1000);
            $('.percent_boys').animate({width:'<?= $percent_boys ?>'+'%'},1000);
        });
    </script>
</body>
</html>
