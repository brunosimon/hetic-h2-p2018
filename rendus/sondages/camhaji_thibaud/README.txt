Sondageurope est un site permettant de savoir quels pays sont les mieux ou les pires selon trois crit�res :
- Pour y vivre quotidiennement
- Pour y travailler
- Pour y aller en vacances

Pour se faire, j'ai utilis� cette carte : http://winstonwolf.pl/clickable-maps/europe.html
Je l'ai bien s�r personaliser gr�ce aux outils de la carte ('size' : 750,tooltips : "floating",cities : true,loadingText : 'En cours de chargement')
Mais j'ai aussi modifi� le .psd afin de rendre la carte plus joli (� mon go�t).

Puis j'ai cr�� une base de donn�es correspondantes aux pays et aux diff�rents votes.
J'ai ensuite relier le clique sur un pays � l'affichage des donn�es correspondant � ce pays gr�ce � la m�thode GET.

Et enfin j'ai s�curis� afin de ne pas pouvoir voter dans n'importe quelle rubrique (si on change l'adresse du site), et surtout afin de ne pas pouvoir voter plusieurs fois le m�me choix dans le m�me pays ou le contraire de ce choix, j'ai proc�der � des tests par rapport � la session actuelle.

Petit plus : j'ai anim� les informations relatives � un pays afin de donner un peu de vie au site.