<?php
session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;exercice-sondage-wetteren_remi', 'root', 'root');
}
catch (Exception $e)
{
    // Failed to connect
    die('Cound not connect');
}

$title = 'Psyc\'Hétic | Résultats';//title of the page

//Read questionnary
$results = array( 
    $_POST["Q0"], 
    $_POST["Q1"],
    $_POST["Q2"],
    $_POST["Q3"],
    $_POST["Q4"],
    $_POST["Q6"],
    $_POST["Q7"],
    $_POST["Q8"],
    $_POST["Q9"],
    $_POST["Q10"],
    $_POST["Q11"],
    $_POST["Q12"],
    $_POST["Q13"],
    $_POST["Q14"],
    $_POST["Q15"],
    $_POST["Q16"],
    $_POST["Q17"],
    $_POST["Q18"],
    $_POST["Q19"],
    $_POST["Q20"]);

//Data associated for the test
//First is the type (alt,sai,sad,emo,esp) second is the value linked
$data = [
    [[1,20],[5,10],[5,50],[2,-24],[4,-100]],//0
    [[1,11],[2,10],[4,17],[3,21],[4,-13]],//1
    [[4,-16],[1,22],[1,25],[2,-40],[1,-12]],//2
    [[5,14],[4,30],[5,-10],[2,-23],[4,-16]],//3
    [[4,8],[1,12],[5,-19],[5,18],[3,30]],//4
    [[1,30],[2,-28],[3,30],[3,40],[3,50]],//5
    [[4,10],[5,7],[4,25],[4,-17],[4,-14]],//6
    [[5,-12],[2,-15],[1,19],[3,-18],[3,32]],//7
    [[2,30],[4,21],[4,25],[4,-20],[2,-21]],//8
    [[2,12],[2,-10],[2,-15],[2,-40],[4,-26]],//9
    [[1,50],[1,20],[4,-50],[3,-38],[3,40]],//10
    [[2,15],[5,16],[5,-17],[2,-28],[3,-25]],//11
    [[2,15],[4,26],[2,14],[1,-18],[5,-30]],//12
    [[2,35],[5,-26],[1,18],[3,-12],[3,-69]],//13
    [[1,20],[5,-12],[5,50],[1,29],[1,-60]],//14
    [[2,20],[1,-13],[2,-28],[2,-25],[5,-19]],//15
    [[2,30],[2,14],[5,10],[4,-30],[5,-24]],//16
    [[4,35],[5,18],[3,15],[5,-22],[3,26]],//17
    [[4,17],[3,12],[5,-20],[3,33],[3,14]],//18
    [[5,16],[5,-20],[5,-10],[4,-29],[4,-68]],//19
    [[1,12],[3,-67],[5,30],[2,-48],[3,-27]]//20
];
    
$myScore = 0;
$long = (float)$_POST["LONG"];
$lat = (float)$_POST["LAT"];
$alt = 0;
$sai = 0;
$sad = 0;
$emo = 0;
$esp = 0;
$sain = 0;
$normal = 0;
$fou = 0;

//Define max point of the test
$maxPoints = count($results)*4;

//Calcul score for each answer
for($i = 0; $i<count($results); $i++){
    $myScore += $results[$i]-1;
    
    if($results[$i]==1){$sain++;}
    else if($results[$i]==2 || $results[$i]==3){$normal++;}
    else{$fou++;}
    try{
        switch($data[$i][$results[$i]][0]){
            default:
            break;
            case 1: 
            $alt+=$data[$i][$results[$i]][1];
                break;
            case 2: 
            $sai+=$data[$i][$results[$i]][1];
                break;
            case 3: 
            $sad+=$data[$i][$results[$i]][1];
                break;
            case 4: 
            $emo+=$data[$i][$results[$i]][1];
                break;
            case 5: 
            $esp+=$data[$i][$results[$i]][1];
                break;
        }
    }catch(Exception $e){}
}
$sain = round(($sain*100)/21);
$normal = round(($normal*100)/21);
$fou = round(($fou*100)/21);
$isFou = isCrazy($myScore);

$prepare = $bdd->prepare('INSERT INTO rw_psycho_users(LAT, LON, ALT, SAI, SAD, EMO, ESP, FOU) VALUES(:lat, :long, :alt, :sai, :sad, :emo, :esp, :fou)');
$prepare->execute(array(
    'lat' => $lat,
    'long' => $long,
    'alt' => $alt,
    'sai' => $sai,
    'sad' => $sad,
    'emo' => $emo,
    'esp' => $esp,
    'fou' => $isFou
    ));


//Read Database
$reponse = $bdd->query('SELECT * FROM rw_psycho_users');
$donnees = $reponse->fetchAll();

//Transform variables into cookies

$_SESSION['donnees'] = $donnees;

setcookie('lat', $lat, time() + 365*24*3600, null, null, false, true);
setcookie('long', $long, time() + 365*24*3600, null, null, false, true);
setcookie('alt', $alt, time() + 365*24*3600, null, null, false, true);
setcookie('sai', $sai, time() + 365*24*3600, null, null, false, true);
setcookie('sad', $sad, time() + 365*24*3600, null, null, false, true);
setcookie('emo', $emo, time() + 365*24*3600, null, null, false, true);
setcookie('esp', $esp, time() + 365*24*3600, null, null, false, true);
setcookie('sain', $sain, time() + 365*24*3600, null, null, false, true);
setcookie('normal', $normal, time() + 365*24*3600, null, null, false, true);
setcookie('fou', $fou, time() + 365*24*3600, null, null, false, true);
setcookie('myScore', $myScore, time() + 365*24*3600, null, null, false, true);


function isCrazy($scoore){
    if($scoore>40) return 1; 
    else return 0;
}

echo "all is ok";
if($isFou==1){//PSYCHO
    header('Location: ../Psycho/psycho');
}
else{//NOT PSYCHO
    header('Location: ../Psycho/not_psycho');
}
            

?>