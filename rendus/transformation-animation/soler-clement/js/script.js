//RECUPREATION DE L'HEURE ET DE LA DATE POUR LE DOCK WINDOWS 10
//aider d'un tuto sur le web + mes compétences javascript
function addZero(i)
{
	if (i < 10){
		i = "0" + i;
	}
	return i;
}
getHours();
setInterval(function(){getHours()},1000);
function getHours() {
	var d = new Date();
	var intime = document.getElementById("time");
	var h = addZero(d.getHours());
	var m = addZero(d.getMinutes());
	intime.innerHTML = h + ":" + m;
}

setupdate();
setInterval(function(){setupdate()},60000);
function setupdate(){
	var getDate=new Date()
	var indate = document.getElementById('date'); 
	var gd = addZero(getDate.getDate());
	var gm = addZero(getDate.getMonth());
	var gy = addZero(getDate.getFullYear());
	indate.innerHTML = gd+"/"+gm+"/"+gy;
}
//OUVERTURE DU MENU WINDOWS + COLORATION DU FOND QUAND ACTIF
var status = 'close';
function sideMenu()
{
	if (status == 'close'){
		document.getElementById('startmenu').style.display = "block";
		document.getElementById('keywin').style.backgroundColor = "#0259B3";
		status = 'open';
	}
	else if (status == 'open'){
		document.getElementById('startmenu').style.display = "none";
		document.getElementById('keywin').style.backgroundColor = "";
		status = 'close';
	}
}
//OUVERTURE ACCES TOUTES LES APP
var statut = 'close';
function allapp()
{
	if (statut == 'close'){
		document.getElementById('startmenu').style.width = "27%";
		document.getElementById('tuileapp').style.display = "none";
		statut = 'open';
	}
	else if (statut == 'open'){
		document.getElementById('startmenu').style.width = "50%";
		document.getElementById('tuileapp').style.display = "block";
		statut = 'close';
	}
}
//FONCTION JQUERY PERMETTANT DE BOUGER(draggable) UN ELEMENT ET DE LE REDIMENSSIONNER(resizable)
// (les téléphones ou photoshop par exemple)
$(function() 
{
	$( ".resizable" ).resizable();
});

$(function() 
{
	$( ".draggable" ).draggable();
});
//PS=PHOTOSHOP (GESTION DE LA FENETE PS)
function pswindowclose()
{
	document.getElementById('window').style.display="none";
}
function pswindowopen()
{
	document.getElementById('window').style.display="block";
	document.getElementById('startmenu').style.display = "none";
}
//SUPPRESSION DU "DIGICODE" AU BOUT DE 3s
delinzoom();//deleteinzoom
function delinzoom() {
	setTimeout(function delinzoom(){
		document.getElementById('digicode').style.display="none";
	}, 3000);
}
//GESTION DES PLANS DURANT LE ZOOM
inzoom();
function inzoom() {
	setTimeout(function inzoom(){
		document.getElementById('firstplan').style.display="none";
		document.getElementById('secondplan').style.display="block";
	}, 4000);
}
//GESTION DES MESSAGES POPUP
function nextmessage()//suivant
{
	document.getElementById('firstmessage').style.display="none";
	document.getElementById('secondmessage').style.display="block";
}
function deletepop()//suppression
{
	document.getElementById('secondmessage').style.display="none";
	document.getElementById('thirdmessage').style.display="none";
}
//DRAG AND DROP (PRIS SUR LE WEB ET NE MARCHE PAS COMME JE VOULAIS JE N'AI PAS REUSSI A ME SERVIR DE LA FONCTION draggable)
function allowDrop(ev)
{
	ev.preventDefault();
}
function drag(ev)
{
	ev.dataTransfer.setData("Text",ev.target.id);
}
function drop(ev)
{
	ev.preventDefault();
	var data=ev.dataTransfer.getData("Text");
	ev.target.appendChild(document.getElementById("connex"));
	document.getElementById('secondplan').style.display="none";
	document.getElementById('screen').style.display="block";
	document.getElementById('thirdmessage').style.display="block";
}
//GESTION SLIDE EN CSS MAIS ACTIVE PAR JAVASCRIPT __ANDROID
function nextslide(){
	document.getElementById('home').style.display="none";
	document.getElementById('home2').style.display="block";
}
function previousslide(){
	document.getElementById('home').style.display="block";
	document.getElementById('home2').style.display="none";
}
//GESTION SLIDE EN CSS MAIS ACTIVE PAR JAVASCRIPT __IPHONE
function nextslideip(){
	document.getElementById('iphonehome').style.display="none";
	document.getElementById('iphonehome2').style.display="block";
}
function previousslideip(){
	document.getElementById('iphonehome').style.display="block";
	document.getElementById('iphonehome2').style.display="none";
}
//GESTION AFFICHAGE TEL
function showandroid(){
	document.getElementById('android').style.display="block";
}
function showiphone(){
	document.getElementById('iphone').style.display="block";
}
//GESTION NOTIF CONNEXION TEL
function shownotif(){
	document.getElementById('windowsnotif').style.display="block";
	document.getElementById('switch').style.display="block";
	document.getElementById('sswitch').style.display="none";
	document.getElementById('intrigue').innerHTML="Yes ! Il y a même deux cables connectés. Voyons voir..."
}
//GESTION SUPPRESSION TEL
function deliphone(){
	document.getElementById('iphone').style.display="none";
}
function delandroid(){
	document.getElementById('android').style.display="none";
}