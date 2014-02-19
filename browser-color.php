<?php
/*
	The instructions indicated to use a switch,
	however mapping the information to an array
	seemed like a more efficient solution with
	less code duplication.
	
	$color;
	switch ($browser) {
		case "chrome":
			$color = "#0C0"
			break;
		case "safari":
			$color = "#AAA"
			break;
		... 
	}
	
	This script does not work for IE11 since
	they changed the user agent string
*/
$ua = $_SERVER['HTTP_USER_AGENT'];
$device = preg_match('/mobi/i', $ua) ? 'mobile' : 'desktop';

$colors = array(
	'chrome' => array('desktop' => '#0C0', 'mobile' => '#0F0'),
	'opera' => array('desktop' => '#D00', 'mobile' => '#F00'),
	'safari' => array('desktop' => '#AAA', 'mobile' => '#DDD'),
	'firefox' => array('desktop' => '#D50', 'mobile' => '#F90'),
	'msie' => array('desktop' => '#00B', 'mobile' => '#00F'), 
	'gecko' => array('desktop' => '#00B', 'mobile' => '#00F') //Weak fallback for IE11 since MSIE is not part of the user agent
																// This relies on the "like Gecko" that is included in the agent
																// since the other browsers here that also include "like Gecko"
																// are detected first this should work in most cases. However, 
																// any browser that does not get detected by the first 5 tests
																// and is not IE11 and has "like Gecko" will be seen as IE11.
																// UserAgent sniffing is generally not perfect.
);

foreach ($colors as $browser => $color) {
	if (preg_match('/'.$browser.'/i',$ua)) {
		echo json_encode(array('color' => $color[$device]));		
		exit;
	}
}

echo json_encode(array('color' => '#FFF'));

?>