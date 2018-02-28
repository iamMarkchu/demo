<?php
require 'db.php';

$db_config = [
    'dsn' => 'mysql:dbname=ss_fashion;host=192.168.1.10',
    'username' => 'mark',
    'password' => 'vlvsTPeG'
];
$db = new db($db_config);
// $name = "ashley%';drop table test;'";
// $sql = "select * from fs_styles where title like '{$name}'";
// $stat = $db->getPdo()->query($sql);
// unset($db);

$name = 'ashley%;drop table test';
$sql = "select * from fs_styles where title like ?";
$stmt = $db->getPdo()->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->execute();
// $db->close();

