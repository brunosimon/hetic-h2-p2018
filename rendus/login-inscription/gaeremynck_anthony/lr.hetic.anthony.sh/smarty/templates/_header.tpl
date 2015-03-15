<!DOCTYPE html>
<html>
<head>
    <title>{if empty($title)}HETIC LR{else}{$title}&nbsp;- HETIC LR{/if}</title>
	<meta charset="utf-8">
	<meta name="robots" content="noindex" />
	
	<link href="/static/css/reset.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/static/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<nav>
		<ul>
			{if $IS_LOGGED_IN}
				<li><a href="/account/home">Home</a></li>
				<li><a href="/account/logout">Déconnexion</a></li>
			{else}
				<li><a href="/">Home</a></li>
				<li><a href="/account/login">Login</a></li>
				<li><a href="/account/register">Inscription</a></li>
			{/if}
		</ul>
	</nav>