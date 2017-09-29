<?php
/**
 * 获取最终链接
 */

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, 'http://www.baidu.com');
$html = curl_exec($ch);
$info = curl_getinfo($ch);
print_r($info);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
$html = curl_exec($ch);
$info = curl_getinfo($ch);
print_r($info);
curl_close($ch);