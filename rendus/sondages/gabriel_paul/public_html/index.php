<?php require_once('../inc/include.php');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="src/css/reset.css">
		<link rel="stylesheet" href="src/css/style.css">

		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Alegreya+SC|Roboto:100,300,400' rel='stylesheet' type='text/css'>
		<?php require_once '../inc/favicon.php'; ?>
		<title>BADASS POLL</title>
	</head>

	<body>
		
		<div class="header">
			
			<h1><span>BADASS</span> POLL</h1>

		</div>



		<h2> Click the hero you think is most badass. Then do it again. </h2>

		<div class="choice">
			
		</div>
		<br>
		<a class="call_button" href="javascript:void(0)"><div class="button stats shadow-1">Show Stats</div></a>
		<a class="call_button" href="javascript:void(0)"><div class="button refresh shadow-1">Refresh</div></a>
		<br>
		<div class="votes">
		Votes amount -
		<span></span>
		</div>
		<div class="result">

		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="src/js/script.js"></script>
		<?php include '../inc/analytics.php'; ?>
	</body>
</html>