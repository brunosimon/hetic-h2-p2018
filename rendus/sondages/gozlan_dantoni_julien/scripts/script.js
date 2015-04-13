// $('#letsgo').click(function(){
// 	$('#go').fadeOut();
// 	$('#content').fadeIn();
// });



var cpt = 30 ;
var x ;
 
function decompte()
{
    if(cpt>=0)
    {
        if(cpt>1)
        {
            var sec = " secondes";
        } else {
            var sec = " seconde";
        }
        document.getElementById("time").innerHTML = "Il reste " + cpt + sec ;
        cpt-- ;
        x = setTimeout("decompte()",1000) ;
    }
    else
    {
        clearTimeout(x);


       }};


 $( ".test_ajax" ).click(function( event ) {
  event.preventDefault();
  $( "<div>" )
    .append( "default " + event.type + " prevented" )
    // .appendTo( "#log" );
});

// document.querySelector('test_ajax').onclick = function(){
//     return false;
// };


// $('test_ajax').onclick = function(){
//     return false;
// };