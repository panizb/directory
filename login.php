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
        $db = new DB\DBHandler();
        $db->connect();
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
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
