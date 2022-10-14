<?php

class Database
{
    private $dsn = "mysql:dbname=data;host=db;charset=utf8";
    private $login = "root";
    private $pass = "password";

    private $pdo;

    public function __construct()
    {
        if ($this->pdo == null) {
            $this->pdo = new PDO($this->dsn, $this->login, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }

    public function query($query, $params = false)
    {
        if ($params) {
            $rq = $this->pdo->prepare($query);
            $rq->execute($params);
        } else {
            $rq = $this->pdo->query($query);
        }
        return $rq;
    }
}
