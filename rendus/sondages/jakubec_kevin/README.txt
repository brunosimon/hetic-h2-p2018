Mon site a comme thème la météo pour changer des thèmes sur HETIC. Je me suis inspiré des sites 
de météo pour réaliser le design. Les soleils sont réalisés en CSS. La page France n’est pas codée par 
manque de temps, c’était surtout pour avoir un menu à 3 catégories. 
Au niveau des features du sondage, le sondage n’est faisable qu’une fois grâce aux sessions et en 
fonction du choix de réponse la page affichera un message et une image définie (un super subterfuge 
pour placer des chats discrètement…). Les résultats des votes sont exprimés en nombre de votes et 
en pourcentages par rapport au total.
La base de donnée contient 2 tables : une enonce_question regroupant les énoncés et la table 
question1 qui comprend les réponses à la question d’id = 1, je n’ai pas pris la peine d’intégrer 
d’autres questions car la démarche est la même : remplacer l’id par 2 etc  dans $query = $pdo-
>query('SELECT enonce FROM enonces_questions WHERE id = 1');
Et changer de table de réponses dans $query = $pdo->query('SELECT * FROM question1');
Il reste après juste à changer les affichages des messages et images des résultats des questions.
Merci d’avance d’avoir pris le temps de regarder mon travail.
