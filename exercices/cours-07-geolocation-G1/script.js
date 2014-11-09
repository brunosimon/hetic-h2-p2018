var button  = document.getElementById('button'),
	options = {
		center : {
			lat : -34,
			lng : 150
		},
		zoom : 16
	},
	map_element = document.getElementById('map'),
	map         = new google.maps.Map(map_element,options);

// Écoute l'événemrnt click
button.onclick = function()
{
	navigator.geolocation.getCurrentPosition(function(position)
	{
		// La géolocalisation a fonctionné
		var marker_position = new google.maps.LatLng(position.coords.latitude,position.coords.longitude),
			marker          = new google.maps.Marker({
				position : marker_position,
				map      : map
			});

		map.setCenter(marker_position);

	},function(error)
	{
		// La géolocasation n'a pas fonctionné
		console.log(error.message);
	});

	return false;
};
