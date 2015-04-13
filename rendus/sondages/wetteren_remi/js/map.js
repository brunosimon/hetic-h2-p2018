/* GEOLOCALISATION */
var map;

function initialize() {
  var mapOptions = {
    zoom: 12
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
        try{
            document.forms["sondage"].elements["LAT"].value = position.coords.latitude;
            document.forms["sondage"].elements["LONG"].value = position.coords.longitude;
        }catch(e){}

        var image = 'http://magnhetic.fr/Psycho/images/smiley50.png';
      var marker = new google.maps.Marker({
        position: pos,
        map: map,
        icon: image
    });

      map.setCenter(pos);
        try{
            for(var i = 0; i<world.length;i++){
                newMarker(world[i].ID, world[i].FOU, world[i].LAT, world[i].LON);
                console.log("new man ID:"+world[i].ID +" Psycho? " + world[i].FOU + " Latitufde :" + world[i].LAT + " Longitude :" + world[i].LON);
            }
        }catch(e){}
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);

 function newMarker(id, type, lat, long){
    latlng = new google.maps.LatLng(lat, long);
     if(type == 1) var perso = "http://magnhetic.fr/Psycho/images/skull39.png";
     else var perso = "http://magnhetic.fr/Psycho/images/smiley50.png";
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title:id,
        icon: perso
    });
     google.maps.event.addListener(marker, 'click', function() {whoIs(id);});
 }