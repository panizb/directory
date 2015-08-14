<?php

namespace DB;

use \PDO;

class DBHandler
{
    public $conn;
    public function connect()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'directory';
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function executeWithReturn($Query, array $params = [])
    {
        $sth = $this->conn->prepare($Query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute($params);
        return $sth->fetchAll();
    }
}
