<?php
require 'inc/config.php';

// Récuperer les derniers utilisateurs
$prepare = $pdo->prepare('SELECT * FROM utilisateurs ORDER BY date_creation DESC LIMIT 10');
$prepare->execute();
$lastPlayers = $prepare->fetchAll();

// Pourcentage pour chaque profil
$prepare = $pdo->prepare('SELECT resultat FROM utilisateurs');
$prepare->execute();
$select   = $prepare->fetchAll();
$compteur = [
	"developpeur"        => 0,
	"designer"           => 0,
	"marketeur"          => 0,
	"branleur"           => 0,
	"pluridisciplinaire" => 0,
];
foreach ($select as $item) {
	$compteur[$item["resultat"]]++;
}

function calculerPourcentage($value) {
	global $select;
	$calc   = $value/sizeOf($select);
	$calc   = $calc*100;
	$result = number_format($calc, 2, ',', ' ');
	return $result;
}

$stats = [
	"developpeur"        => calculerPourcentage($compteur["developpeur"]),
	"designer"           => calculerPourcentage($compteur["designer"]),
	"marketeur"          => calculerPourcentage($compteur["marketeur"]),
	"branleur"           => calculerPourcentage($compteur["branleur"]),
	"pluridisciplinaire" => calculerPourcentage($compteur["pluridisciplinaire"])
];

// Pourcentage le plus élevé
$meilleurPourcentage = [
	"pourcentage" => $stats[array_keys($stats, max($stats))[0]],
	"profil"      => array_keys($stats, max($stats))[0]
];

// On supprime le meilleur pourcentage
unset($stats[$meilleurPourcentage["profil"]]);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quizz</title>

    <!-- CSS -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- JS -->
</head>
<body>


    <section id="home">


        <iframe id="video-background"
src="//www.youtube.com/embed/E24It8TLwGY?autoplay=1&controls=0&showinfo=0&loop=1&playlist=E24It8TLwGY&autohide=1&enablejsapi=1">
</iframe>
        <div class="container">
            <div class="row center">
                <div class="col-xs-12">
                    <h1 class="logo-title">Quizz</h1>
                    <p class="slogan">Quels types d'Héticiens êtes vous ?</p>
                    <div class="text-center"><img class="arrow bounce" src="img/sert.svg" alt=""></div>
                </div>
            </div>

        </div>
    </section>

    <section id="stats">
        <div class="container">
            <h2 class="title-section">Statistiques</h2>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <p><span class="Count"><?=$meilleurPourcentage["pourcentage"]?>%</span> <br/><span class="profil-count"><?=$meilleurPourcentage["profil"]?></span></p>
                </div>
<?php foreach ($stats as $profil => $pourcentage):?>
                    <div class="col-sm-3 col-xs-6 ">
                        <p><span class="Count"><?=$pourcentage?>%</span> <br/><span class="profil-count"><?=$profil?></span></p>
                    </div>
<?php endforeach?>
</div>
<hr>
        </div>

    </section>

    <section id="quizz">
        <div class="container">
            <h2 class="logo-title">Le quizz</h2>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="jeu.php" class="btn btn-primary btn-lg">Commencer le quizz</a>
                </div>
            </div>
        </div>
    </section>

    <section id="last-players">
        <div class="container">
            <h2 class="title-section-2 text-center">Derniers joueurs</h2>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table text-center">
                        <tr>
                            <th class="text-center top-title">Pseudo</th>
                            <th class="text-center top-title">Résultat du quizz</th>
                        </tr>

<?php foreach ($lastPlayers as $player):?>
                            <tr>
                                <td class="pseudo"><?=$player["pseudo"]?></td>
                                <td class="pseudo"><?=$player["resultat"]?></td>
                            </tr>

<?php endforeach?>
</table>
                </div>
            </div>
        </div>
    </section>


</div>
 <script src="lib/jquery/jquery-1.11.1.min.js"></script>
 <script src="js/main.js"></script>
</body>
