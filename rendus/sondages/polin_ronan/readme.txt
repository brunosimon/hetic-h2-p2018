#README

Le site en l'�tat n'est pas fini mais est op�rationel
Le site a pour vocation de conseiller l'utilisateur du film � voir selon o� il se situe

Il y a 3 questions se faisant simultanement en requ�te ajax :
- le distance de prospection (jusqu'o� l'utilisateur est pr�t � aller pour voir un film)
- si il est d'accord pour voir des vieux films dans les cin�mas
- quels sont ces deux genres favoris

Utilisation de l'API non officiel de Allocine
QUESTION 1 : geolocalisation
geolocalisation via javascript puis envoy� en AJAX
via l'API on trouve toutes les salles � proximit� ainsi que les films y passant selon le rayon qu'a defini l'utilisateur.
On cr�e un tableau conprenant tous les films � proximit� en �vitant les doublons.

Question 2 : vieux fims ou non
selon la date des films on supprime ou non le film

Question 3
on supprime selon les genres

(l'id�al serait d'avoir plus de question afin d'affiner le r�sultat et d'en avoir un unique)

BASE DE DONNEE
On demande alors � l'utilisateur de choisir les films restant dans la liste.
Le film choisit va soit dans la base de donn�e si personne ne l'a choisi avant et on indique � l'utilisateur qu'il est le premier � avoir choisi le film.
Si le film a d�j� �t� choisi alors on avertit l'utilisateur qu'il est la 'n'i�me personnes qui a choisi ce film




