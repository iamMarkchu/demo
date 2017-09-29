<?php
/**
 * 指定网卡
 */
$url = 'https://www.fyvor.com/coupons/g2a/?aaabb';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
if(!empty($useragent)){
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
}
curl_setopt($ch, CURLOPT_TIMEOUT,15);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_INTERFACE, '173.192.134.87');
$output = curl_exec($ch);
$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
if ($output === FALSE ) {
        print "$url ... ERROR\n";
        curl_close($ch);
}else{
        curl_close($ch);
}
