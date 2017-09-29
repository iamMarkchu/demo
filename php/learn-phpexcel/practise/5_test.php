<?php
require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';
$file_name = '../data/123.xlsx';

$objPHPExcel = PHPExcel_IOFactory::load($file_name);
$objSheet = $objPHPExcel->getActiveSheet();
$list = $objSheet->toArray();

foreach ($list as $k => $v) {
    if($k == 0)
        continue;
    if(stripos($v[0], $v[5]) !== FALSE)
    {
        unset($list[$k]);
    }
}
array_values($list);
$objSheet->fromArray($list);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('./1234.xlsx');
