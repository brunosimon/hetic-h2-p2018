var input_question= $('.input_question');

console.log(input_question);

input_question.on('click', function(){
	input_question.removeAttr('placeholder');
});