<?php
	$common_mime_types = [
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif' => 'image/gif',
		'png' => 'image/png',
		'bmp' => 'image/bmp',
		'tiff|tif' => 'image/tiff',
		'webp' => 'image/webp',
		'ico' => 'image/x-icon',
		'heic' => 'image/heic',
		'asf|asx' => 'video/x-ms-asf',
		'wmv' => 'video/x-ms-wmv',
		'wmx' => 'video/x-ms-wmx',
		'wm' => 'video/x-ms-wm',
		'avi' => 'video/avi',
		'divx' => 'video/divx',
		'flv' => 'video/x-flv',
		'mov|qt' => 'video/quicktime',
		'mpeg|mpg|mpe' => 'video/mpeg',
		'mp4|m4v' => 'video/mp4',
		'ogv' => 'video/ogg',
		'webm' => 'video/webm',
		'mkv' => 'video/x-matroska',
		'3gp|3gpp' => 'video/3gpp',
		'3g2|3gp2' => 'video/3gpp2',
		'txt|asc|c|cc|h|srt' => 'text/plain',
		'csv' => 'text/csv',
		'tsv' => 'text/tab-separated-values',
		'ics' => 'text/calendar',
		'rtx' => 'text/richtext',
		'css' => 'text/css',
		'htm|html' => 'text/html',
		'vtt' => 'text/vtt',
		'dfxp' => 'application/ttaf+xml',
		'mp3|m4a|m4b' => 'audio/mpeg',
		'aac' => 'audio/aac',
		'ra|ram' => 'audio/x-realaudio',
		'wav' => 'audio/wav',
		'ogg|oga' => 'audio/ogg',
		'flac' => 'audio/flac',
		'mid|midi' => 'audio/midi',
		'wma' => 'audio/x-ms-wma',
		'wax' => 'audio/x-ms-wax',
		'mka' => 'audio/x-matroska',
		'rtf' => 'application/rtf',
		'js' => 'application/javascript',
		'pdf' => 'application/pdf',
		'class' => 'application/java',
		'tar' => 'application/x-tar',
		'zip' => 'application/zip',
		'gz|gzip' => 'application/x-gzip',
		'rar' => 'application/rar',
		'7z' => 'application/x-7z-compressed',
		'psd' => 'application/octet-stream',
		'xcf' => 'application/octet-stream',
		'doc' => 'application/msword',
		'pot|pps|ppt' => 'application/vnd.ms-powerpoint',
		'wri' => 'application/vnd.ms-write',
		'xla|xls|xlt|xlw' => 'application/vnd.ms-excel',
		'mdb' => 'application/vnd.ms-access',
		'mpp' => 'application/vnd.ms-project',
		'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'docm' => 'application/vnd.ms-word.document.macroEnabled.12',
		'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
		'dotm' => 'application/vnd.ms-word.template.macroEnabled.12',
		'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'xlsm' => 'application/vnd.ms-excel.sheet.macroEnabled.12',
		'xlsb' => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
		'xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
		'xltm' => 'application/vnd.ms-excel.template.macroEnabled.12',
		'xlam' => 'application/vnd.ms-excel.addin.macroEnabled.12',
		'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
		'pptm' => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
		'ppsx' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
		'ppsm' => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
		'potx' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
		'potm' => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
		'ppam' => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
		'sldx' => 'application/vnd.openxmlformats-officedocument.presentationml.slide',
		'sldm' => 'application/vnd.ms-powerpoint.slide.macroEnabled.12',
		'onetoc|onetoc2|onetmp|onepkg' => 'application/onenote',
		'oxps' => 'application/oxps',
		'xps' => 'application/vnd.ms-xpsdocument',
		'odt' => 'application/vnd.oasis.opendocument.text',
		'odp' => 'application/vnd.oasis.opendocument.presentation',
		'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
		'odg' => 'application/vnd.oasis.opendocument.graphics',
		'odc' => 'application/vnd.oasis.opendocument.chart',
		'odb' => 'application/vnd.oasis.opendocument.database',
		'odf' => 'application/vnd.oasis.opendocument.formula',
		'wp|wpd' => 'application/wordperfect',
		'key' => 'application/vnd.apple.keynote',
		'numbers' => 'application/vnd.apple.numbers',
		'pages' => 'application/vnd.apple.pages'
	];
	$local_nonce = wp_create_nonce("save-mime-type-settings-nonce");

	$allowed_mime_types = get_option('sp_allowed_mime_types');
	if ( !$allowed_mime_types ) {
		update_option('sp_allowed_mime_types', $common_mime_types);
		$allowed_mime_types = $common_mime_types;
	};

	ksort($common_mime_types);
	ksort($allowed_mime_types);

	php_to_js($common_mime_types, 'common_mime_types');
	php_to_js($allowed_mime_types, 'allowed_mime_types');
?>
<article class="mime-type-options">
	<h2>Mime Types</h2>
	<p class="mime-type-description">
		A MIME type is a label used to identify a type of data. It is used so software can know how to handle the data. 
		It serves the same purpose on the Internet that file extensions do on Microsoft Windows. In WordPress, "allowed 
		mime types" refer to the file types that can be uploaded via the Media Library.
	</p>
	<div class="set-mime-types-wrapper">
		<form class="mime-type-input">
			<h3>Add MIME type</h3>
			<label>
				Select from common MIME types:
				<input type="text" id="common-mime" name="common-mime" list="common-mimes-list" />
				<datalist id="common-mimes-list">
				<?php
					foreach ( $common_mime_types as $mime_name => $mime_desc ) {
						echo '<option data-desc="'.$mime_desc.'" value="'.$mime_name.'"></option>';
					};
				?>
				</datalist>
			</label>
			<button class="btn btn-secondary" id="add-common-mime-type-button">Add common MIME type</button>
			<a href="javascript:void(0);" id="show-custom-mime-input"><em>or white list a custom MIME type</em></a>
			<div id="custom-mime-wrapper">
				<p>
					You can allow upload of any file type but do be aware that many extensions, such as .exe and .zip, can present serious security threats.
					If you cannot find a filetype in the common MIME types above, you may add a custom MIME type below. For reference, see this list of  
					<a href="https://www.freeformatter.com/mime-types-list.html" target="_blank">officially recognized MIME types</a>.
				</p>
				<label>
					MIME name:
					<br>
					<input type="text" id="custom-mime-name" name="custom-mime-name" placeholder="Ex. 'png'" />
				</label>
				<label>
					MIME description:
					<br>
					<input type="text" id="custom-mime-desc" name="custom-mime-desc" placeholder="Ex. 'image/png'" />
				</label>
				<button class="btn btn-secondary" id="add-custom-mime-type-button">Add custom MIME type</button>
			</div>
		</form>
		<div class="view-and-remove-mime-types">
			<h3>Remove MIME type</h3>
			<select id="current-allowed-mime-types" size="10" multiple>
				<?php
					foreach ( $allowed_mime_types as $mime_name => $$mime_desc ) {
						echo '<option data-desc="'.$mime_desc.'">'.$mime_name.'</option>';
					};
				?>
			</select>
			<button class="btn btn-secondary" id="remove-mime-type-button">Remove MIME type</button>
		</div>
	</div>
	<div class="mime-type-button-wrapper">
		<button class="btn btn-secondary" id="save-mime-type-settings" data-nonce="<?= $local_nonce ?>">Save allowed mime types</button>
		<button class="btn btn-secondary" id="reset-mime-type-settings" data-nonce="<?= $local_nonce ?>">Reset default allowed mime types</button>
		<p id="save-mime-type-settings-ajax-response"></p>
	</div>
</article>