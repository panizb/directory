<?php

namespace directory;

include 'DBHandler.php';

use \PDO;

class Authentication
{
    public function isAMember($username)
    {
        $servername='localhost';
        $dbname='directory';
        $dBUsername='root';
        $dBPassword='';
        $dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
        $dbConn->connect();
        $command= "SELECT * from Employee where User_Name LIKE :username";
        echo $username;
        $params= array (":username" => $username);
        $result = $dbConn->executeWithReturn($command, $params);
        // foreach ($result as $row) {
        //     echo "<li>{$row['User_Name']}</li>";
        // }
        if (sizeof($result) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
