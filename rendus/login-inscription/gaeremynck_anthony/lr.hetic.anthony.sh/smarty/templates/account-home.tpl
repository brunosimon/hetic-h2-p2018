{include file="_header.tpl" title="Mon compte"}
<h1>Bonjour {ucwords($user.pseudo)}</h1>
	<p>
		<strong>Adresse mail :</strong> {$user.email}<br/>
		<strong>Âge :</strong> {$user.age} ans<br/>
	</p>
{include file="_footer.tpl"}