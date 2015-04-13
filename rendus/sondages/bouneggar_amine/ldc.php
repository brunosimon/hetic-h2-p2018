<?php
require 'inc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sondage Football</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="header">
	<div id='cssmenu'>
  <ul>
     <li><a href='accueil.php'>Accueil</a></li>
     <li class="active"><a href='ldc.php'>Ligue des Champions</a></li>
     <li><a href='france.php'>Ligue 1</a></li>
     <li><a href='angleterre.php'>Premier League</a></li>
     <li><a href='espagne.php'>Liga BBVA</a></li>
     <li><a href='italie.php'>Serie A</a></li>
     <li><a href='joueurs.php'>Joueurs</a></li>
  </ul>
	</div>
  

  <div>
    <a href="vote.php?vote=1" class="LinkButton">VOTER</a>
    <a href="vote.php?vote=2" class="LinkButton2">VOTER</a>
    <a href="vote.php?vote=3" class="LinkButton3">VOTER</a>
    <a href="vote.php?vote=4" class="LinkButton4">VOTER</a>
    <a href="vote.php?vote=5" class="LinkButton5">VOTER</a>
    <a href="vote.php?vote=6" class="LinkButton6">VOTER</a>
    <a href="vote.php?vote=7" class="LinkButton7">VOTER</a>
    <a href="vote.php?vote=8" class="LinkButton8">VOTER</a>
  </div>
    
  <h1>QUI VA REMPORTER LA CHAMPIONS LEAGUE ?</h1>

  <ul class="reponses">
  
  <li>
    <div class="team">
       <div class="info">
         <img src="img/psg.png" alt=""/>
         <h2>PSG</h2>
         <h3>France</h3> 
      </div>
      <div class="info_reveal">
        <h4>4 Victoires </br>3 Nuls </br>1 Défaite<br/>Buts marqués: 13 </br>Buts encaissés: 10</h4>
      </div>
    </div>
  </li>

   <li>
    <div class="team">
       <div class="info">
         <img src="img/barca.png" alt=""/>
         <h2>FC BARCELONE</h2>
         <h3>Espagne</h3> 
      </div>
      <div class="info_reveal">
        <h4>7 Victoires<br/>0 Nul</br>1 Défaite</br>Buts marqués: 18</br>Buts encaissés: 6</h4>
        
      </div>
    </div>
  </li>
  
   
    <li>
    <div class="team">
       <div class="info">
         <img src="img/real.png" alt=""/>
         <h2>REAL MADRID</h2>
         <h3>Espagne</h3> 
      </div>
      <div class="info_reveal">
        <h4>7 Victoires<br/>0 Nul</br>1 Défaite</br>Buts marqués: 21</br>Buts encaissés: 6</h4>
      </div>
    </div>
  </li>
  

  <li>
    <div class="team">
       <div class="info">
         <img src="img/bayern.png" alt=""/>
         <h2>FC BAYERN MUNICH</h2>
         <h3>Allemagne</h3> 
      </div>
      <div class="info_reveal">
        <h4>6 Victoires<br/>1 Nul</br>1 Défaite</br>Buts marqués: 23</br>Buts encaissés: 4</h4>
      </div>
    </div>
  </li>
  
    
    <li>
    <div class="team">
       <div class="info">
         <img src="img/juve.png" alt=""/>
         <h2>JUVENTUS TURIN</h2>
         <h3>Italie</h3> 
      </div>
      <div class="info_reveal">
        <h4>5 Victoires<br/>1 Nul</br>2 Défaites</br>Buts marqués: 12</br>Buts encaissés: 5</h4>
      </div>
    </div>
  </li>

  <li>
    <div class="team">
       <div class="info">
         <img src="img/monaco.png" alt=""/>
         <h2>AS MONACO</h2>
         <h3>France</h3> 
      </div>
      <div class="info_reveal">
        <h4>3 Victoires<br/>2 Nuls</br>2 Défaites</br>Buts marqués: 7</br>Buts encaissés: 4</h4>
      </div>
    </div>
  </li>

  <li>
    <div class="team">
       <div class="info">
         <img src="img/atletico.png" alt=""/>
         <h2>ATLETICO MADRID</h2>
         <h3>Espagne</h3> 
      </div>
      <div class="info_reveal">
        <h4>5 Victoires<br/>1 Nul</br>2 Défaites</br>Buts marqués: 15</br>Buts encaissés: 4</h4>
      </div>
    </div>
  </li>

  <li>
    <div class="team">
       <div class="info">
         <img src="img/porto.png" alt=""/>
         <h2>FC PORTO</h2>
         <h3>Portugal</h3> 
      </div>
      <div class="info_reveal">
        <h4>5 Victoires<br/>3 Nuls</br>0 Défaite</br>Buts marqués: 21</br>Buts encaissés: 5</h4>
      </div>
    </div>
  </li>

</ul>

<style type="text/css">

/*Style sondage ligue des champions*/
body{
background-color: #000000;
  font-family: "Gotham";
  padding: 50px 100px;
  max-width: 65em;
  background-image:url(img/ldc.jpg);
  background-size: 100%;
}

@font-face {
      font-family: "MemphisMedium";
    }

h1{
  top: 80px;
  font-size: 20px;
  font-family: "MemphisMedium";
  color: #cbcbcb;
  text-align: center;
}

.team {
  width:100%;
  position:relative;
  overflow:hidden;
  height:250px;
  top: 70px;
  left: 110px;

}

.info {
  height:100%;
}

.info img {
  width:100%;
  transition: all .4s ease-out .1s;
   -moz-transition: all .4s ease-out .1s;
   -webkit-transition: all .4s ease-out .1s;
}

.info h2 {
  padding: 10px 10px 0 0;
  margin: 0 0 10px 3px;
  line-height: 1em;
  opacity: 1;
  transition: all .2s ease-out .1s;
   -moz-transition: all .2s ease-out .1s;
   -webkit-transition: all .2s ease-out .1s;
  font-size: 1.125em;
  color: #ffffff;
}

.info h3 {
  padding:0 10px 0 0;
  font-size:12px;
  margin:0 0 0 3px;
  line-height:1em;
  text-transform:uppercase;
  color:#999;
  opacity:1;
  transition: all .2s ease-out .1s;
   -moz-transition: all .2s ease-out .1s;
   -webkit-transition: all .2s ease-out .1s;
}



.info_reveal {
  height:100%; 
  transition: all .3s ease-in 0s;
   -moz-transition: all .3s ease-in 0s;
   -webkit-transition: all .23s ease-in 0s;
  position:absolute;
  width:100%;
  left:0;
  top:-100%;
  background: #1b9bff;
}



.reponses {
 margin:0;
 padding:0;
 list-style:none;
 margin-top: -50px;
}

.reponses li {
 cursor: pointer;
 width: 16.66667%;
 padding: 0px 30px 110px;
 float:left;
}

.reponses li:hover .info_reveal,
.reponses li:focus .info_reveal{
 left: 0;
 top:0;
 transition: all .3s ease-out .1s;
   -moz-transition: all .3s ease-out .1s;
   -webkit-transition: all .3s ease-out .1s;
}

.reponses li:hover .info img,
.reponses li:focus .info img {
  width:210%;
  margin-left:-50%;
  transition: all .4s ease-in 0s;
   -moz-transition: all .4s ease-in 0s;
   -webkit-transition: all .4s ease-in 0s;
}

.reponses li:hover .info h2,
.reponses li:focus .info h2,
.reponses li:hover .info h3,
.reponses li:focus .info h3 {
  opacity: 0;
  transition: opacity .2s linear 0s;
   -moz-transition: opacity .2s linear 0s;
   -webkit-transition: opacity .2s linear 0s;
}

h2, h3, .info_reveal a {
  font-family: 'Gotham', sans-serif;
}


/*Bouton VOTER 1*/

a.LinkButton {
  position: absolute;
  margin-top: 340px;
  margin-left: 140px;
  display: inline-block;
  width: 150px;
  padding: 8px;
  color: #fff;
  font-family: 'Josefin Sans',Helvetica,Arial,sans-serif;
  background-color: transparent;
  border: 2px solid #aaa;
  text-align: center;
  outline: none;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 400;
  letter-spacing: 2px;
  transition: color 0.3s ease-out, background-color 0.3s ease-out, border-color 0.3s ease-out;
}

a.LinkButton:hover,
a.LinkButton:active {
  background-color: #aa2238;
  border-color: #aa2238;
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}


/*Bouton VOTER 2*/

a.LinkButton2 {
  position: absolute;
  margin-top: 340px;
  margin-left: 373px;
  display: inline-block;
  width: 150px;
  padding: 8px;
  color: #fff;
  font-family: 'Josefin Sans',Helvetica,Arial,sans-serif;
  background-color: transparent;
  border: 2px solid #aaa;
  text-align: center;
  outline: none;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 400;
  letter-spacing: 2px;
  transition: color 0.3s ease-out, background-color 0.3s ease-out, border-color 0.3s ease-out;
}

a.LinkButton2:hover,
a.LinkButton2:active {
  background-color: #aa2238;
  border-color: #aa2238;
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}

/*Bouton VOTER 3*/

a.LinkButton3 {
  position: absolute;
  margin-top: 340px;
  margin-left: 607px;
  display: inline-block;
  width: 150px;
  padding: 8px;
  color: #fff;
  font-family: 'Josefin Sans',Helvetica,Arial,sans-serif;
  background-color: transparent;
  border: 2px solid #aaa;
  text-align: center;
  outline: none;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 400;
  letter-spacing: 2px;
  transition: color 0.3s ease-out, background-color 0.3s ease-out, border-color 0.3s ease-out;
}

a.LinkButton3:hover,
a.LinkButton3:active {
  background-color: #aa2238;
  border-color: #aa2238;
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}


/*Bouton VOTER 4*/

a.LinkButton4 {
  position: absolute;
  margin-top: 340px;
  margin-left: 840px;
  display: inline-block;
  width: 150px;
  padding: 8px;
  color: #fff;
  font-family: 'Josefin Sans',Helvetica,Arial,sans-serif;
  background-color: transparent;
  border: 2px solid #aaa;
  text-align: center;
  outline: none;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 400;
  letter-spacing: 2px;
  transition: color 0.3s ease-out, background-color 0.3s ease-out, border-color 0.3s ease-out;
}

a.LinkButton4:hover,
a.LinkButton4:active {
  background-color: #aa2238;
  border-color: #aa2238;
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}

/* Bouton VOTER 5*/
a.LinkButton5 {
  position: absolute;
  margin-top: 700px;
  margin-left: 140px;
  display: inline-block;
  width: 150px;
  padding: 8px;
  color: #fff;
  font-family: 'Josefin Sans',Helvetica,Arial,sans-serif;
  background-color: transparent;
  border: 2px solid #aaa;
  text-align: center;
  outline: none;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 400;
  letter-spacing: 2px;
  transition: color 0.3s ease-out, background-color 0.3s ease-out, border-color 0.3s ease-out;
}

a.LinkButton5:hover,
a.LinkButton5:active {
  background-color: #aa2238;
  border-color: #aa2238;
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}

/* Bouton VOTER 6*/
a.LinkButton6 {
  position: absolute;
  margin-top: 700px;
  margin-left: 373px;
  display: inline-block;
  width: 150px;
  padding: 8px;
  color: #fff;
  font-family: 'Josefin Sans',Helvetica,Arial,sans-serif;
  background-color: transparent;
  border: 2px solid #aaa;
  text-align: center;
  outline: none;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 400;
  letter-spacing: 2px;
  transition: color 0.3s ease-out, background-color 0.3s ease-out, border-color 0.3s ease-out;
}

a.LinkButton6:hover,
a.LinkButton6:active {
  background-color: #aa2238;
  border-color: #aa2238;
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}

/* Bouton VOTER 7*/
a.LinkButton7 {
  position: absolute;
  margin-top: 700px;
  margin-left: 607px;
  display: inline-block;
  width: 150px;
  padding: 8px;
  color: #fff;
  font-family: 'Josefin Sans',Helvetica,Arial,sans-serif;
  background-color: transparent;
  border: 2px solid #aaa;
  text-align: center;
  outline: none;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 400;
  letter-spacing: 2px;
  transition: color 0.3s ease-out, background-color 0.3s ease-out, border-color 0.3s ease-out;
}

a.LinkButton7:hover,
a.LinkButton7:active {
  background-color: #aa2238;
  border-color: #aa2238;
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}

/* Bouton VOTER 8*/
a.LinkButton8 {
  position: absolute;
  margin-top: 700px;
  margin-left: 840px;
  display: inline-block;
  width: 150px;
  padding: 8px;
  color: #fff;
  font-family: 'Josefin Sans',Helvetica,Arial,sans-serif;
  background-color: transparent;
  border: 2px solid #aaa;
  text-align: center;
  outline: none;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: 400;
  letter-spacing: 2px;
  transition: color 0.3s ease-out, background-color 0.3s ease-out, border-color 0.3s ease-out;
}

a.LinkButton8:hover,
a.LinkButton8:active {
  background-color: #aa2238;
  border-color: #aa2238;
  color: #fff;
  text-decoration: none;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}


    </style>
  </body>
</html>