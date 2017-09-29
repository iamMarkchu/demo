<?php

/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2017/4/21
 * Time: 下午1:39
 */
class db
{
    protected $pdo = null;
    public function __construct($config)
    {
        try {
            $pdo = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->setPdo($pdo);
        }catch (PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * @param null $pdo
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return null
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    public function getAllCelebrities()
    {
        $sql = "select * from fs_celebrities";
        $stat = $this->pdo->query($sql);
        return $stat->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostsByCid($cid)
    {
        $sql = "select * from fs_styles where cid = ".$cid;
        $stat = $this->pdo->query($sql);
        return $stat->fetchAll(PDO::FETCH_ASSOC);
    }

    public  function getProductsByPid($pid)
    {
        $sql = "select * from fs_products where sid = ".$pid;
        $stat = $this->pdo->query($sql);
        return $stat->fetchAll(PDO::FETCH_ASSOC);
    }
}