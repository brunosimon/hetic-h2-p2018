navigator.geolocation.watchPosition(
    function(position)
    {
        console.log(position.coords);
    },
    function(error)
    {
        console.log(error.message);
    }
);