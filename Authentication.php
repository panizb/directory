<?php
/**check if the google userid is in db
/**author: Paniz
**/
namespace directory;

require 'DBHandler.php';

use \PDO;

/**the class to handle the authentication
**/
class Authentication
{
    public function isAMember($username, $idToken)
    {
        if (empty($username)) {
            throw new \Exception("Error Recieving userID", 1);
            return false;
        }
        if (empty($idToken)) {
            throw new \Exception("Error Recieving id_token", 1);
            return false;
        }
        $servername='127.0.0.1';
        $dbname='directory';
        $dBUsername='root';
        $dBPassword='';
        $dbConn = new DBHandler(
            "mysql:host=$servername;dbname=$dbname",
            $dBUsername,
            $dBPassword
        );
        $dbConn->connect();
        $command= "SELECT * from Employee where User_Name LIKE :username";
        $params= array (":username" => $username);
        $result = $dbConn->executeWithReturn($command, $params);
        // foreach ($result as $row) {
        //     echo "<li>{$row['User_Name']}</li>";
        // }
        if (sizeof($result) == 1) {
            $command= "UPDATE Employee SET Token = :idToken WHERE User_Name = :username";
            $params= array (":idToken" => $idToken, ":username" => $username);
            $dbConn->executeWithoutReturn($command, $params);
            return true;
        } else {
            throw new \Exception("No such user exist.", 1);
            
            return false;
        }
    }
}
