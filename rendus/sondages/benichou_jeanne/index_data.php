<?php
    require 'inc/config.php';
    //Get all candidates
    if(isset($_GET['alphabetique'])) {
        $query = $pdo->query('SELECT * FROM candidates order by names');
        $candidates = $query->fetchAll();
        
       // $names = preg_replace( " ", "+", $names);
        
        
    } elseif(isset($_GET['popularite_plus'])) {
        $query = $pdo->query('SELECT * FROM candidates order by votes DESC');
        $candidates = $query->fetchAll();
    } elseif(isset($_GET['popularite_moins'])) {
        $query = $pdo->query('SELECT * FROM candidates order by votes ASC');
        $candidates = $query->fetchAll();
    } else {
        $query = $pdo->query('SELECT * FROM candidates order by RAND()');
        $candidates = $query->fetchAll();
    }
    //Get votes count
    $query = $pdo->query('SELECT SUM(votes) total_votes FROM candidates');
    $total_votes = $query->fetch()->total_votes;

    //TOP3
    $query = $pdo->query('SELECT * FROM candidates ORDER BY votes DESC LIMIT 3');
    $classements = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FontPodium</title>
    <!-- Bootstrap-->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Style-->
    <link href="assets/css/main2.css" rel="stylesheet">
    <!-- Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Dosis|Abel|Noto+Sans|Droid+Sans|Lato|Arvo|Cabin|Playfair+Display|Lora|PT+Sans|Poiret+One|PT+Sans+Narrow|Arimo|Noto+Serif|Ubuntu|Bitter|PT+Serif|Lobster|Droid+Serif|Oswald|Oxygen|Montserrat|Hind|Bree+Serif|Vollkorn|Open+Sans|Open+Sans+Condensed:300|Nunito|Merriweather|Fjalla+One|Indie+Flower|Yanone+Kaffeesatz|Titillium+Web|Raleway|Roboto+Condensed|Slabo+27px|Roboto+Slab|Roboto' rel='stylesheet' type='text/css'>
</head>
                <!--Header /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<header>
    <ul>
        <li id="navMenu"><a href="index.php"><i class="fa fa-arrow-left"></i> Menu</a></li>
        <li><a href="?popularite_plus">Popularité <i class="fa fa-plus-square-o"></i></a></li>
        <li><a href="?popularite_moins">Popularité <i class="fa fa-minus-square-o"></i></a></li>
        <li><a href="?alphabetique">Alphabétique <i class="fa fa-sort-alpha-asc"></i></a></li>
    </ul>
</header>

                <!--Page /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<body>
    
     <?php foreach($candidates as $candidate): ?>
            <div class="col-lg-3">
                <div class="row w">
                    <div class="col-md-4"> <!-- Lettre -->
                        <p class="col-md-offset-3 letter" style="font-size : 140px; font-family:<?php echo $candidate->font ?>;">A</p>
                    </div><!-- col-md-4 -->
                    <div class="col-md-8"> <!-- Precisions Font -->
                        <div class="tab-content">
                            <h3 style="font-family:<?php echo $candidate->font ?>;"><?php echo $candidate->names ?></h3>
                            <h5><a href="http://www.fontsquirrel.com/fonts/<?php echo preg_replace( "# #", "-",$candidate->names) ?>" target="_blank"><i class="fa fa-plus"></i> Télécharger cette font</a></h5>
                            <hr>
                            <p class="nb_vote"><?php echo $candidate->votes ?> votes pour cette font</p>
                            <div class="data_container" style="background: #1abc9c; height : 20px; width : <?php echo ($candidate->votes/$total_votes)*100 ?>%;"></div>
                            <div class="pourcentage data" > <?php echo round($candidate->votes/$total_votes*100, 2) ?> %</div>
                        </div><!-- Tab Content -->
                    </div><!-- col-md-8 -->
                </div><!-- row w -->
            </div><!-- col-lg-6 -->
            </div><!-- col-lg-6 -->
        <?php endforeach; ?>
</body>
</html>