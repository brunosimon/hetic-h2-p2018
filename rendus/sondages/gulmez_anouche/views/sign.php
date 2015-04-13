<?php $title = 'Inscription | Connexion'; ?>

<h1>Inscription</h1>

<!-- REgister form -->

<form action="sign" method="post">
	<div class="elements">
		<p>
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" value="<?= (isset($_POST['pseudo']) && !empty($_POST['pseudo']))?$_POST['pseudo']:'' ?>" placeholder="Pseudonyme">
			<span><?= array_key_exists('pseudo', $errors)?$errors['pseudo']:'' ?></span>
		</p>
		<p>
			<label for="password">Password</label>
			<input type="password" name="password" value="" placeholder="Password">
			<span><?= array_key_exists('password', $errors)?$errors['password']:'' ?></span>
		</p>
		<p>
			<label for="password_confirm">Confirm Password</label>
			<input type="password" name="password_confirm" value="" placeholder="Confirm Password">
			<span><?= array_key_exists('password_confirm', $errors)?$errors['password_confirm']:'' ?></span>
		</p>
		<p>
			<label for="email">Email</label>
			<input type="email" name="email" value="<?= (isset($_POST['email']) && !empty($_POST['email']))?$_POST['email']:'' ?>" placeholder="Email">
			<span><?= array_key_exists('email', $errors)?$errors['email']:'' ?></span>
		</p>
		<p>
			<label for="email_confirm">Confirm Email</label>
			<input type="email" name="email_confirm" value="<?= (isset($_POST['email_confirm']) && !empty($_POST['email_confirm']))?$_POST['email_confirm']:'' ?>" placeholder="Confirm Email">
			<span><?= array_key_exists('email_confirm', $errors)?$errors['email_confirm']:'' ?></span>
		</p>
	</div>
	<p><input type="submit" value="Register" name="register"></p>
</form>

<!-- Signup form -->

<h2>Connexion</h2>

<form action="sign" method="post">
	<div class="elements">
		<p>
			<label for="pseudo_signup">Pseudo</label>
			<input type="text" name="pseudo_signup" id="pseudo_signup" value="<?= (isset($_POST['pseudo_signup']) && !empty($_POST['pseudo_signup']))?$_POST['pseudo_signup']:'' ?>" placeholder="Pseudonyme">
			<span><?= array_key_exists('pseudo_signup', $errors)?$errors['pseudo_signup']:'' ?></span>
		</p>
		<p>
			<label for="password_signup">Password</label>
			<input type="password" name="password_signup" value="" placeholder="Password">
			<span><?= array_key_exists('password_signup', $errors)?$errors['password_signup']:'' ?></span>
		</p>
	</div>
	<p>
		<input type="submit" value="Sign Up" name="signup">
	</p>
</form>

<!-- Display errors or success messages -->

<?php if(array_key_exists('title', $success)) : ?>
<div class="notifications">
	<div class="notification">
		<h2><?= $success['title'] ?></h2>
		<?= array_key_exists('success', $success)?'<p>'.$success['success'].'</p>':'' ?>
	</div>
</div>

<?php

endif;