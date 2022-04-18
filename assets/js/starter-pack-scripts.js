jQuery(function($) {

	/*
	_________________
	DOM Manipulation
	‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
	*/

	// Show/hide admin panels
	var spSettingsPanels = [
		'utilities',
		'security',
		'enqueues',
		'mime-types',
		'code-snippets'
	];
	
	spSettingsPanels.forEach(section => {
		$(`#${section}-link`).on('click', function() {
			spSettingsPanels.forEach(panel => {
				if ( panel === section ) {
					$(`#${panel}`).show().css('position', 'relative');
					$(`#${panel}-link`).addClass('nav-tab-active');
				} else {
					$(`#${panel}`).hide().css('position', 'absolute');
					$(`#${panel}-link`).removeClass('nav-tab-active');
				}
			});
		});
	});

	// Show/hide custom MIME input
	$('#show-custom-mime-input').on('click', function() {
		if ( $('#custom-mime-wrapper').css('max-height') === '0px' ) {
			$('#custom-mime-wrapper').css('max-height', '500px');
		} else {
			$('#custom-mime-wrapper').css('max-height', '0px');
		}
	});


	/*
	_____________________________________
	Handle Enqueue and Security Settings
	‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
	*/

	// Save enqueue and security settings
	var settings = [
		'enqueue',
		'security'
	];
	settings.forEach(setting => {
		$(`#save-${setting}-settings`).on('click', function(e) {
			e.preventDefault();

			// Get settings
			var inputArray = [];
			document.querySelectorAll(`.${setting}-options input`).forEach(input => {
				if (input.checked) inputArray.push(input.id);
			});

			// Make ajax call to save settings
			var formData = {
				'action': `save_${setting}_settings`,
				'nonce': $(`#save-${setting}-settings`).attr('data-nonce'),
				'settings': inputArray
			};
			$.ajax({
				method : "post",
				datatype : "json",
				url : jsVars.ajaxUrl,
				data : formData,
				success: function(response) {
					if ( response.message ) {
						$(`#save-${setting}-settings-ajax-response`).text(response.message).show()	;
						setTimeout(() => {
							$(`#save-${setting}-settings-ajax-response`).fadeOut(800);
						}, 2000);
					} else {
						console.log(response);
					};
				}
			});

		});
	});


	/*
	__________________________________
	Handle Allowed Mime Type Settings
	‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
	*/

	// Add common mime type
	$('#add-common-mime-type-button').on('click', function(e) {
		e.preventDefault();
		var mime_name = $('#common-mime').val();
		allowed_mime_types[mime_name] = $(`#common-mimes-list [value="${mime_name}"`).data('desc');
		update_dom_mime_types();
		const new_option = document.querySelector(`#current-allowed-mime-types [data-desc="${allowed_mime_types[mime_name]}"`);
		new_option.scrollIntoView();
		new_option.selected = true;
	});

	// Add custom mime type (confirm first)
	$('#add-custom-mime-type-button').on('click', function(e) {
		e.preventDefault();
		var mime_name = $('#custom-mime-name').val();
		allowed_mime_types[mime_name] = $('#custom-mime-desc').val();
		update_dom_mime_types();
		const new_option = document.querySelector(`#current-allowed-mime-types [data-desc="${allowed_mime_types[mime_name]}"`);
		new_option.scrollIntoView();
		new_option.selected = true;
	});

	// Remove currently allowed mime type (single or multiple)
	$('#remove-mime-type-button').on('click', function(e) {
		e.preventDefault();
		delete allowed_mime_types[$('#current-allowed-mime-types').val()];
		update_dom_mime_types();
	});

	function update_dom_mime_types() {
		var current_mimes_html = '';
		for (var mime_description in allowed_mime_types) {
			current_mimes_html += `<option data-desc="${allowed_mime_types[mime_description]}">${mime_description}</option>`;
		}
		document.querySelector('#current-allowed-mime-types').innerHTML = current_mimes_html;
	}

	// Save new allowed mime types
	$(`#save-mime-type-settings`).on('click', function(e) {
		e.preventDefault();
		save_mime_type_settings( allowed_mime_types );
	});

	// Reset allowed mime types to default configuration

	$(`#reset-mime-type-settings`).on('click', function(e) {
		e.preventDefault();
		save_mime_type_settings( common_mime_types );
	});

	// Make ajax call to save settings
	function save_mime_type_settings( settings_array ) {
		var formData = {
			'action': `save_mime_type_settings`,
			'nonce': $(`#save-mime-type-settings`).attr('data-nonce'),
			'settings': settings_array
		};
		$.ajax({
			method : "post",
			datatype : "json",
			url : jsVars.ajaxUrl,
			data : formData,
			success: function(response) {
				if ( response.message ) {
					$(`#save-mime-type-settings-ajax-response`).text(response.message).show()	;
					setTimeout(() => {
						$(`#save-mime-type-settings-ajax-response`).fadeOut(800);
					}, 2000);
				} else {
					console.log(response);
				};
			}
		});
	}

});