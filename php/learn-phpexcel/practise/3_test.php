<?php
//SS_Daily_Report_exc.xlsx
require_once dirname(dirname(__File__)).'/vendor/autoload.php';
$file_name = '../data/SS_Daily_Report_exc.xlsx';

$objPHPExcel = PHPExcel_IOFactory::load($file_name);

$count = $objPHPExcel->getSheetCount();
$objPHPExcel->setActiveSheetIndex($count - 1);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('../data/SS_Daily_Report_exc_1.xlsx');