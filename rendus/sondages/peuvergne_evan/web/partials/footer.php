

</body>

</html>

<!-- SCRIPTS -->

<script src="<?php echo $root; ?>web/js/vendors/jquery.js"></script>
<script src="<?php echo $root; ?>web/js/vendors/api.js"></script>
<script src="<?php echo $root; ?>web/js/scripts/app.js"></script>

<?php

	if($scripts)
	{

		foreach($scripts as $script)
		{
			print('<script src="' . $root . 'web/js/scripts/' . $script . '.js"></script>');
		}

	}

?>


	