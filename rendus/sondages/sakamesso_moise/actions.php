<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!empty($_GET['action']))
{
	//update vote for the right gender
	$prepare = $pdo->prepare('UPDATE gender SET numb = numb + 1 WHERE id = :id');
	$prepare->bindValue('id',$_GET['action']);
	$prepare->execute();
}

$query = $pdo->query('SELECT *  FROM gender');
$gender =  $query->fetchAll();
$query = $pdo->query('SELECT SUM(numb) AS total_numb FROM gender');
$sum_boy = $pdo->query("SELECT SUM(numb) FROM `gender` WHERE `sex` = 'boy'");
$sum_girl = $pdo->query("SELECT SUM(numb) FROM `gender` WHERE `sex` = 'girl'");
$total_numb = $query->fetch()->total_numb;
$sumboys = $pdo->query("SELECT SUM(numb) as sumboy FROM `gender` WHERE `sex` = 'boy'"); 
$resultboy = $sumboys->fetch();
$sumgirls = $pdo->query("SELECT SUM(numb) as sumgirl FROM `gender` WHERE `sex` = 'girl'"); 
$resultgirl = $sumgirls->fetch();
//les pourcentages
$percent_girls = (($resultgirl->sumgirl)*100)/$total_numb;
$percent_boys = (($resultboy->sumboy)*100)/$total_numb;

?>