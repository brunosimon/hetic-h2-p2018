<?php

  session_start();
  session_unset();
  session_destroy();
?>

<SCRIPT type="text/javascript">
	document.location.href="index.php?p=signup";
</SCRIPT>


<?php
  exit();
  
?>
