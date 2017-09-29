<?php
/**
 * 获取ss_fashion数据库中，每个celebrity有多少个style,每个style有多少个product
 */
require_once dirname(dirname(__File__)).'/vendor/autoload.php';
$dir = dirname(__FILE__);
require $dir.'/db_config.php';
require $dir.'/db.php';

$db = new db($db_config);

//获取所有的明星

$all_celebrities = $db->getAllCelebrities();

//获取明星所有的post
$objExcel = new PHPExcel();
$objExcel->getDefaultStyle()->applyFromArray(
    array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);
$objSheet = $objExcel->getActiveSheet();
$product_count = 2;
$objSheet->setCellValue('A1', 'CELEBRITIES');
$objSheet->setCellValue('B1', 'POST');
$objSheet->setCellValue('C1', 'PRODUCT');

foreach ($all_celebrities as $k => $celebrity)
{
    $all_posts = $db->getPostsByCid($celebrity['id']);
    $celebrity_position = $product_count;
    $objSheet->setCellValue('A'.$celebrity_position, $celebrity['name'])->getStyle()->getFill()->getStartColor()->setARGB('FF808080');
    foreach ($all_posts as $kk => $post)
    {
        $all_products = $db->getProductsByPid($post['id']);
        $post_position = $product_count;
        $objSheet->setCellValue('B'.$post_position, $post['title']);
        foreach ($all_products as $kkk => $product)
        {
            $objSheet->setCellValue('C'.$product_count, $product['product_name']);
            //$objSheet->setCellValue('D'.$product_count, $product['product_url']);
            $product_count++;
        }
        $post_end = $product_count-1;
        $objSheet->mergeCells('B'.$post_position.':B'.$post_end);
    }
    $celebrity_end = $product_count-1;
    $objSheet->mergeCells('A'.$celebrity_position.':A'.$celebrity_end);
}
$objSheet->getColumnDimension('A')->setAutoSize(true);
//$objSheet->getColumnDimension('B')->setWidth(40);
$objSheet->getColumnDimension('C')->setAutoSize(true);
$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'excel2007');
$objWriter->save('test1.xlsx');
