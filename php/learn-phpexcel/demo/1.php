<?php 
// N-AFF-过期促销版块测试.xlsx
// <!-- expired coupon list start-->
require_once dirname(dirname(__File__)).'/vendor/autoload.php';
date_default_timezone_set('Asia/Shanghai');
$objPHPExcel = PHPExcel_IOFactory::load('../data/N-AFF.xlsx');
$objSheet = $objPHPExcel->getActiveSheet();
$list = $objSheet->toArray();

$domain = 'http://de.fyvor.com';
$str = '/<!-- expired coupon list start-->';
echo 'START AT :'. date('Y-m-d H:i:s'). PHP_EOL;
foreach ($list as $k => $v) {
    if($k == 0)
        continue;
    $url = $domain . $v[2];
    $data = curl($url);
    if($data)
    {
        if(strpos($data, $str) !== FALSE)
            $tmp = 'yes';
        else
            $tmp = 'no';
        $list[$k][] = $tmp;
    }
    echo $url. PHP_EOL;
}
$objSheet->fromArray($list);
$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'excel2007');
$objWriter->save('./N-AFF_2.xlsx');
echo 'END AT :'. date('Y-m-d H:i:s'). PHP_EOL;
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $icerik = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    if($info['http_code'] != 200)
        return FALSE;
    else
        return $icerik;
}