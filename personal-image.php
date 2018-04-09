<?php

define('LINE_API', 'https://notify-api.line.me/api/notify');
define('LINE_TOKEN', 'AnFzrvVuaT6iUiG8wz42jZMbLjjgeNlBhxqBwrgCzSl');

$message = array(
    'message' => 'ภาพสวยๆ',
    'imageThumbnail' => 'https://raw.githubusercontent.com/platoosom/line-notify-example/master/unsplash-thumbnail.jpg',
    'imageFullsize' => 'https://raw.githubusercontent.com/platoosom/line-notify-example/master/unsplash-fullsize.jpg',
);

line_notify(LINE_TOKEN, $message);

function line_notify($token, $message)
{
    $header = array( 
        'Content-type: application/x-www-form-urlencoded', 
        "Authorization: Bearer {$token}", );
        
    $data = http_build_query($message, '', '&');

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
