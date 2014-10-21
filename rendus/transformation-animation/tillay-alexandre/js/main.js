/********************************************
				LAUNCHPAD
********************************************/
launchpadStatus = 'closed';
function launchpad() {
	if(launchpadStatus=='closed'){
		$("#launchpad").css('opacity','1');
		$("#background").css({
			'z-index':'9',
			'-webkit-filter': 'blur(2px)',
  			'-moz-filter': 'blur(2px)',
  			'-o-filter': 'blur(2px)',
  			'-ms-filter': 'blur(2px)',
  			'filter': 'blur(2px)'
		});
		$("#dock-launchpad").addClass("bounce");
		launchpadStatus='opened';
	}
	else if(launchpadStatus=='opened'){
		$("#launchpad").css('opacity','0');
		$("#background").css({
			'z-index':'0',
			'-webkit-filter': 'blur(0px)',
  			'-moz-filter': 'blur(0px)',
  			'-o-filter': 'blur(0px)',
  			'-ms-filter': 'blur(0px)',
  			'filter': 'blur(0px)'
		});
		$("#dock-launchpad").removeClass("bounce");
		launchpadStatus='closed';
	}
}

function switchButton(n) {
	if(n == 1){ //left
		switchSlide(37);
	}
	else if(n == 2){//right
		switchSlide(39);
	}
}

switchSlide = function (evenement){
	if(evenement.which == 37 || evenement==37){ //left
		$("#launchpad-slide-2").css('transform','translate(1550px)');
		$("#launchpad-slide-1").css('transform','translate(0px)');
		$("#launchpad-nav ul li:last-child").removeClass("active");
		$("#launchpad-nav ul li:first-child").addClass("active");
	}
	else if(evenement.which == 39 || evenement==39){//right
		
		$("#launchpad-slide-2").css('transform','translate(0px)');
		$("#launchpad-slide-1").css('transform','translate(-1550px)');
		$("#launchpad-nav ul li:first-child").removeClass("active");
		$("#launchpad-nav ul li:last-child").addClass("active");
	}
	
}

$(function(){
    $(document).keydown(switchSlide);
});

/********************************************
				APPLICATIONS
********************************************/
function closeOtherApps() {
	$("#help-app").fadeOut();
	$("#finder-app").fadeOut();
	$("#sublimetext-app").fadeOut();
	$("#photoshop-app").fadeOut();
}

/*** Finder ***/
finderStatus = 'closed';
function finder() {	
	closeOtherApps();
	if(finderStatus=='closed'){
		$("#dock-finder").addClass("bounce");
		$("#finder-app").removeClass("exitLeft");
		$("#finder-app").fadeIn();
		finderStatus='opened';
	}
	else if(finderStatus=='opened'){
		$("#dock-finder").removeClass("bounce");
		$("#finder-app").addClass("exitLeft");
		$("#finder-app").fadeOut();
		finderStatus='closed';
	}
}

/*** Help ***/
helpStatus = 'opened';
function help() {
	closeOtherApps();	
	if(helpStatus=='closed'){
		$("#dock-help").addClass("bounce");
		$("#help-app").removeClass("exitTop");
		$("#help-app").fadeIn();
		helpStatus='opened';
	}
	else if(helpStatus=='opened'){
		$("#dock-help").removeClass("bounce");
		$("#help-app").addClass("exitTop");
		$("#help-app").fadeOut();
		helpStatus='closed';
	}
}

/*** SUblime Text ***/
sublimetextStatus = 'closed';
function sublimetext() {	
	closeOtherApps();
	if(sublimetextStatus=='closed'){
		$("#dock-sublimetext").addClass("bounce");
		$("#sublimetext-app").removeClass("exitRight");
		$("#sublimetext-app").fadeIn();
		sublimetextStatus='opened';
	}
	else if(sublimetextStatus=='opened'){
		$("#dock-sublimetext").removeClass("bounce");
		$("#sublimetext-app").addClass("exitRight");
		$("#sublimetext-app").fadeOut();
		sublimetextStatus='closed';
	}
}

/*** Photoshop ***/
photoshopStatus = 'closed';
function photoshop() {	
	closeOtherApps();
	if(photoshopStatus=='closed'){
		$("#dock-photoshop").addClass("bounce");
		$("#photoshop-app").removeClass("exitBottom");
		$("#photoshop-app").fadeIn();
		photoshopStatus='opened';
	}
	else if(photoshopStatus=='opened'){
		$("#dock-photoshop").removeClass("bounce");
		$("#photoshop-app").addClass("exitBottom");
		$("#photoshop-app").fadeOut();
		photoshopStatus='closed';
	}
}


/********************************************
				DOCK
********************************************/
function resizeDock() { $("#dock").css('left', ($(window).width()-1200)/2+'px'); }

window.onresize = function(event) {
	resizeDock();
};


/********************************************
				TOP BAR
********************************************/

setInterval(function(){date()}, 1000);
function date() {
	var date = new Date();
	var jour = date.getDay();
	if (jour==0) {jour="Dim"}
	else if (jour==1) {jour="Lun"}
	else if (jour==2) {jour="Mar"}
	else if (jour==3) {jour="Mer"}
	else if (jour==4) {jour="Jeu"}
	else if (jour==5) {jour="Ven"}
	else if (jour==6) {jour="Sam"}
	var heure = date.getHours();
	var minutes = date.getMinutes();

	if(heure<10) {heure = "0"+heure} 
	if(minutes<10) {minutes = "0"+minutes} 

	date = jour + ". " + heure + ":" + minutes;
	document.getElementById("date").innerHTML=date;
}

/********************************************
	CALL FUNCTIONS WHEN DOCUMENT LOADED
********************************************/
$( document ).ready(function() {
    resizeDock();
    date();
});