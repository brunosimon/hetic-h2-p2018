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
     <li><a href='ldc.php'>Ligue des Champions</a></li>
     <li><a href='france.php'>Ligue 1</a></li>
     <li><a href='angleterre.php'>Premier League</a></li>
     <li><a href='espagne.php'>Liga BBVA</a></li>
     <li class="active"><a href='italie.php'>Serie A</a></li>
     <li><a href='joueurs.php'>Joueurs</a></li>
  </ul>
	</div>

  <div>
    <a href="vote4.php?vote=1" class="LinkButton">VOTER</a>
    <a href="vote4.php?vote=2" class="LinkButton2">VOTER</a>
    <a href="vote4.php?vote=3" class="LinkButton3">VOTER</a>
    <a href="vote4.php?vote=4" class="LinkButton4">VOTER</a>
    <a href="vote4.php?vote=5" class="LinkButton5">VOTER</a>
  </div>

  <h1>QUEL SERA LE CHAMPION D'ITALIE 2015 ?</h1>

  <ul class="reponses">
  
  <li>
    <div class="team">
       <div class="info">
         <img src="img/roma.png" alt=""/>
         <h2>AS Roma</h2>
         <h3>Classement: 2E</h3> 
      </div>
      <div class="info_reveal">
        <h4>14 Victoires </br>11 Nuls </br>3 Défaites<br/>Buts marqués: 39 </br>Buts encaissés: 21</h4>
      </div>
    </div>
  </li>

   <li>
    <div class="team">
       <div class="info">
         <img src="img/naples.png" alt=""/>
         <h2>Naples</h2>
         <h3>Classement: 5E</h3> 
      </div>
      <div class="info_reveal">
        <h4>13 Victoires </br>8 Nuls </br>7 Défaites<br/>Buts marqués: 47 </br>Buts encaissés: 36</h4>
        
      </div>
    </div>
  </li>
  
   
    <li>
    <div class="team">
       <div class="info">
         <img src="img/genes.png" alt=""/>
         <h2>Sampdoria Gênes</h2>
         <h3>Classement: 4E</h3> 
      </div>
      <div class="info_reveal">
       <h4>12 Victoires </br>12 Nuls </br>4 Défaites<br/>Buts marqués: 37 </br>Buts encaissés: 28</h4>
      </div>
    </div>
  </li>
  

  <li>
    <div class="team">
       <div class="info">
         <img src="img/lazio.png" alt=""/>
         <h2>Lazio Rome</h2>
         <h3>Classement: 3E</h3> 
      </div>
      <div class="info_reveal">
       <h4>16 Victoires </br>4 Nuls </br>8 Défaites<br/>Buts marqués: 51 </br>Buts encaissés: 27</h4>
      </div>
    </div>
  </li>
  
    
    <li>
    <div class="team">
       <div class="info">
         <img src="img/juve.png" alt=""/>
         <h2>Juventus Turin</h2>
         <h3>Classement: 1ER</h3> 
      </div>
      <div class="info_reveal">
        <h4>20 Victoires </br>7 Nuls </br>1 Défaite<br/>Buts marqués: 55 </br>Buts encaissés: 14</h4>
      </div>
    </div>
  </li>

  <style type="text/css">
body{
background-color: #000000;
  font-family: "Gotham";
  padding: 50px 100px;
  max-width: 65em;
  background-image:url(img/seriea.jpg);
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
  color: #CBCBCB;
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
 padding: 0px 7px 7px;
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
  font-family: 'Open Sans Condensed', sans-serif;
}

/*Bouton VOTER 1*/

a.LinkButton {
  position: absolute;
  margin-top: 340px;
  margin-left: 117px;
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
  margin-left: 303px;
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
  margin-left: 490px;
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
  margin-left: 678px;
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

/*Bouton VOTER */

a.LinkButton5 {
  position: absolute;
  margin-top: 340px;
  margin-left: 865px;
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
    </style>
</body>
</html>