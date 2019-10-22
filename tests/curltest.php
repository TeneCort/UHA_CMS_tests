<?php

function CurlRoutes($url)
{
	$ch = curl_init();

	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch, CURLOPT_HEADER, 1);

	  $response = curl_exec($ch);
	  
	  // Return headers seperatly from the Response Body
	  $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	  $headers = substr($response, 0, $header_size);
	  $body = substr($response, $header_size);
	  
	curl_close($ch);

	$headers = explode("\r\n", $headers); // The seperator used in the Response Header is CRLF (Aka. \r\n) 

	$headers = array_filter($headers);

	// Isolates the header response code
	$html = $headers[0];

	return $html;
}
?>