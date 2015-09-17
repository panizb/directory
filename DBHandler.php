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

    private $_conn;
    public function connect()
    {
        try {
            $this->_conn = new PDO($this->dsn, $this->username, $this->password);
            // set the PDO error mode to exception
            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "PDO: Connection failed: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Something is wrong with database";
        }
    }
    public function executeWithReturn($query, array $params = [])
    {
        try {
            $sth = $this->_conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute($params);
            return $sth->fetchAll();
        } catch (PDOException $e) {
            echo "PDO: Execute with return Error: " .$e->getMessage(). "</br>";
        } catch (Exception $e) {
            echo "Something is wrong woth database";
        }
    }
    public function executeWithoutReturn($query, array $params = [])
    {
        try {
            $sth = $this->_conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute($params);
        } catch (PDOException $e) {
            echo "PDO: Execute without return Error: " .$e->getMessage(). "</br>";
        } catch (Exception $e) {
            echo "Something is wrong woth database";
        }
    }
}
