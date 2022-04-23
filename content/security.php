<?php 
	$security_settings = get_option('sp_security_settings') ?: [];
?>

<article class="security-options">
	<h2>Security functions</h2>
	<ul class="security-functions-list">
		<li class="security-function">
			<label for="force_subscriber_role_on_registration" class="switch-wrapper">
				<div class="switch">
					<input
						type="checkbox"
						id="force_subscriber_role_on_registration"
						name="force_subscriber_role_on_registration"
						<?php $checked = in_array( 'force_subscriber_role_on_registration', $security_settings ) ? 'checked' : ''; echo $checked; ?>
					>
					<span class="slider round"></span>
				</div>
				<span class="switch-label">
					Force Subscriber Role on Registration
				</span>
			</label>
			<p><em>Force all new users to register as the 'subscriber' role.</em></p>
			<p>To create a new admin account, an existing administrator must manually 
				change new user's role. This will prevent poorly secured plugins and 
				third-party libraries from opening your site's administrative capabilities 
				to programmatically created users.
			</p>
		</li>
		<li class="security-function">
			<label for="registration_password_strength" class="switch-wrapper">
				<div class="switch">
					<input
						type="checkbox"
						id="registration_password_strength"
						name="registration_password_strength"
						<?php $checked = in_array( 'registration_password_strength', $security_settings ) ? 'checked' : ''; echo $checked; ?>
					>
					<span class="slider round"></span>
				</div>
				<span class="switch-label">
					Enforce Password Strength on Registration
				</span>
			</label>
			<p><em>Require all new users to register with a sufficiently strong password.</em></p>
			<p>Passwords must be at least eight characters and haveat least one lowercase, uppercase, 
				number, and special character.
			</p>
		</li>
		<li class="security-function">
			<label for="disable_comments" class="switch-wrapper">
				<div class="switch">
					<input
						type="checkbox"
						id="disable_comments"
						name="disable_comments"
						<?php $checked = in_array( 'disable_comments', $security_settings ) ? 'checked' : ''; echo $checked; ?>
					>
					<span class="slider round"></span>
				</div>
				<span class="switch-label">
					Disable Comments
				</span>
			</label>
			<p><em>Remove all comment functionality</em></p>
		</li>
		<li class="security-function">
			<label for="substitute_login" class="switch-wrapper">
				<div class="switch">
					<input
						type="checkbox"
						id="substitute_login"
						name="substitute_login"
						<?php $checked = in_array( 'substitute_login', $security_settings ) ? 'checked' : ''; echo $checked; ?>
					>
					<span class="slider round"></span>
				</div>
				<span class="switch-label">
					Substitute Login
				</span>
			</label>
			<p><em>Block site login from the wp-login and wp-admin pages and add a unique login page</em></p>
			<p>This is not a foolproof security measure to protect your login process, but it will at least obscure your login process and greatly reduce the number of 
				bots and scrapers trying to break into your site. By default, if your permalinks are set to post name, the substitute login page can be found at 
				yoursite.com/login-sub. Or, use the input below to set the slug for your login page.
			</p>
		</li>
	</ul>
	<button id="save-security-settings" class="btn btn-secondary" data-nonce="<?php echo wp_create_nonce("save-security-settings-nonce"); ?>">Save Security Settings</button>
	<p id="save-security-settings-ajax-response"></p>
</article>