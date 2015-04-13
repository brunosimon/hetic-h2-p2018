<?php
// destroy user session and redirect to sign page
session_start();
session_unset();
session_destroy();
header('Location: sign');
exit;