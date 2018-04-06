<?php

define('LINE_API', 'https://notify-api.line.me/api/notify');
define('LINE_TOKEN', 'AnFzrvVuaT6iUiG8wz42jZMbLjjgeNlBhxqBwrgCzSl');

line_notify(LINE_TOKEN);

function line_notify($token)
{
    $header = array( 
        'Content-type: application/x-www-form-urlencoded', 
        "Authorization: Bearer {$token}", );
        
    $query = array(
        'message' => 'ง่วงค่า',
        'stickerPackageId' => 1,
        'stickerId' => 1,
    );
    $data = http_build_query($query, '', '&');

    $cURL = curl_init(); 
    curl_setopt( $cURL, CURLOPT_URL, LINE_API); 
    curl_setopt( $cURL, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt( $cURL, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt( $cURL, CURLOPT_POST, 1); 
    curl_setopt( $cURL, CURLOPT_POSTFIELDS, $data); 
    curl_setopt( $cURL, CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($cURL, CURLOPT_HTTPHEADER, $header); 
    curl_setopt( $cURL, CURLOPT_RETURNTRANSFER, 1); 

    $result = curl_exec( $cURL ); 
    curl_close( $cURL ); 
}
