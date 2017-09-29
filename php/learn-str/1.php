<?php 
$a = '我是你';
echo mb_detect_encoding($a);
echo iconv('utf-8', 'gbk', $a); ;
echo mb_strlen($a);
echo strlen($a);