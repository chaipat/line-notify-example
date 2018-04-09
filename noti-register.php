<?php
define('CLIENT_ID', 'hbePqNpAr5INqzUJ4AXSte');
define('LINE_API_URI', 'https://notify-bot.line.me/oauth/authorize?');
define('CALLBACK_URI', 'http://wordpress.local/noti-callback.php');

$queryStrings = [
    'response_type' => 'code',
    'client_id' => CLIENT_ID,
    'redirect_uri' => CALLBACK_URI,
    'scope' => 'notify',
    'state' => md5(uniqid()),
];

$queryString = LINE_API_URI . http_build_query($queryStrings);

?>

<a href="<?php echo $queryString; ?>">Register</a>
