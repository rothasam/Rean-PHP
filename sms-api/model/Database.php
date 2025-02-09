<?php

class Database
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function executeAssoc($sql, $params = [])
    {
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public function execute($sql, $params = [])
    {
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->execute($params);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}