function addQuestionInput(){
	document.querySelector('.answers').innerHTML = document.querySelector('.answers').innerHTML+'<label><input type="text" name="answers[]" placeholder="Entrez une réponse..."></label>';
}

document.querySelector('.more-button').onclick = function(){
	addQuestionInput();
}