<?php 
date_default_timezone_set('Asia/Shanghai');
$datetime = new DateTime();

echo $datetime->format('Y-m-d'). PHP_EOL;

//创建长度为两天的间隔
$interval = new DateInterval('P2D');

//修改DateTime实例
$datetime->add($interval);
echo $datetime->format('Y-m-d'). PHP_EOL;