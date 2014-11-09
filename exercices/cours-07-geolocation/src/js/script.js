// Google map
var button      = document.getElementById('button'),
    map_element = document.getElementById('map'),
    options     = {
        center :
        {
            lat: -34,
            lng: 150
        },
        zoom: 8
    },
    map = new google.maps.Map(map_element,options);

// Button click
button.onclick = function()
{
    // Test si la geolocations est supportée
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(
            // It worked
            function(position)
            {
                // Create and add marker
                var marker_position = new google.maps.LatLng(position.coords.latitude,position.coords.longitude),
                    marker = new google.maps.Marker({
                        position : marker_position,
                        map      : map,
                        title    : 'Hello World!'
                    });

                // Change map center
                map.setCenter(marker_position);
            },

            // It didn't worked
            function(error)
            {
                console.log(error.message);
            }
        );
    }
    else
    {
        alert('Geolocation is not supported');
    }
};