<?php
/**
 * 百度ai 图片识别接口
 */

$ak = 'e0Rbh4tWHoRwsa7XVW0efeYK';
$sk = 'v2ISWfHja1d6RYLeKxjfGiqcgpRKvaGa';
$token = access_token($ak, $sk);
$url = 'https://aip.baidubce.com/rest/2.0/ocr/v1/accurate_basic?access_token=' . $token;
$img = file_get_contents('./test.png');
$img = base64_encode($img);
$bodys = array(
    "image" => $img
);
$res = curl($url, $bodys);
$res = json_decode($res, true);
foreach ($res['words_result'] as $key => $value) {
    echo iconv('UTF-8', 'GBK', $value['words']). PHP_EOL;
}
/**
 * 获取API访问授权码
 * @param ak: ak from baidu cloud app
 * @param sk: sk from baidu cloud app
 * @return - access_token string if succeeds, else false.
 */
function access_token($ak, $sk) {
    $url = 'https://aip.baidubce.com/oauth/2.0/token';

    $post_data = array();
    $post_data['grant_type']  = 'client_credentials';
    $post_data['client_id']   = $ak;
    $post_data['client_secret'] = $sk;

    $res = curl($url, $post_data);
    if (!!$res) {
        $res = json_decode($res, true);
        return $res['access_token'];
    } else {
        return false;
    }
}

function curl($url,$posts=""){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, $posts ? 0 :1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $posts);
    $icerik = curl_exec($ch);
    return $icerik;
    curl_close($ch);
}
