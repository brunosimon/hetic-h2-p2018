<h1>Login</h1>
<?= $title ?>

<?= (session('info')) ? '<p>'.session('info').'</p>' : '' ?>

<form action="/cour/password/user/processlogin" method="post">
	<div class="input-block">
		<label>Email
		<input type="text" name="email"></label>
	</div>
	<div class="input-block">
		<label>Password
		<input type="password" name="password"></label>
	</div>
	<input type="submit">
</form>