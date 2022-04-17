jQuery(function($) {

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
					$(`#${panel}`).show().css('position', 'unset');
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

	// Save admin settings
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
});