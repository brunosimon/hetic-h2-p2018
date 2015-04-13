README

***********************

VU QUE VOUS ETES SUR MAC, VOUS DEVREZ METTRE "ROOT" COMME MOT DE PASSE POUR ACCEDER A LA BDD DANS LE FICHIER CONFIG.php 

***********************

Ce site à un but simple : proposer la création de sondages aux questions simples, pour des réponses simples.
En effet, deux choix uniques vous sont proposés : un smiley happy, et un smiley pas-happy.
Pour cela, il vous est proposé de vous inscrire. Peu d'informations sont nécessaires, votre pseudo, mail, mot de passe et basta.
Après inscription, connexion (sans vérification par mail), vous êtes redirigé sur la page d'accueil qui vous présente les derniers sondages.
Il vous est possible de poster un sondage de manière très simple, juste en tapant votre question dans l'input, PHP s'occupe du reste.
Ensuite, lorsque vous votez pour un sondage, votre vote est retenu dans un cookie, vous empêchant ainsi de flooder sur un sondage et donc de fausser les résultats. Normalement, votre vote devrait être suivi d'une animation qui résume les votes totaux.
Il vous est possible de retrouver vos sondages.



Difficultés majeures :

-Je n'avais pas rendu le devoir du formulaire d'inscription, car j'avais eu des difficultés pour gérer les erreurs. J'en ai encore eu ce coup-
ci.
Le problème était que même si la saisie des différents champs était correcte, le tableau  qui repértoriait les erreurs ($result) ne se vidait 
pas et bloquait donc l'insertion d'un nouveau membre dans la BDD. 

- Je ne suis pas très à l'aise avec les sessions et les cookies, j'ai du mal à déterminer si c'est dans l'un ou l'autre que je dois placer 
telle ou telle variable. Vous trouverez tout de même des cookies pour chaque sondage (normalement) mais je ne suis pas sûr qu'ils fonctionnent
proprement. 
EDIT : J'ai voulu créer un cookie pour chaque sondage qui comporte l'id du sondage en question dans son nom 
( $_COOKIE['sondage'.$_sondage->id.'_cookie'] ), mais visiblement, il faut que je crée l'objet $sondages pour pouvoir faire référence à l'id 
du sondage ( $sondage->id ). Malheureusement, le temps me manque.

-J'ai tenté d'appliquer et d'adapter le routing, que vous trouverez en commentaire au début d'index.php, mais ça faisait méchamment ramer la
page et ça m'affichait plein d'erreurs relatives à la connexion à la base de données.

-Je n'ai pas eu le temps de faire de l'AJAX, mais j'en avais l'intention.

- Le style des résultats n'est pas abouti, sorry.

-Je me suis complétement emmêlé les pinceaux en m'occupant de l'htaccess, d'où le retard (j'en suis désolé). Ca a engendré une erreur que je n'avais pas avant relative à la variable $new_question. Elle appraît "sous" le menu.

Au final, même si les erreurs ont été nombreuses, ce fut tout de même un plaisir de faire ce devoir. N'hésitez pas, si j'ose dire, à me faire 
la moindre remarque, je désire savoir ce qui ne va pas et ce qui a été fait "salement".  