<?php

require_once 'functions/enqueues.php';
require_once 'functions/utilites.php';
require_once 'functions/security.php';

$arr = array(
	'a'	=> 'b',
	'c'	=> array(
		'd'	=> 'e',
		'f'	=> 'g',
		'h'	=> array(
			'i'	=> 'test'
		)
	)
);
debug(find_in_array('test', $arr));