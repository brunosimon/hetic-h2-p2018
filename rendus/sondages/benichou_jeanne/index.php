<?php
    require 'inc/config.php';
//if vote sent
    if (!empty($_GET['vote']))
    {
        //Update vote for the right candidate
        $prepare = $pdo->prepare('UPDATE candidates SET votes = votes +1 WHERE id = :id');
        $prepare->bindValue('id',$_GET['vote']);
        $prepare->execute();
        
        header('Location: ./');
    }
    //Get all candidates
    $query = $pdo->query('SELECT * FROM candidates order by RAND() Limit 2');
    $candidates = $query->fetchAll();

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
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Dosis|Abel|Noto+Sans|Droid+Sans|Lato|Arvo|Cabin|Playfair+Display|Lora|PT+Sans|Poiret+One|PT+Sans+Narrow|Arimo|Noto+Serif|Ubuntu|Bitter|PT+Serif|Lobster|Droid+Serif|Oswald|Oxygen|Montserrat|Hind|Bree+Serif|Vollkorn|Open+Sans|Open+Sans+Condensed:300|Nunito|Merriweather|Fjalla+One|Indie+Flower|Yanone+Kaffeesatz|Titillium+Web|Raleway|Roboto+Condensed|Slabo+27px|Roboto+Slab|Roboto' rel='stylesheet' type='text/css'>
  
  </head>

  <body>
  <header>
   <img src="assets/FontPodium.png" alt="Logo" class="logo">
   <p>Votez pour votre font préférée et placez là en haut du podium</p>
   </header>
    <div class="container">
      
         <!--Vote Font /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
      <!-- Début foreach-->
      <?php foreach($candidates as $candidate): ?>
      
       <!-- Font-->
        <a href="?vote=<?= $candidate->id ?>" class="link vote">
            <div class="col-lg-6">
                <div class="row w">
                    <div class="col-md-4"> <!-- Lettre -->
                        <p class="col-md-offset-3 letter" style="font-size : 140px; font-family:<?php echo $candidate->font ?>;">A</p>
                    </div><!-- col-md-4 -->
                    <div class="col-md-8"> <!-- Precisions Font -->
                        <div class="tab-content">
                            <h3 style="font-family:<?php echo $candidate->font ?>;"><?php echo $candidate->names ?></h3>
                            <hr>
                            <p style="font-family:<?php echo $candidate->font ?>;">ABCDEFGHIJKLMNOPQRSTUVWXYZ</br>abcdefghijklmnopqrstuvwxyz</br>1234567890</p> 
                            <p style="font-family:<?php echo $candidate->font ?>;" class="ptest">Testez la font</p>
                            <p><i class="fa fa-heart"></i></p>
                        </div><!-- Tab Content -->
                    </div><!-- col-md-8 -->
                </div><!-- row w -->
            </div><!-- col-lg-6 -->
        </a>
    <!-- Fin foreach-->	
    <?php endforeach; ?>
   
            <!--Input test /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <div class="col-sm-offset-4 col-lg-4">
    <input id="inputtest" maxlength="40" type="text" placeholder="Testez les fonts avec votre phrase" class="input-lg form-control" name="test" onkeyup="test()">
      </div> 
       
                <!--Podium /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <section>
            <div class="col-sm-offset-1 col-lg-10">
                <div class="link_data">Le Podium</div>
                <div class="link_data link_index"><a class="link" href="index_data.php"><i class="fa fa-plus-square-o"></i> Voir toutes les statistiques</a></div>
                <hr>
            <!-- Début foreach-->
            <?php 
            $i = 1;
            foreach($classements as $classement): ?>
           
                <p style="font-family:<?php echo $classement->font ?>;">Place <?php echo $i; ?> :  <?php echo $classement->names ?></p>
                <div class="pourcentage" style="background: #1abc9c; height : 20px; width : <?php echo ($classement->votes/$total_votes)*100 ?>%;"></div>
                <div class="pourcentage data" > <?php echo round($classement->votes/$total_votes*100, 2) ?> %</div>
            
            <?php $i++; ?>
            <!-- Fin foreach-->
            <?php endforeach; ?>
            
            </div>
        </section>
    </div>
        
        
    </div>
    <!-- JS-->
    <script src="script.js"></script>
  </body>
</html>
