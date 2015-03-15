// Login display and reset switch
function loginDisplay(obj) {
	$('#alert-message').html('');
	if(obj=='login') {
		$('#normalLogin').show("fast");
		$('#resetLogin').hide("fast");
	}
	else if(obj=='reset') {
		$('#normalLogin').hide("fast");
		$('#resetLogin').show("fast");
	}
}

// Login form
function login(form) {
	$('#login-form').html('Connexion &nbsp<i class="fa fa-refresh fa-spin">');
    $.ajax({
        type: "POST",
        url: "inc/functions.php?login", 
        data: {
        	user: form.user.value,
        	password: form.password.value
        },
        success: function (response) {
        	$('#login-form').html('Connexion');
        	$("#login-form").blur();
        	if (response=='true') {
        		document.location.href="membres";
        	}
        	else { 
        		$('#alert-message').html('<div class="alert alert-small alert-danger">'+response+'</div>');
        	}

        }
    });
    return false;  
}

// Register form
function register(form) {
	$('#register-form').html('Inscription &nbsp<i class="fa fa-refresh fa-spin">');
    console.log(form);
    $.ajax({
        type: "POST",
        url: "inc/functions.php?register", 
        data: {
        	username: form.username.value,
        	mail: form.mail.value,
        	password: form.password.value,
        	passwordConfirm: form.passwordConfirm.value
        },
        success: function (response) {
        	$('#register-form').html("S'inscrire");
        	$("#register-form").blur();
        	if (response=='true') {
        		document.location.href="membres";
        	}
        	else { 
        		$('#alert-message').html('<div class="alert alert-small alert-danger">'+response+'</div>');
        	}

        }
    });
    return false;  
}


// Reset password
function resetPassword(form) {
    $('#reset-form').html('Réinitialiser le mot de passe &nbsp<i class="fa fa-refresh fa-spin">');
    $.ajax({
        type: "POST",
        url: "inc/functions.php?resetPassword", 
        data: {
        	mail: form.mail.value,
        },
        success: function (response) {
            $('#reset-form').html("Réinitialiser le mot de passe");
            $("#reset-form").blur();
            if(response=='true') {
                $('#alert-message').html('<div class="alert alert-small alert-success">Nous vous avons envoyé un email. Cliquez sur le lien dans l\'email pour réinitialiser votre mot de passe. N\'oubliez pas de vérifier vos spams.</div>');
                $(form).remove();
                $('#inscription').remove();
            }
            else {
        	   $('#alert-message').html('<div class="alert alert-small alert-danger">'+response+'</div>');
            }
        }
    });
    return false;
}

// Set new password
function setNewPassword(form) {
  	$('#reset-form').html('Réinitialiser &nbsp<i class="fa fa-refresh fa-spin">');
	$.ajax({
        type: "POST",
        url: "inc/functions.php?setNewPassword", 
        data: {
        	newPassword: form.password.value,
            newPasswordConfirm: form.passwordConfirm.value,
            mail: form.mail.value,
            token: form.token.value
        },
        success: function (response) {
            $('#reset-form').html("Réinitialiser");
            $("#reset-form").blur();
        	if(response=='true') {
                $('#alert-message').html('<div class="alert alert-small alert-success">Votre nouveau mot de passse a été enregisté. <a href="connexion">Aller à la page de connexion</a></div>');
                $(form).remove();
            }
            else {
               $('#alert-message').html('<div class="alert alert-small alert-danger">'+response+'</div>');
            } 	
        }
	});
  	
  	return false;	
}