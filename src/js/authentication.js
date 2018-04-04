// Handles the animation for the login/register form
$(function() {
	// Removes the register form and transitions to login
    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
		 $("#register-form").fadeOut(100);
		// Remove, setting up the transition to login
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		// Make it so that the default action will not be triggered
		e.preventDefault();
	});
	// Removes the login form and transitions to register
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
		 $("#login-form").fadeOut(100);
		 // Remove, setting up the transition to register
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		// Make it so that the default action will not be triggered
		e.preventDefault();
	});

});