{include file="_header.tpl" title="Validation du compte"}
<h1>Validation du compte</h1>
{if $good == 1}
	Votre compte viens d'être validé avec succès. <a href="/account/login">Connectez-vous ici</a> !
{elseif $good == 2}
	Votre compte est déjà validé. <a href="/account/login">Connectez-vous ici</a> !
{else}
	Il semblerait que le code de confirmation ne soit pas correct ou que votre compte n'existe plus.
{/if}
{include file="_footer.tpl"}