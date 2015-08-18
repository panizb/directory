<?php

namespace directory;

use \PDO;

class Authentication
{
    public function isAMember($username, $password)
    {
        $servername='localhost';
        $dbname='directory';
        $dBUsername='root';
        $dBPassword='';
        $dbConn = new directory\DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
        $dbConn->connect();
        $command= "SELECT * from Employee where Password LIKE :password AND User_Name LIKE :username";
        $params= array (":password" => $password,":username" => $username);
        $result = $dbConn->executeWithReturn($command, $params);
        foreach ($result as $row) {
            echo "<li>{$row['User_Name']}</li>";
        }
        if (sizeof($result) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
