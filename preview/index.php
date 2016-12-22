<?php
/*
This file is free software: you can redistribute it and/or modify
the code under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version. 

However, the license header, copyright and author credits 
must not be modified in any form and always be displayed.

This class is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

@author geoPlugin (gp_support@geoplugin.com)
@copyright Copyright geoPlugin (gp_support@geoplugin.com)

This file is an example PHP file of the geoplugin class
to geolocate IP addresses using the free PHP Webservices of
http://www.geoplugin.com/

*/

require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

/* 
Notes:

The default base currency is USD (see http://www.geoplugin.com/webservices:currency ).
You can change this before the call to geoPlugin::locate with eg:
$geoplugin->currency = 'EUR';

The default IP to lookup is $_SERVER['REMOTE_ADDR']
You can lookup a specific IP address, by entering the IP in the call to geoPlugin::locate
eg
$geoplugin->locate('209.85.171.100');

*/

//locate the IP
$geoplugin->locate();

echo "Geolocation results for {$geoplugin->ip}: <br />\n".
	"City: {$geoplugin->city} <br />\n".
	"Region: {$geoplugin->region} <br />\n".
	"Area Code: {$geoplugin->areaCode} <br />\n".
	"DMA Code: {$geoplugin->dmaCode} <br />\n".
	"Country Name: {$geoplugin->countryName} <br />\n".
	"Country Code: {$geoplugin->countryCode} <br />\n".
	"Longitude: {$geoplugin->longitude} <br />\n".
	"Latitude: {$geoplugin->latitude} <br />\n".
	"Currency Code: {$geoplugin->currencyCode} <br />\n".
	"Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
	"Exchange Rate: {$geoplugin->currencyConverter} <br />\n";

/*
How to use the in-built currency converter
geoPlugin::convert accepts 3 parameters
$amount - amount to convert (required)
$float - the number of decimal places to round to (default: 2)
$symbol - whether to display the geolocated currency symbol in the output (default: true)
*/
if ( $geoplugin->currency != $geoplugin->currencyCode ) {
	//our visitor is not using the same currency as the base currency
	echo "<p>At todays rate, US$100 will cost you " . $geoplugin->convert(100) ." </p>\n";
}

/* Finding places nearby 
nearby($radius, $maxresults)
$radius (optional: default 10)
$maxresults (optional: default 5)
 */
$nearby = $geoplugin->nearby();

if ( isset($nearby[0]['geoplugin_place']) ) {

	echo "<pre><p>Some places you may wish to visit near " . $geoplugin->city . ": </p>\n";

	foreach ( $nearby as $key => $array ) {
		
		echo ($key + 1) .":<br />";
		echo "\t Place: " . $array['geoplugin_place'] . "<br />";
		echo "\t Region: " . $array['geoplugin_region'] . "<br />";
		echo "\t Latitude: " . $array['geoplugin_latitude'] . "<br />";
		echo "\t Longitude: " . $array['geoplugin_longitude'] . "<br />";
	}
	echo "</pre>\n";
}

$tablet_browser = 0;
$mobile_browser = 0;

if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
	$tablet_browser++;
}

if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
	$mobile_browser++;
}

if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
	$mobile_browser++;
}

$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
	'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
	'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
	'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
	'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
	'newt','noki','palm','pana','pant','phil','play','port','prox',
	'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
	'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
	'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
	'wapr','webc','winw','winw','xda ','xda-');

if (in_array($mobile_ua,$mobile_agents)) {
	$mobile_browser++;
}

if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
	$mobile_browser++;
	//Check for tablets on opera mini alternative headers
	$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
	if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
		$tablet_browser++;
	}
}

if ($tablet_browser > 0) {
	// do something for tablet devices
	print 'is tablet';
}
else if ($mobile_browser > 0) {
	// do something for mobile devices
	print 'is mobile';
}
else {
	// do something for everything else
	print 'is desktop';
}

?>