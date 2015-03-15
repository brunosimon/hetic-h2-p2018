<h1>Hello You!</h1>

<h2>Is your first visite!</h2>

<h3>Your name is 
<form action="<?= base_url() ?>user/processFirstTime" method="post">
	<input type="text" placeholder="baloran" name="pseudo">
	<input type="submit">
</form></h3>