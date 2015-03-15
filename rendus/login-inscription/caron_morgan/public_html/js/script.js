function showPassword(e){
	console.log(e);
			
	if( e.target.checked){
		document.querySelector(".login-password").type="text";
		document.querySelector(".login-password-bis").type="text";
	}
	else {
		document.querySelector(".login-password").type="password";
		document.querySelector(".login-password-bis").type="password";
	}
			
}
document.addEventListener('DOMContentLoaded', function () {
	var checkbox = document.getElementById("show-password");
	checkbox.addEventListener("change", showPassword);
});
