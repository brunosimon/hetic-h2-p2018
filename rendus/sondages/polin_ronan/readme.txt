#README

Le site en l'état n'est pas fini mais est opérationel
Le site a pour vocation de conseiller l'utilisateur du film à voir selon où il se situe

Il y a 3 questions se faisant simultanement en requête ajax :
- le distance de prospection (jusqu'où l'utilisateur est prêt à aller pour voir un film)
- si il est d'accord pour voir des vieux films dans les cinémas
- quels sont ces deux genres favoris

Utilisation de l'API non officiel de Allocine
QUESTION 1 : geolocalisation
geolocalisation via javascript puis envoyé en AJAX
via l'API on trouve toutes les salles à proximité ainsi que les films y passant selon le rayon qu'a defini l'utilisateur.
On crée un tableau conprenant tous les films à proximité en évitant les doublons.

Question 2 : vieux fims ou non
selon la date des films on supprime ou non le film

Question 3
on supprime selon les genres

(l'idéal serait d'avoir plus de question afin d'affiner le résultat et d'en avoir un unique)

BASE DE DONNEE
On demande alors à l'utilisateur de choisir les films restant dans la liste.
Le film choisit va soit dans la base de donnée si personne ne l'a choisi avant et on indique à l'utilisateur qu'il est le premier à avoir choisi le film.
Si le film a déjà été choisi alors on avertit l'utilisateur qu'il est la 'n'ième personnes qui a choisi ce film




