<?php
/**
 * 测试数据：一个小型网站所有的页面浏览记录，找出最受欢迎的页面
 */
include_once 'data_array_count_values.php';
$testCount = array_count_values($test);
print_r($testCount);
arsort($testCount, SORT_NUMERIC);
print_r('最受欢迎的页面是：'.key($testCount).'. '.'访问次数是：'.current($testCount));
