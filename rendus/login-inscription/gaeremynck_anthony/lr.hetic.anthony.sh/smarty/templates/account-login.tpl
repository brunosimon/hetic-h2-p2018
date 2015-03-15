{include file="_header.tpl" title="Connexion"}
<h1>Connexion</h1>
	{if $error}<p class="error">{$error}</p>{/if}
	<form method="post">
		<label for="pseudo">Pseudo :</label>
		<input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" value="{$post.pseudo}" required />
		
		<div class="clearfix"></div>
		
		<label for="pwd">Password :</label>
		<input type="password" id="pwd" name="pwd" placeholder="Password" required />
		
		<div class="clearfix"></div>
		
		<label for="remember">Se souvenir de moi</label>
		<input type="checkbox" name="remember" id="remember" />
		
		<div class="clearfix"></div>
		
		<input type="submit" value="Connecte moi !" name="send" />
		
		<div class="clearfix"></div>
		
		<a href="/account/recover">J'ai oublié mon mot de passe :(</a>
	</form>
{include file="_footer.tpl"}