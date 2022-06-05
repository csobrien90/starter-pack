<?php

	$enqueue_settings = get_option('sp_enqueue_settings') ?: [];
	$scripts = [
		'jquery',
		'bootstrap',
		'axios',
		'chart.js',
		'lodash',
		'moment.js',
		'datatables'
	];
?>

<article class="enqueue-options">
	<h2>Enqueues</h2>
	<?php
		foreach( $scripts as $option ) {
			$checked = in_array( $option, $enqueue_settings ) ? 'checked' : '';
			?>
			<label for="<?= $option ?>" class="switch-wrapper">
				<div class="switch">
					<input type="checkbox" id="<?= $option ?>" name="<?= $option ?>" <?= $checked ?>>
					<span class="slider round"></span>
				</div>
				<span class="switch-label">
					<?php echo ucwords($option); ?>
				</span>
			</label>
			<?php
		}
	?>
	<button id="save-enqueue-settings" class="btn btn-secondary" data-nonce="<?php echo wp_create_nonce("save-enqueue-settings-nonce"); ?>">Save Enqueue Settings</button>
	<p id="save-enqueue-settings-ajax-response"></p>
</article>