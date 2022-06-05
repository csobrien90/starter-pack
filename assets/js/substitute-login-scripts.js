jQuery(document).ready(function($) {
	
	/*
	_____________________
	Substitute Login Page
	‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
	*/

	// Perform AJAX login on form submit
	$('#login-button').on('click', function(e){
		e.preventDefault();
		$('#login-loading-message-wrapper').show();
		var formData = {
			'action': 'sp_substitute_login',
			'nonce': $(`#login-button`).attr('data-nonce'),
			'username': $('#username').val(),
			'password': $('#password').val()
		};
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: jsVars.ajaxUrl,
			data: formData,
			success: function(data) {
				$('#login-loading-message-wrapper').hide();
				$('form#login p.status').text(data.message);
				if (data.loggedin == true){
					document.location.href = jsVars.redirectUrl;
				}
			},
			error: function(data) {
				$('#login-loading-message-wrapper').hide();
				console.log(data);
			}
		});
	});

});
