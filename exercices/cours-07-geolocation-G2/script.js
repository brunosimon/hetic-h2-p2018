var button      = document.getElementById('button'),
	map_element = document.getElementById('map'),
	options     =
	{
		center :
		{
			lat : -34,
			lng : 150
		},
		zoom : 10
	},
	map = new google.maps.Map(map_element,options);

console.log(map_element);

button.onclick = function()
{
	navigator.geolocation.getCurrentPosition(function(position){

		var marker_position = new google.maps.LatLng(position.coords.latitude,position.coords.longitude),
			marker          = new google.maps.Marker({
				position : marker_position,
				map      : map
			});

		map.setCenter(marker_position);
	},
	function(error){
		console.log(error);
	});

	return false;
};
