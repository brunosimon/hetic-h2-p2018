

	<!-- CUSTOM SURVEYS -->

	Custom Surveys se veut être un outil permettant la création facile de sondages en ligne, basé sur un design simple et épuré.



	<!-- INSTALLATION -->

	L'installation nécessite un serveur apache (type Mamp, Wamp, ...). Il faudra importer la base de donnée grâce au fichier .sql "custom_surveys" situé à la racine de ce dossier.
	Normalement, le projet est censé fonctionner quelque soit le dossier racine. Toutefois, il est possible qu'il existe des oublis dans ma tentative de rendre toutes les urls "relatives".
	Un sondage a déjà été réalisé pour vous permettre de tester directement. Vous pouvez le visualiser à l'url suivante : /view/1. Toutefois, je vous invite à essayer de créer ensuite votre propre sondage car c'est en grande partie là que réside l'intérêt de ce rendu.



	<!-- FONCTIONNALITES -->

	// Visualisation d'un sondage

	Vous pouvez accéder à la visualisation d'un sondage en accédant aux urls "view/{id}" ou id représente l'id du sondage (par exemple le "1" pour le sondage déjà existant) ou en cliquand sur le lien "Voir" sur la page d'édition.
	Une fois avoir fait commencer, vous allez naviguer de question en question et voir les graphiques en overlay sur les photos évoluer au fil de vos votes.


	// Création d'un sondage

	Vous accèderez à la création d'un sondage via la page "admin/create". On vous demandera simplement un nom, une url piur la photo de couverture, un mot de passe (qui sera bien évidement ensuite hashé) et éventuellement une description.


	// Edition d'un sondage

	On vous proposera ensuite d'éditer le contenu du sondage que vous avez crée. Votre sondage est protégé grâce au mot de passe que vous avez défini précédement. Toutefois, la page permettant de se connecter à un sondage n'a pas pu être réalisée pour des questions de temps. Si vous êtes déconnecté par la session php, vous n'aurez donc plus la possibilité d'accéder à cette page d'édition àl'heure actuelle.

	La page d'édition récapitule l'ensemble des question déjà ajoutées et vous propose d'en ajouter de nouvelles. Pour celà, il vous suffit de rentrer un intitulé, et d'ajouter des propositions en cliquant sur le lien "Ajouter" à côté du sous titre "PROPOSITIONS". Vous n'avez alors plus qu'à entrer un intitulé et à choisir une url pour la photo d'illustration.


	
	<!-- FONCTIONALITES MANQUANTES -->

	- Connexion 
	- Partage sur les réseaux sociaux
	- Recherche de sondages par mots clefs
	- Entre autres ...