----------- HETIC P2018 ----------
----------------------------------


I. Utilisation du site /////////////////////////////////////////

Pour faire fonctionner le site, il suffit juste de soit créer son quiz, soit d'en selectionner un sur la page d'accueil.

1) Si vous décidez de créer votre quiz :
=> Il faut entrer son nom de quiz

=> Définir le nombre de question que l'on souhaite mettre
(Choix multiple ou Vrai/Faux)

=> Ajouter différentes réponses et cocher la bonne réponse.
(Attention, je n'ai pas eu le temps de finir du coup le lien pour l'image ne sera pas pris en considération.)

=> Valider le quiz dès qu'on a fini.

2) Si vous décidez de selectionner un quiz
=> Choisissez le quiz qui vous fait plaisir

=> Répondez aux questions (mais ne revenez pas en arrière car je n'ai pas eu le temps de résoudre un bug d'incrémentation)

=> Finissez le quiz et entrer votre nom ou pseudo.

//////////////////////////////////////////////////////////////////

II. Fonctionnalités du site //////////////////////////////////////


Le site permet de stocker des tables qui sont en fait le nom des quiz. On peut ainsi personnaliser et créer notre propre quiz et n'importe qui peut y jouer.

On retrouve à la fin du quiz (joué) la possibilité d'enregistrer notre résultat et pour cela on ressort après les cinq derniers joueurs ayant joué à ce quiz ainsi que leur performance.

Pour parvenir à l'utilisation du quiz, l'utilisation des sessions m'a été indispensable. EN effet, cela m'aura permis d'enregistrer des valeurs temporairement et par la suite les utiliser quand il le fallait. De plus l'utilisation de SQL m'a permis de créer des requêtes permettant de selectionner ou de créer des colonnes ou tables.
Petit point également à souligner, j'ai du utiliser deux bases de données. L'une pour les users et l'autre pour le quiz en général.

/////////////////////////////////////////////////////////////////

III. Points à améliorer

Je n'ai pas tout fini comme je le souhaitais et d'ailleurs cela explique en partie mon retard vu ce que je souhaitais faire. (J'ai bien perdu le temps qu'il fallait pour trouver mon idée au moins !)

Parmi les points à améliorer :

- Avoir la possibilité d'enregistrer une question avec des espaces car la BDD ne semble pas comprendre la requête lorsqu'on met des espaces et accents (J'ai juste fait en sorte qu'il remplace le caractère espace par un autre caractère lisible pour la BDD mais faudrait faire ça sur tout)

- Régler le problème d'incrémentation avec le $_SESSION

- Gérer le responsive

- Ajouter d'autres fonctionnalités comme ajouter une réponse supplémentaire lors de la création de questions.

//////////////////////////////////////////////////////////////////