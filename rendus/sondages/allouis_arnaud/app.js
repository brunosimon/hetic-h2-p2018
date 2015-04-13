

function poll (that, id) {

	var request = new XMLHttpRequest();
	request.open('POST', 'controller.php', true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	request.onerror = function() {
		console.log('error');
	};
	request.onload = function() {
		if (request.status >= 200 && request.status < 400) {


			if (request.responseText) {
				var span = that.querySelector('span');
				var value = parseInt(span.innerHTML);

				span.innerHTML = value + 1;
			}

		} else {


		}
	};
	request.send('action=poll&student_id=' + id);
}

// function showRank () {

// 	var request = new XMLHttpRequest();
// 	request.open('POST', 'controller.php', true);
// 	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
// 	request.onload = function() {
// 		if (request.status >= 200 && request.status < 400) {

// 			console.log(request);

// 			if (request.responseText) {
// 				console.log(request.responseText);
// 			}

// 		} else {


// 		}
// 	};
// 	request.send('action=rank');

// 	return false;
// }