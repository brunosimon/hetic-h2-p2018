// Test si la geolocations est supportée
if(navigator.geolocation)
{
    navigator.geolocation.getCurrentPosition(
        function(position)
        {
            console.log(position);
        },
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