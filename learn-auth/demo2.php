<?php 
/**
 * auth 2.0 第一方
 */

$url = 'http://chukui.com/oauth/token';
$data = [
        'grant_type' => 'password',
        'client_id' => '6',
        'client_secret' => 'Van0528EwgixJ3qHNMaB7kdbQ8r6GqUkZK3YEhBT',
        'username' => 'chukui0627@gmail.com',
        'password' => 'chukui',
        'scope' => '',
];
$info = curl($url, $data);
$info = json_decode($info, TRUE);
echo $info['access_token'];die;

function curl($url,$posts=""){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, $posts ? 0 :1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $posts);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    $icerik = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    return $icerik;
}