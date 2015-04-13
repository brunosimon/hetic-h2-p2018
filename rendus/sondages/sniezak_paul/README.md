# Voting

## Installation
* Importer le fichier 'pmp.sql'
* Le chemin utilisateur pour passer en revue les fonctions du site : 'INDEX' -> 'player' -> 'CONNCETION' -> 'username' -> 'user' -> 'voting'
* Les redirections sur les différentes pages sont effectuées avec des 'header' en php, le chemin localhost peut varier selon votre configuration, le fichier "inc/config.php" aussi.

## Concept
Le but est de renouveller un concept simple : le choix de musique en groupe. On se retrouve tout le temps embêté, entre une personne qui met la musique en wifi ou bluetooth, l'autre qui veut prendre la connexion pour lui et le dernier qui coupe les musiques en plein milieu.
Je propose du coup une plateforme où chacun peut se connecter avec une authentification simple pour proposer des musiques et voter pour celles-ci afin qu'une playlist soit générée directement sur le pc "mère" qui est relié aux enceintes. De cette façon, personne ne touche à la connexion et tout le monde trouve son compte dans le choix des musiques, que ce soit les fans de musiques françaises ou les amateurs de sons gras.

### Features
* Identification - Permet à l'owner de créer le hub
	* Sécurité simple sur la longueur du nom du hub
* Player - Hub qui permet de centraliser les différentes vidéos/sons séléctionné
* Page de connexion qui redirige vers un hub déjà existant
* Connexion - Quand on tape l'url, demande un identifiant et le stock
	* Si l'identifiant existe déjà, on connecte
	* Si l'identifiant n'existe pas, on le stock dans la base de donnée en le liant au bon hub
* Recherche - Recherche de vidéo YT sur la page user
* Proposition - Permettre d'ajouter une vidéo Youtube à la page de proposition
* Vote - L'user voit toutes les propositions et
	* Peut voter sur une vidéo en précis
	* Sécurité - Un user ne peut voter qu'une fois par liste
* Player - Mettre en place le système de playlist
	* Play une vidéo fectch de la base de donnée
	* La jouer en automatique
	* La destory de la bdd une fois qu'elle est chargée
* Update - Mettre à jour la bdd selon la vidéo/son qui a le plus de vote
	* sur le player, check les vidéos des propositions toutes les 3 minutes
	* celle qui a le plus de vote est déplacé vers la table song
	* toutes les autres sont supprimées.

### Ideas
* Retirer son vote et revoter
	* Bouton qui quand on clique réinitialise la case vote et réduit de 1 la vidéo visé
* Player - Mettre en place le système de playlist
	* Et on appelle la suivante (boucle ajax)
* Faire un système "à suivre" sur la playlist pour voir qu'elle est la prochaine vidéo, vraiment faire une playlist en gros et pas juste une page qui switch de vidéo
* Un vrai design
* Faire que ce soit que des images et non pas la vidéo entière lors du voting pour rendre le tout plus performant
* Search Youtube personnalisée plus inteligeante
* Plus de message personnalisé
* Vote - L'user voit toutes les propositions et peut voter
	* Voit le nombre de vote sur cette vidéo
	* Voit qui a voté ?
* Sécurité - Spécifier un MDP à l'entrée pour pouvoir accéder à la playlist
* Blur et demande le MDP après 20 secondes d'inactivité sur le hub
* Améliorer le shortener afin de prendre en compte le datetime pour éviter les confusions par name des hubs
* Sauvegarder une playlist (vers Youtube ou sous forme d'un fichier .txt par exemple)
* Connection par Facebook
* Sécurité - Améliorer l'organisation des tables
* Responsivité - Adapter le site sur mobile (plus interessant que sur un pc)
* Ajouter plus de choix que Youtube (Spotify, Deezer, Soundcloud, Grooveshark, etc.)

## Problèmes
* Ayant utilisé des iframes en pensant à la compatibilité smartphone pour visionner des vidéos Youtube, le problème s'est vite posé d'écouter la fin de la vidéo sachant que l'iframe existe déjà. Le système de playlist ne marche donc pas vraiment. J'ai du coup pensé à faire un système de playlist préfait où j'aurais juste à push le contenu de la table mise à jour (AJAX) directement sur un player js, mais manque de temps là dessus.
* J'ai recommencé 3 fois l'architecture de la BDD et le concept dans les fichiers en eux-mêmes avant de trouver la solution actuelle. J'essayais de travailler le côté performance que ce soit au niveau du code mais aussi des requêtes pour les réduire au maximum.
* Je m'en suis rendu comtpe après-coup, mais la table "songs" est intuile dans le sens où l'on pourrait simplement rajouter une colonne 'selected' dans la table 'propositions'.
* L'utilisateur est obligé d'être connecté et d'être sur la page de hub pour que la sélection est le vote soit possible.

## Ressources
http://tympanus.net/codrops/2015/02/26/inspiration-button-styles-effects/
http://tutorialzine.com/2013/12/quick-tip-create-a-simple-url-shortener-with-10-lines-of-php/
http://sql.sh/107-cast-timestamp-date
https://developers.google.com/youtube/iframe_api_reference
http://www.google.com/design/spec/material-design/introduction.html