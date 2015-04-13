<!DOCTYPE html>
<html lang="fr">
	<head>
		
		
		<?php

			$root = "http://" . $_SERVER['HTTP_HOST'] . substr($_SERVER['PHP_SELF'], 0, strlen($_SERVER['PHP_SELF']) - 9);

		?>
		
		<!-- METAS -->

		<meta charset="UTF-8">
		<title>Document</title>

		<meta property="root" content="<?php echo $root; ?>" >

		
		<!-- FONTS -->

		<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,900,700,600,500,300,200,100' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo $root; ?>web/assets/icons/font-awesome.css">
		

		<!-- CSS -->

		<link rel="stylesheet" href="<?php echo $root; ?>web/styles/css/global.css">

		<?php

			if($css)
			{
				foreach($css as $style)
				{
					print('<link rel="stylesheet" href="' . $root . 'web/styles/css/' . $style . '.css">');
				}
			}

		?>

	</head>

	<body>


		<!-- HEADER -->

		<header>
			
			

		</header>
		
		
		<!-- CONTENT -->


	
