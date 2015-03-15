<h1>Hello You</h1>

<h2>Update your profile</h2>

<?= ($user->data->verified) ? '<div class="alert">Votre compte n\'est véfifier</div>' : ''?>

<form action="">
	
	<input type="text" name="first_name" value="<?= (isset($user->data->first_name)) ? $user->data->first_name : '' ?>" placeholder="First Name">

	<input type="text" name="last_name" value="<?= (isset($user->data->last_name)) ? $user->data->last_name : '' ?>" placeholder="Last Name">

	<input type="text" name="pseudo" value="<?= (isset($user->data->pseudo)) ? $user->data->pseudo : '' ?>" >

	<input type="password" name="password" placeholder="new password" >

	<input type="submit">

</form>