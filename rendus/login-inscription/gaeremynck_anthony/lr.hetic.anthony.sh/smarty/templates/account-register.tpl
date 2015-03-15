{include file="_header.tpl" title="Inscription"}
<h1>Inscription</h1>
{if $msg}
	<p class="good">{$msg}</p>
{else}
	{if $error}<p class="error">{$error}</p>{/if}
	<form method="post">
		<label for="pseudo">Pseudo* :</label>
		<input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" value="{$post.pseudo}" required />
		
		<div class="clearfix"></div>
		
		<label for="email">Email* :</label>
		<input type="email" id="email" name="email" placeholder="Email" value="{$post.email}" required />
		
		<div class="clearfix"></div>
		
		<label for="pwd">Password* :</label>
		<input type="password" id="pwd" name="pwd" placeholder="Password" required />
		
		<div class="clearfix"></div>
		
		<label for="pwd2">Retapez votre password* :</label>
		<input type="password" id="pwd2" name="pwd2" placeholder="Retapez votre password" required />
		
		<div class="clearfix"></div>
		
		<label for="birth_date">Date de naissance :</label>
		<input type="date" id="birth_date" name="birth_date" placeholder="Date de naissance" value="{$post.birth_date}" />
		
		<div class="clearfix"></div>
		
		<input type="submit" value="Yes je m'inscris !" name="send" />
	</form>
{/if}
{include file="_footer.tpl"}