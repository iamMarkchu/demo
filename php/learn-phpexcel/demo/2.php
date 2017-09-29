<?php 
ini_set('memory_limit', '1024M');
require_once dirname(dirname(__File__)).'/vendor/autoload.php';
$api = 'http://markchu:chukui123456@ssenbackend.meikaiinfotech.com/api/get_merchant_list.php?limit=100000';

$data = file_get_contents($api);
$data = json_decode($data, true);
$objPHPExcel = new PHPExcel();
$objSheet = $objPHPExcel->getActiveSheet();
$objSheet->fromArray($data);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'excel2007');
$objWriter->save('test1.xlsx');