<?php

require 'DBHandler.php';

session_start();
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is necessary.";
    } else {
// Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
        $servername='localhost';
        $dbname='directory';
        $DBUsername='root';
        $DBPassword='';
        $db = new DB\DBHandler("mysql:host=$servername;dbname=$dbname", $DBUsername, $DBPassword);
        $db->connect();
        // $username = stripslashes($username);
        // $password = stripslashes($password);
        // $username = mysql_real_escape_string($username);
        // $password = mysql_real_escape_string($password);
        $command= "SELECT * from Employee where Password LIKE :password AND User_Name LIKE :username";
        $params= array (":password" => $password,":username" => $username);
        $result = $db->executeWithReturn($command, $params);
        foreach ($result as $row) {
            echo "<li>{$row['User_Name']}</li>";
        }
        if (sizeof($result) == 1) {
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: profile.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
    }
}

// class Calendar
// {

//     private $db;

//     public function setDb(DB\DBHandler $db)
//     {
//         $this->db = $db
//     }

//     public function countingAbsenceDays($userId)
//     {
//         $res = $this->db->query('SELECT COUNT(1) as number FROM absence WHERE userID = ' . (int)$userID)
//         $days = $res->fetch()['number'];
//         return $days;
//     }

// }

// $mock = $this
//        ->getMockBuilder("PDOMock")
//        ->disableOriginalConstructor()
//        ->setMethods(array("query", 'fetch'))
//        ->getMock();

//        $calendar = new Calendar();
//        $calendar->setDb($mock);

// $calendar->countingAbsenceDays(1234) == 5
// $calendar->countingAbsenceDays(4) == 50
