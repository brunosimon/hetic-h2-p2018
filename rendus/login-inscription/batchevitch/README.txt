-------------------------------------------------------------------------------
 Auteur:               Boris Batchevitch [boris.batchevitch@hetic.net]          
 Titre:                MyLittleForm in PHP                   
 Sujet:                Quelques details            
 Description:          Certains aspects de mon code peuvent etre un peu dur a
                       Comprendre (surtout apres X corrections de formulaires)            
--------------------------------------------------------------------------------

                              MyLittleForm in PHP



I/   Remember Me et Connexion
II/  3 Essais pour mot de passe
III/ URL


I - Remember Me et Connexion
Quelques précisions pour le système: Remember Me et Essayer d'accéder à une page membre directement par URL.

	1 - Quand on se login, on a par défault une SESSION(logged in) afin d'accéder a la page membre (homepage.php).
	2 - Remember Me crée un Cookie sécurisé qui fait que quand on va sur la page login.php, on est redirigée vers homepage.php
	3 - Quand on essaye de se connecter directement à la page membres (homepage.php) si on est a pas de SESSION(logged in) alors
	    on n'est redirigé sur login.php

=> Ainsi si on a un coookie Remember Me et qu'on essaye d'accéder directement à homepage.php on est reloggé et redirigé vers cette page
   sans que l'utilisateur s'en aperçoit.

Même si j'aurai pu juste utiliser des SESSIONS, je voulais montrer que je pouvais faire les deux en essayant d'être le plus secure.


II  - 3 Essais pour mot de passe
J'ai essayé de faire plus qu'un simple sleep, et j'ai voulu mettre en place un système qui:
	1 - sait quel compte essaye de se log
	2 - sait sur quelle IP
	3 - sait combien de fois
Etant sur localhost, j'ai du mal à savoir si la détection de l'IP fonctionne (vu que je n'ai pas de 127.0.0.1 dans ma DB) et je ne sais pas
si je dois convertir l'IP avec un cast spéciale, donc ma version est donc peut être inefficace online. J'ai pris un snippet pour récuprer l'IP
du client.

III - URL
Bien évidemment il faudra changer les URL de vérifications/changement de mot de passe à celle qui vous correspond en local


PS: Si mon formulaire est absolument dégueulasse mais "fun" c'est avant tout pour essayer de couper la monotonie que vous aurez peut être en corrigeant
70 formulaires similaires.

Bonne journée / soirée !