<?php
require_once dirname(dirname(__File__)).'/vendor/autoload.php';
$file_name = '/Users/mark/Downloads/data.xlsx';

$objPHPExcel = PHPExcel_IOFactory::load($file_name);
$objSheet = $objPHPExcel->getActiveSheet();
$list = $objSheet->toArray();

//print_r($list);die;
$unset_list = [10190 , 14880 , 9133 , 16115 , 9645 , 9132 , 10410 , 9717 , 9134 , 10226 , 9350 , 9450 , 36188 , 9498 , 9499 , 10692 , 14741 , 13804 , 13312 , 16928 , 13910 , 15760 , 18653 , 19661 , 35375 , 35189 , 14249 , 18953 , 18545 , 19763 , 15748 , 17333 , 9630 , 10146 , 17141 , 16742 , 19703 , 36125 , 14041 , 19457 , 20969 , 20537 , 19298 , 20414 , 10005 , 20477 , 17075 , 21206 , 17351 , 18686 , 18572 , 19121 , 19655 , 34754 , 12130 , 20480 , 14767 , 21005 , 14182 , 9200 , 9686 , 10782 , 10611 , 15451 , 10792 , 10543 , 10542 , 15699 , 13245 , 13476 , 19505 , 13774 , 10901 , 34384 , 13554 , 35939 , 15252 , 36149 , 11504 , 20153 , 12934 , 15689 , 12718 , 10503 , 16040 , 16256 , 12757 , 16658 , 12630 , 21164 , 21185 , 18659 , 19295 , 19562 , 19853 , 20033 , 20234 , 10191 , 12446 , 12209 , 35609 , 35483 , 35291 , 35186 , 35738 , 35768 , 35795 , 15060 , 14348 , 14056 , 14037 , 14000 , 13227 , 13201 , 13077 , 12665 , 35903 , 20816 , 20786 , 20798 , 20801 , 20756 , 20912 , 20582 , 20576 , 20573 , 20462 , 13412 , 14950 , 13830 , 13002 , 21011 , 14177 , 36068 , 36122 , 36146];
echo count($list)."\n";
echo count($unset_list)."\n";
foreach ($list as $key => $value) {
	if(in_array($value[0], $unset_list))
	{
		unset($list[$key]);
	}
}

echo count($list)."\n";
$objPHPExcel_2 = new PHPExcel();
$objSheet_2 = $objPHPExcel_2->getActiveSheet();
$objSheet_2->fromArray($list);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel_2, 'Excel2007');
$objWriter->save('/Users/mark/Downloads/ssde_data_042702.xlsx');

