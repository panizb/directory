<?php

namespace directory;

use \PDO;

class DBHandler
{
    public $dsn;
    public $username;
    public $password;

    public function __construct($dsn, $username = null, $password = null)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
    }

    private $conn;
    public function connect()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
        // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function executeWithReturn($query, array $params = [])
    {
        try {
            $sth = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute($params);
            return $sth->fetchAll();
        } catch (PDOException $e) {
            echo "Execute with return Error: " .$e->getMessage(). "</br>";
        }
        
    }
    public function executeWithoutReturn($query, array $params = [])
    {
        try {
            $sth = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute($params);
        } catch (PDOException $e) {
            echo "Execute without return Error: " .$e->getMessage(). "</br>";
        }
    }
}
