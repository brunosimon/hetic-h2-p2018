
<body>
  <?
    $Corps = "Bonjour,";
    $Corps .= $_POST['pseudo'];
    $Corps .= "&Prenom=";
    $Corps .= $_POST['mail'];
    $Corps .= "&EMail=";
    $Corps .= "Mot de passe, vous le savez"; 
    mail("cedrick.lachot@hetic.fr","Confirmation d'inscription" , $Corps , "Content-type: text/html");
  ?>
</body>