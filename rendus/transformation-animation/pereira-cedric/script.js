var etat = 0;
document.getElementById('apple').onclick = function(){
	if(etat == 0){
			document.getElementById('screen').style.display = 'block';
			document.getElementById('file').style.display = 'none'
			etat=1;
	} else{
		document.getElementById('screen').style.display = 'none';
		document.getElementById('file').style.display = 'block';
		etat=0;
	}
};