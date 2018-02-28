<?php
$dsn = 'mysql:dbname=test;host=127.0.0.1';
$username = 'root';
$password = 'chukui';
$dbh = null;
try {
    $dbh = new Pdo($dsn, $username, $password);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
} catch(PDOException $e)
{
    echo $e->getMessage() . PHP_EOL;
    exit;
}

$sql = <<<EOT
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
EOT;
$dbh->query($sql);

// 直接执行
$sql = "INSERT INTO `user` (`name`) VALUES ('mark')";
$dbh->query($sql);

// sql预处理
$sql = "INSERT INTO `user` (`name`) VALUES (?)";

$stmt = $dbh->prepare($sql);
$stmt->bindParam(1, $name);

// 第一次
$name = 'jerry';
$stmt->execute();

// 第二次
$name = 'mary';
$stmt->execute();

// 第三次
$name = 'mary1';
$stmt->execute();

// select
$sql = "SELECT * FROM `user`";
$stmt = $dbh->query($sql);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($data);

