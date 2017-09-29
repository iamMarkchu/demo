<?php
$dsn = 'mysql:dbname=robot;host=192.168.31.249';
$username = 'root';
$password = 'chukui';

try {
    $pdo = new PDO($dsn, $username, $password);

    $sql = 'select * from user';
    $stat = $pdo->query($sql);
    $res = $stat->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e)
{
    echo $e->getMessage();
    exit;
}