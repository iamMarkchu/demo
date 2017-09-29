<?php 
$url = 'http://nlp.xiaoi.com/ask.do?platform=custom';
$posts = [
    'userId' => '45408441',
    'question' => '您好!',
    'type' => 1
];

$data = curl($url, $posts);
print_r($data);

function curl($url,$posts=""){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_POST, $posts ? 0 :1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $posts);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Auth' => 'app_key=aLwYOjDOE6Lq, nonce=9c993c0791f153638ea5478fe8592bc58255, signature=2893565055439bf2e0a52c790ca499b0cc142a63']);
    $content = curl_exec($ch);
    $info = curl_getinfo($ch);
    print_r($info);die;
    return $content;
    curl_close($ch);
} 