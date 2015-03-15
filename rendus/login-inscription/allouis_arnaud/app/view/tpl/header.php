<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= 'title' ?> - Balogin</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<?php if ($_SESSION['user']): ?>
	<a href="<?= base_url() ?>/user/logout">Logout</a>
<?php endif ?>

<?php if (!$_SESSION['user']): ?>
	<a href="<?= base_url() ?>/user/login">Login</a>
	<a href="<?= base_url() ?>/user/register">Register</a>
<?php endif ?>