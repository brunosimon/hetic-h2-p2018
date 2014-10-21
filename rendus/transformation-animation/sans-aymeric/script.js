
function playpause(){
	var lui=document.getElementById('sonRobin');
if(lui.paused==true){
lui.play()
}
else{
lui.pause()
lui.currentTime=0
}
} 