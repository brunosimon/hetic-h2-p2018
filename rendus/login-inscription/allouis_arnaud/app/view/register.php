<h1>Register</h1>

<form action="<?= base_url() ?>user/processRegister" method="post">
	<div class="input-block">
		<label>Email
		<input type="text" name="email" value="<?= (isset($_SESSION['form']['email'])) ? $_SESSION['form']['email'] : '' ?>"></label>
		<?= (flash('email') ? '<p>'.flash('email').'</p>': '') ?>
	</div>
	<div class="input-block">
		<label>Password
		<input type="password" name="password"></label>
		<label>Repeat password
		<input type="password" name="scd_password"></label>
		<?= (flash('password') ? '<p>'.flash('password').'</p>': '') ?>
	</div>
	<div class="input-block">
		<p>Combien font <?= $captcha->number1 ?> + <?= $captcha->number2 ?> ?</p>
		<input type="text" name="captcha" placeholder="Bite my shiny metal ass!">
		<?= (flash('captcha') ? '<p>'.flash('captcha').'</p>': '') ?>
	</div>
	<input type="submit">
</form>