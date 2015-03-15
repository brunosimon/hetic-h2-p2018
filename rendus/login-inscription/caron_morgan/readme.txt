MODULE D'INSCRIPTION / CONNEXION
PHP

Morgan Caron - HETIC H2

MARS 2015

FILESYSTEM :

./
|--inc
|  |--config.php //basic php configuration
|--public_html
|  |--css //contains style
|  |--js  //contains script
|    |--script.js //contains showPassord fucntion
|  |--src //contains nothing
|  |--index.php //log in and register page
|  |--private.php //pge you need authentificaiton to access
|--autologin.php //uses cookie to auth an user
|--blacklist.txt //contains list of forbidden password
|--login.php //contains the script called when a user tries to log in
|--logout.php //contains the script called when a user tries to log off
|--mail_registration.php //contains the script called when a user validates his email
|--readme.txt //here we are
|--register.php //contains the script called when a user registers
|--test_mail.php //contains a script meant for testing mail token without mail service

Fonctions :

[✓] Gestion des erreurs du formulaire
[✓] Demander deux fois le mot de passe à l'inscription et tester que les deux soient égaux
[x] Tester la complexité du mot de passe
[✓] Tester si le mail n'a pas déjà été enregistré dans la BDD
[x] Plus de champs à l'inscription
[✓] Envoyer un mail de confirmation d'inscription
[✓] Envoyer un mail contenant un lien permettant de confirmer l'inscription
[✓] Bouton de déconnexion sur la page privée
[x] Système "Mot de passe oublié"
[✓] Système "Se souvenir de moi"
[✓] Captcha
[x] Limiter le nombre de tentatives
[✓] Mots de passe sécurisés (hash et salt minimum) 

+ gestion des cookies sécurisée
+ liste de mots de passe interdits
