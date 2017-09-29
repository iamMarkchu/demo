<?php
/**
 * auth 2.0 第三方
 */
$query = http_build_query([
        'client_id' => '5',
        'redirect_uri' => 'http://mark.learn-php.com/lear-php/learn-auth/callback.php',
        'response_type' => 'code',
        'scope' => '',
    ]);
header('Location: http://chukui.com/oauth/authorize?'.$query, TRUE, 302);