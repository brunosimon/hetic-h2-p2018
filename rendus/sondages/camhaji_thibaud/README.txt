Sondageurope est un site permettant de savoir quels pays sont les mieux ou les pires selon trois critères :
- Pour y vivre quotidiennement
- Pour y travailler
- Pour y aller en vacances

Pour se faire, j'ai utilisé cette carte : http://winstonwolf.pl/clickable-maps/europe.html
Je l'ai bien sûr personaliser grâce aux outils de la carte ('size' : 750,tooltips : "floating",cities : true,loadingText : 'En cours de chargement')
Mais j'ai aussi modifié le .psd afin de rendre la carte plus joli (à mon goût).

Puis j'ai créé une base de données correspondantes aux pays et aux différents votes.
J'ai ensuite relier le clique sur un pays à l'affichage des données correspondant à ce pays grâce à la méthode GET.

Et enfin j'ai sécurisé afin de ne pas pouvoir voter dans n'importe quelle rubrique (si on change l'adresse du site), et surtout afin de ne pas pouvoir voter plusieurs fois le même choix dans le même pays ou le contraire de ce choix, j'ai procéder à des tests par rapport à la session actuelle.

Petit plus : j'ai animé les informations relatives à un pays afin de donner un peu de vie au site.