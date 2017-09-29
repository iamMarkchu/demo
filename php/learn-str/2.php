<?php 
$title = 'Up to £300 off Televisions';
echo $title. PHP_EOL;
$title = iconv('UTF8', 'latin1', $title);
echo $title. PHP_EOL;
echo mb_detect_encoding($title). PHP_EOL;