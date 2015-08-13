<?php
require 'DBHandler.php';

session_start();
$error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username or Password is necessary.";
        }
    else
    {
// Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
       $db = new DB\DBHandler();
       $db->connect();
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// $connection = mysql_connect("localhost", "root", "")
// or die('Unable to connect to MySQL');
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
//$db = mysql_select_db("directory", $connection)
//or die('Could not select the DB');
// SQL query to fetch information of registerd users and finds user match.
$command= "SELECT * from Employee where Password LIKE :password AND User_Name LIKE :username";
$params= array (":password => $password",":username => $username");
//$query = mysql_query($command, $connection);
$result = $db->ExecuteWithReturn($command, $params);
foreach($result as $row){
    echo "<li>{$row['User_Name']}</li>";
}
// $rows = mysql_num_rows($query);
// if ( $rows == 1) {
// $_SESSION['login_user']=$username; // Initializing Session
// header("location: profile.php"); // Redirecting To Other Page
// } else {
// $error = "Username or Password is invalid";
// }
// mysql_close($connection); // Closing Connection
}
}
