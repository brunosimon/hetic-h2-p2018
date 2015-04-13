*** Fichiers extérieurs
Tout le site fonctionne sous PHP, JS, HTML et CSS. Il n'y a pas d'import de l'extérieur sauf la map de Google qui utilise un script extérieur

*** Fonctionnement du site
Toutes les pages sont redirigé en URL propre slon la méthode vue en cours. L'index sert de routeur pour toutes les pages du site.

*** Page non trouvé
Le cas des pages non trouvées amènent à la page 404

*** Accueil
La page d'accueil propose 4 options :
    - Regarder la carte des gens ayant déjà fais le test
    - Faire le test (bouton gris sur image)
    - Informations : Des informations à propos du développeur (moi)
    - Contact : Pour faire repport d'un bug ou d'un compliment. /!\ Faute de temps je n'ai pas pu m'attarder sur le mail, j'ai donc fait simple. Je ne reçois pas d'erreur mais le mail ne parvient pas dans ma boite mail...
    
*** Menu
Il apparait sur toutes les pages. Il se situe sur la gauche et comporte le logo du site (un couteau vert avec du sang) sur lequel on peut cliquer pour retourner à l'accueil

*** Le test
Il s'agit d'un texte à mot clef. En remplaçant les mots, on change la valeur envoyé. Cette modification s'effectut en JS puis est récupéré en PHP via la méthod POST. Pour comprendre comment je fais cela en JS, il faut voir le fichier js/script.js.
Une fois le formulaire rempli (ou non et dans ce cas les valeurs initiales seront prisent pour compte) le formulaire est envoyé à la page resultat.php. Cette dernière va associer un tableau de réponse aux choix formulés par l'utilisateur

Dans un deuxième temps, je comptabilise le nombre de réponse "saines", "normales" puis "folles". Enfin, je stock le tout dans des variables globales et je stock les réponses dans la base de donnée. 

*** Les résultats
Les résultats sont lu depuis les variables de session pour ce qui concerne l'utilisateur et dans la variable world pour ce qui concerne tous les profils à comparer sur la carte de google.

On peut parcourir cette carte de manière plus aisé lorsque l'on clique sur le bouton map de la page d'accueil. Cette dernière fonctionne sur le même principe.

Le message en en-tête est personnalisé selon le score. Par contre le fait que vous soyez schyzophrène reste du statique pour le moment faute de temps.


*** La carte
on peut naviguer sur la carte de google librement. Sur cette carte deux types d'icons s'affichent : les personnes saines et les psychopathes. En cliquant sur chacunes d'elles vous pouvez comparez vos stats aux siens et ainsi trouver un psychopathe qui vous ressemble.

J'ai fais jouer la promo et la carte se remplit. Plusieurs personnes bloquent
 la géolocalisation



*** Options futures (si j'avais eu plus de temps)
    - Ajouter un lien vers l'achat d'un billet d'avion pour les personnes entourés de psychopathes
    - permettre le contact via facebook ou twitter des psychopathes qui vous ressemble (un peu comme un site de rencontre)
    - affinage des réponses (pour l'instant il n'y a absolument rien de scientifique, j'ai inventé le test)
    - afficher une page de stats généraux avec des mixtes de données récoltés, exemple
        - 50% des personnes allant au cinémas sont des psychopathes
        - 83% des personnes ayant un t-shirt rouge et qui mangent des glaces à la pages sont suceptible de vous tuer à coup de casque
        - L'endroit le plus dangereux pour faire ses courses est la boucherie
        - etc
    - possibilité de partager son score sur facebook
    - Revisiter le design
    
*** Fichier SQL
Je vous ai lié un fichier SQL correspondant à la base de donnée à 00:38. Je pense avoir bien plus de donnée d'ici demain mais vous pourrez suivre cela en ligne sur http://magnhetic.fr/Psycho

*** Connexion à la base de donnée
Juste par réflexe, j'ai enlevé la connexion à la base de donnée. Il va falloir que vous la remplissiez dans resultat.php