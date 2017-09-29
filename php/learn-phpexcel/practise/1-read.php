<?php
/**
 * 读取xlsx文件
 */
require_once dirname(dirname(__File__)).'/vendor/autoload.php';
//读取文件
$objPHPExcel = PHPExcel_IOFactory::load('../data/1.xlsx');

//获取sheet个数
$sheetCount = $objPHPExcel->getSheetCount();

echo $sheetCount."\n";

//新建一个sheet
$objPHPExcel->createSheet($sheetCount);

//获取sheet对象
$objSheet = $objPHPExcel->getSheet($sheetCount);

//以数组方式写入数据
$test_list = [
    '123',
    '456',
    '789',
];
$objSheet->fromArray($test_list);

//保存到文件
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('../data/2.xlsx');

$objSheet->copy();




