<?php 
$code = $_GET['code'];
$url = 'http://chukui.com/oauth/token';
$data = [
    'grant_type' => 'authorization_code',
    'client_id' => '5',
    'client_secret' => '8H1o9cpSRPw1rcWLGQcnkg7NEjnxBHGIPTtZ0Pnk',
    'redirect_uri' => 'http://mark.learn-php.com/lear-php/learn-auth/callback.php',
    'code' => $code,
];

$info = curl($url, $data);
echo "<pre>";
var_dump($info);

function curl($url,$posts=""){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, $posts ? 0 :1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $posts);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    $icerik = curl_exec($ch);
    $info = curl_getinfo($ch);
    return $icerik;
    curl_close($ch);
}