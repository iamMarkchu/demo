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
            define('DEBUG_MODE', TRUE);
            if(DEBUG_MODE)
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            else
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            $this->setPdo($pdo);
        }catch (PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * @param Pdo $pdo
     */
    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Pdo
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    public function close()
    {
        $this->pdo = null;
    }
}
