<?php

$url = "https://www.instagram.com/";
//$url = "'http://www.google.com/'";
$cookie = "/home/albertord/cookies.txt";
$ch = curl_init($url);
//curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLINFO_COOKIELIST, true);
curl_setopt($ch, CURLOPT_HEADERFUNCTION, "curlResponseHeaderCallback");
$result = curl_exec($ch);
var_dump($cookies);

var_dump(getallheaders());

function curlResponseHeaderCallback($ch, $headerLine) {
    global $cookies;
    if (preg_match('/^Set-Cookie:\s*([^;]*)/mi', $headerLine, $cookie) == 1)
        $cookies[] = $cookie;
    return strlen($headerLine); // Needed by curl
}