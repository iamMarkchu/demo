<?php
require 'db.php';

$db_config = [
    'dsn' => 'mysql:dbname=test_ss_fashion;host=192.168.1.10',
    'username' => 'mark',
    'password' => 'vlvsTPeG'
];
$db = new db($db_config);

$sql = "select * from fs_styles where title like 'ashley%'";
$stat = $db->getPdo()->query($sql);
$res = $stat->fetchAll(PDO::FETCH_ASSOC);
print_r($res);