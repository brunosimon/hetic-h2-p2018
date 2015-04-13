<?php 

require'config.php';
require'debut.php';
    
//boucle conditionel qui attribut plus ou moins de point selon le lien cliqué
    if(!empty($_GET['resultat']))
    {
        $prepare = $pdo->prepare('UPDATE resultat SET calcul_resultat = calcul_resultat + 1 WHERE id = 1 ');
        $prepare->bindvalue('id',$_GET['resultat']);
        $prepare->execute();
        
        $query = $pdo->query('UPDATE resultat SET question = question + 1  WHERE id = 1');
        $question = $query->fetch();
    }

if(!empty($_GET['resultatx2']))
    {
        $prepare = $pdo->prepare('UPDATE resultat SET calcul_resultat = calcul_resultat + 2 WHERE id = 1');    
        $prepare->bindvalue('id',$_GET['resultatx2']);
        $prepare->execute();
    
        $query = $pdo->query('UPDATE resultat SET question = question + 1  WHERE id = 1');
        $question = $query->fetch();
    }

if(!empty($_GET['resultatx3']))
    {
        $prepare = $pdo->prepare('UPDATE resultat SET calcul_resultat = calcul_resultat + 3 WHERE id = 1');    
        $prepare->bindvalue('id',$_GET['resultatx3']);
        $prepare->execute();
    
        $query = $pdo->query('UPDATE resultat SET question = question + 1  WHERE id = 1');
        $question = $query->fetch();
    }

if(!empty($_GET['resultatx4']))
    {
        $prepare = $pdo->prepare('UPDATE resultat SET calcul_resultat = calcul_resultat + 4 WHERE id = 1');    
        $prepare->bindvalue('id',$_GET['resultatx4']);
        $prepare->execute();
    
        $query = $pdo->query('UPDATE resultat SET question = question + 1  WHERE id = 1');
        $question = $query->fetch();
    }

if(!empty($_GET['resultatx5']))
    {
        $prepare = $pdo->prepare('UPDATE resultat SET calcul_resultat = calcul_resultat + 5 WHERE id = 1');    
        $prepare->bindvalue('id',$_GET['resultatx5']);
        $prepare->execute();
    
        $query = $pdo->query('UPDATE resultat SET question = question + 1  WHERE id = 1');
        $question = $query->fetch();
    }
//lancement du test
    if(!empty($_GET['start']))
    {
        $prepare = $pdo->prepare('UPDATE resultat SET question = question + 1 WHERE id = 1');    
        $prepare->bindvalue('id',$_GET['start']);
        $prepare->execute();
    }
//pour recommencer le test
    if(!empty($_GET['overwrite']))
    {
        $query = $pdo->query('UPDATE resultat SET calcul_resultat = 0 WHERE id = 1');
        $overwrite = $query->fetch();
        $query = $pdo->query('UPDATE resultat SET question = 0  WHERE id = 1');
        $overwrite = $query->fetch();
    }
        
    $query = $pdo->query('SELECT SUM(calcul_resultat) AS compteur FROM resultat WHERE id = 1');
    $compteur = $query->fetch()->compteur;

    $query = $pdo->query('SELECT SUM(question) AS question_compteur FROM resultat WHERE id = 1 ');
    $question_compteur = $query->fetch()->question_compteur;
    
//boucle qui affiche les questions en fonction du compteur
    if($question_compteur == 0)
    {
        echo '<div class="container">
    <div class="titre">Test Sport</div>
    <img src="https://s3-eu-west-1.amazonaws.com/3tags-prod/tag/543316f187282/543316f18cd0d/original.jpg" alt="">
    <div class="resultat">Tu voudrai faire du sport, mais tu ne sait pas lequel choisir. Ce test est là pour t\'aider! Découvre quel sport est fait pour toi!</div>
     
     <a href="?start=<?= 1 ?>">
     <div class="recommencer">Commencer le test</div>
       </a>
    </div>';
    }
    else if($question_compteur == 1)
    {
        echo '<div class="container">
        
        <div class="titre">Quel age as tu?</div>
        
        <a href="?resultat=<?=1?>">
            <div class="question transition">
               <div class="description">Moins de 16 ans</div>
            </div>
        </a>
        <a href="?resultatx4=<?=1?>">
            <div class="question transition">
                <div class="description">Entre 16 et 20 ans</div>
            </div>
        </a>
        <a href="?resultatx5=<?=1?>">
            <div class="question transition">
                <div class="description">Entre 20 et 25 ans</div>
            </div>
        </a>
        <a href="?resultatx3=<?=1?>">
            <div class="question transition">
                <div class="description">Entre 25 et 35 ans</div>
            </div>
        </a>
        <a href="?resultat=<?=1?>">
            <div class="question transition">
                <div class="description">Plus de 35 ans</div>
            </div>
        </a>
        
    </div>';
    }
    else if($question_compteur == 2)
    {
        echo '<div class="container">
        
        <div class="titre">Quel taille fait tu?</div>
        
        <a href="?resultat=<?=1?>">
            <div class="question transition">
               <div class="description">Moins de 1m60</div>
            </div>
        </a>
        <a href="?resultatx2=<?=1?>">
            <div class="question transition">
                <div class="description">entre 1m60 et 1m70</div>
            </div>
        </a>
        <a href="?resultatx3=<?=1?>">
            <div class="question transition">
                <div class="description">entre 1m70 et 1m80</div>
            </div>
        </a>
        <a href="?resultatx4=<?=1?>">
            <div class="question transition">
                <div class="description">entre 1m80 et 1m90</div>
            </div>
        </a>
        <a href="?resultatx5=<?=1?>">
            <div class="question transition">
                <div class="description">Plus de 1m90</div>
            </div>
        </a>
        
    </div>';
    }
    else if($question_compteur == 3)
    {
        echo '<div class="container">
        
        <div class="titre">Qu\'est ce qui te motive à faire du sport?</div>
        
        <a href="?resultat=<?=1?>">
            <div class="question transition">
               <div class="description">Perdre du poids</div>
            </div>
        </a>
        <a href="?resultatx2=<?=1?>">
            <div class="question transition">
                <div class="description">Gagner en muscle</div>
            </div>
        </a>
        <a href="?resultatx3=<?=1?>">
            <div class="question transition">
                <div class="description">Garder la forme</div>
            </div>
        </a>
        <a href="?resultatx4=<?=1?>">
            <div class="question transition">
                <div class="description">Développer mon agilité</div>
            </div>
        </a>
        <a href="?resultatx5=<?=1?>">
            <div class="question transition">
                <div class="description">Besoin de se défouler</div>
            </div>
        </a>
        
    </div>';
    }
    else if($question_compteur == 4)
    {
        echo '    <div class="container">
        
        <div class="titre">Qu\'est ce que tu aime dans le sport ?</div>
        
        <a href="?resultatx3=<?=1?>">
            <div class="question transition">
               <div class="description">Le dépassement de soi</div>
            </div>
        </a>
        <a href="?resultatx5=<?=1?>">
            <div class="question transition">
                <div class="description">L\'esprit d\'équipe</div>
            </div>
        </a>
        <a href="?resultat=<?=1?>">
            <div class="question transition">
                <div class="description">Les copines des sportifs</div>
            </div>
        </a>
        <a href="?resultatx2=<?=1?>">
            <div class="question transition">
                <div class="description">La compétition</div>
            </div>
        </a>
            </div>';
    }
    else if($question_compteur == 5)
    {
        echo '<div class="container">
        
        <div class="titre">Tu préfère plutôt…</div>
        
        <a href="?resultatx4=<?=1?>">
            <div class="question transition">
               <div class="description">Les sports de ballon</div>
            </div>
        </a>
        <a href="?resultatx3=<?=1?>">
            <div class="question transition">
                <div class="description">Les sports d\'agilité</div>
            </div>
        </a>
        <a href="?resultat=<?=1?>">
            <div class="question transition">
                <div class="description">Les sports de salle</div>
            </div>
        </a>
            </div>';
    }
    else if($question_compteur == 6)
    {
            echo '<div class="container">
        
        <div class="titre">Et enfin quel pays te parle le plus ?</div>
        
        <a href="?resultatx2=<?=1?>">
            <div class="question transition">
               <div class="description">L\'Espagne</div>
            </div>
        </a>
        <a href="?resultat=<?=1?>">
            <div class="question transition">
                <div class="description">La Suède</div>
            </div>
        </a>
        <a href="?resultatx2=<?=1?>">
            <div class="question transition">
                <div class="description">Les États-Unis</div>
            </div>
        </a>
        <a href="?resultatx2=<?=1?>">
            <div class="question transition">
                <div class="description">Le Canada</div>
            </div>
        </a>
        <a href="?resultatx5=<?=1?>">
            <div class="question transition">
                <div class="description">L\'Australie</div>
            </div>
        </a>
        
    </div>';
    }
    else if($question_compteur == 7){
//        affichage des page de résultat en fonction du score
        if($compteur > 25)
        {
            echo '<div class="container">
        
        <div class="titre">Tu devrai te mettre au Rugby!</div>
        
        <img src="http://i.rugbyrama.fr/2014/02/01/1176334-24158347-1600-900.jpg" alt="">
        
        
        <div class="resultat">
            
             Tu est un mal alpha, une montagne de muscle et tu veut un sport qui envoie du pâté !? Le rugby est fait pour toi ! Un sport de voyou joué par des Gentleman. Vient courir ballon en main et exploser cordialement la figure de tout ce qui se dresse devant toi.
            
        </div>
        
        <a href="?overwrite=<?=1?>">
        <div class="recommencer">Tu n\'est pas satisfait de ton résultat? Clique ici pour recommencer</div>
    </a>
        
    </div>';
        }
        else if($compteur > 23 && $compteur <= 25)
        {
            echo '<div class="container">
        
        <div class="titre">Tu devrai te mettre au Basketball!</div>
        
        <img src="http://i.ytimg.com/vi/vSNapvrROo4/maxresdefault.jpg" alt="">
        
        
        <div class="resultat">
            
Tu est plutôt un type sportif, que tu soit petit ou grand, et plutôt agile. Vient faire du Basket ! Sport plutôt équilibré qui te permettra de te défouler, de gagner en agilité et d’humilier tes adversaires en mettant un gros dunk.            
        </div>
        
        <a href="?overwrite=<?=1?>">
        <div class="recommencer">Tu n\'est pas satisfait de ton résultat? Clique ici pour recommencer</div>
    </a>
        
    </div>';
        }
            else if($compteur > 19 && $compteur <= 23)
        {
            echo ' <div class="container">
        
        <div class="titre">Tu devrai te mettre au Foot!</div>
        
        <img src="http://wallpoper.com/images/00/35/51/00/sports-soccer_00355100.jpg" alt="">
        
        
        <div class="resultat">
            
Magnifique sport qui te permettra aussi bien de te défouler que de faire parler tes talents d\'acteur. De plus si tu parvient a jouer en ligue professionnel tu n\'aura certainement plus à travailler, à défaut de passer des test de Q.I.
     
     </div>
     <a href="?overwrite=<?=1?>">
        <div class="recommencer">Tu n\'est pas satisfait de ton résultat? Clique ici pour recommencer</div>
    </a>
    </div>';}
                else if($compteur > 18 && $compteur <= 19)
        {
            echo '<div class="container">
        
        <div class="titre">Tu devrai te mettre au Hockey Aquatique!</div>
        
        <img src="http://www.votrepiscine.fr/wp-content/uploads/2013/06/hockey-subaquatique.jpg" alt="">
        
        
        <div class="resultat">
            
Tu est un peu le hipster du sport. Courir après un ballon c\'est trop mainstream, nager en apnée avec un palet au bout de la crosse, c\'est beaucoup plus avant-gardiste.        
    </div>
    <a href="?overwrite=<?=1?>">
        <div class="recommencer">Tu n\'est pas satisfait de ton résultat? Clique ici pour recommencer</div>
    </a>
    
    </div>';
        }
         else if($compteur > 12 && $compteur <= 18)
        {
            echo '<div class="container">
        
        <div class="titre">Tu devrai te mettre à la Musculation!</div>
        
        <img src="http://www.mega-gear.net/img/cms/erreurs%20musculation.jpg" alt="">
        
        
        <div class="resultat">
            
Tu est ce qu\'on appelle le sportifs du printemps. Trop fainéant pour faire du sport, tu arrive généralement à te motiver pour payer un abonnement a la salle de sport début avril dans la perspective de faire le Bobby sur la plage pendant la période estivale.    </div>

   <a href="?overwrite=<?=1?>">
        <div class="recommencer">Tu n\'est pas satisfait de ton résultat? Clique ici pour recommencer</div>
    </a>
   
   </div>';
        }
         else if($compteur <= 12)
        {
            echo '<div class="container">
        
        <div class="titre">Tu devrai te mettre au Basketball!</div>
        
        <img src="http://www.link-art.org/wp-content/uploads/2013/03/cinemadegenre_curling-king-6.jpg" alt="">
        
        
        <div class="resultat">
            
tu n\'est pas très sportif, voir petit et gros ou bien grand et rachitique. Mais tu veut quand même faire du sport pour essayer de sortir de ta condition. Le curling est tout indiqué pour toi. Vient balayer la glace frénétiquement, sans pour autant risquer de te froisser un orteil.        </div>
        
        <a href="?overwrite=<?=1?>">
        <div class="recommencer">Tu n\'est pas satisfait de ton résultat? Clique ici pour recommencer</div>
    </a>
        
    </div>';
        }
    }

require'fin.php';