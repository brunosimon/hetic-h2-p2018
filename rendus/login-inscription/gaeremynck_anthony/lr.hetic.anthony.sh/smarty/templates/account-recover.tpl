{include file="_header.tpl" title="Mot de passe oublié"}
<h1>Mot de passe oublié</h1>
{if $good}
	<p class="good">{$good}</p>
{else}
	{if $error}<p class="error">{$error}</p>{/if}
	{if $changepw}
		<form method="post">
			<label for="pwd">Nouveau mot de passe :</label>
			<input type="password" id="pwd" name="pwd" placeholder="Nouveau mot de passe" required />
			
			<div class="clearfix"></div>
			
			<label for="pwd2">Retapez nouveau mot de passe :</label>
			<input type="password" id="pwd2" name="pwd2" placeholder="Retapez nouveau mot de passe" required />
			
			<div class="clearfix"></div>
			
			<input type="submit" value="Promis cette fois j'oublis plus mon mot de passe" name="send_changepw" />
		</form>
	{else}
		<form method="post">
			<label for="email">Email :</label>
			<input type="email" id="email" name="email" placeholder="Email" value="{$post.email}" required />
			
			<div class="clearfix"></div>
			
			<label for="pseudo">Pseudo :</label>
			<input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" value="{$post.pseudo}" required />
			
			<div class="clearfix"></div>
			
			<label for="troll">Je promet de plus l'oublier</label>
			<input type="checkbox" name="troll" id="troll" />
			
			<div class="clearfix"></div>
			
			<input type="submit" value="S'il te plait envoi moi un nouveau !" name="send" />
		</form>
	{/if}
{/if}
{include file="_footer.tpl"}