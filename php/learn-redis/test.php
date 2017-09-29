<?php
$redis = new Redis();
$redis->connect('192.168.31.249');
$f = $redis->set('my_name', 'chukui');
echo $f;