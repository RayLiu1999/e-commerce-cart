<?php

class Database
{
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    private $pdo;
    private $stmt;
    private $error;
    private static $instance;

    private function __construct()
    {
        try {
            $this->pdo = new PDO(
                            'mysql: host=' . $this->host . '; dbname=' . $this->dbname . ';charset=utf8mb4',
                            $this->user,
                            $this->pass 
                        );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            $this->error = $e->getMessage();
            echo $this->error;
            exit();
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function query($sql)
    {
        $this->stmt = $this->pdo->prepare($sql);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function result()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function resultAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
}
