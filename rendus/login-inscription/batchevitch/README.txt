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
Quelques pr�cisions pour le syst�me: Remember Me et Essayer d'acc�der � une page membre directement par URL.

	1 - Quand on se login, on a par d�fault une SESSION(logged in) afin d'acc�der a la page membre (homepage.php).
	2 - Remember Me cr�e un Cookie s�curis� qui fait que quand on va sur la page login.php, on est redirig�e vers homepage.php
	3 - Quand on essaye de se connecter directement � la page membres (homepage.php) si on est a pas de SESSION(logged in) alors
	    on n'est redirig� sur login.php

=> Ainsi si on a un coookie Remember Me et qu'on essaye d'acc�der directement � homepage.php on est relogg� et redirig� vers cette page
   sans que l'utilisateur s'en aper�oit.

M�me si j'aurai pu juste utiliser des SESSIONS, je voulais montrer que je pouvais faire les deux en essayant d'�tre le plus secure.


II  - 3 Essais pour mot de passe
J'ai essay� de faire plus qu'un simple sleep, et j'ai voulu mettre en place un syst�me qui:
	1 - sait quel compte essaye de se log
	2 - sait sur quelle IP
	3 - sait combien de fois
Etant sur localhost, j'ai du mal � savoir si la d�tection de l'IP fonctionne (vu que je n'ai pas de 127.0.0.1 dans ma DB) et je ne sais pas
si je dois convertir l'IP avec un cast sp�ciale, donc ma version est donc peut �tre inefficace online. J'ai pris un snippet pour r�cuprer l'IP
du client.

III - URL
Bien �videmment il faudra changer les URL de v�rifications/changement de mot de passe � celle qui vous correspond en local


PS: Si mon formulaire est absolument d�gueulasse mais "fun" c'est avant tout pour essayer de couper la monotonie que vous aurez peut �tre en corrigeant
70 formulaires similaires.

Bonne journ�e / soir�e !