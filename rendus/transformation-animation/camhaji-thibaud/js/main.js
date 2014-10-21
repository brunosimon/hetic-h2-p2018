var windDirection = "Left";
var dayOrNight = "day";
var nightFilter = document.getElementById("night");


function windChange(){
	if (windDirection == "Left"){windDirection = "Right";}
	else {windDirection = "Left";}

	for (var i =1; i <= 4; i++) {
		var cloud = document.getElementsByClassName("cloud"+i);
		cloud[0].style.webkitAnimationName = "wind" + windDirection;
	}
}

function dayChange(){
	var nightFilter = document.getElementById("night");
	var sunOrMoon = document.getElementsByClassName("sunOrMoon");

	if (dayOrNight == "day"){
		dayOrNight = "night";
		sunOrMoon[0].style.webkitAnimationName = "sunsetrise, moonmove";
		nightFilter.style.webkitAnimationName ="filterOn";
		nightFilter.style.webkitAnimationFillMode="forwards";
		nightFilter.style.webkitAnimationDuration = "6s";
	}
	else{
		dayOrNight = "day";
		sunOrMoon[0].style.webkitAnimationName = "moonsetrise, sunmove";
		nightFilter.style.webkitAnimationName ="filterOff";
		nightFilter.style.webkitAnimationFillMode="forwards";
		nightFilter.style.webkitAnimationDuration = "6s";
	}
}