BOUNEGGAR Amine H2P2018

Développement Web

J'ai créer un site sur le thème des sondages de football assez animé (animations, transitions, etc..) et avec beaucoup de CSS.

Concernant mes fichiers : ACCUEIL --> accueil.php
			  LIGUE DES CHAMPIONS --> ldc.php ET vote.php
			  LIGUE 1 --> france.php ET vote1.php
			  PREMIER LEAGUE --> angleterre.php ET vote2.php
			  LIGA --> espagne.php ET vote3.php
			  SERIE A --> italie.php ET vote4.php
			  JOUEURS --> joueurs.php ET vote5.php

- Un dossier img avec toutes les images
- Un style.css pour le Menu animé
- Un dossier inc avec le config.php pour se connecter à la base de donnée (que j'ai nommé sondage_foot).


Concernant mon code, je n'ai pas très commenté car il est assez simple en lui-même. Niveau Front-end c'est assez consistant
et niveau Back-End (PHP) c'est plus léger. J'ai essayer de limiter le nombre de votes à 1 par utilisateurs mais je n'ai pas
réussi (avec la technique de l'IP mais aussi des cookies). J'ai aussi essayer d'y ajouter un système d'affichage des pourcentages
pour chaque réponse à un sondage mais sans succès.

Au niveau de PHP MY ADMIN je n'ai rencontré aucun problème. Dans la base de données, chaque table correspond à un onglet du menu et donc à un sondage.
				