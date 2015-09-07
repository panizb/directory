<?php
namespace directory;

include 'DBHandler.php';
session_start();
//check the session (if needed!)
if ($_SESSION['id']!=$_GET['userID']) {
    echo "Session timed out!";
    session_destroy();
    header('Location: index.php');
}
$servername='localhost';
$dbname='directory';
$dBUsername='root';
$dBPassword='';
$dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
$dbConn->connect();
$command= "SELECT * from Employee where User_Name REGEXP ':username'";
$params= array (":username" => $_GET['search']);
$result = $dbConn->executeWithReturn($command, $params);
foreach ($result as $res) {
}
$command= "SELECT * from Employee where Name REGEXP ':name'";
$params= array (":name" => $_GET['search']);
$result2 = $dbConn->executeWithReturn($command, $params);
foreach ($result2 as $res2) {
}
$command= "SELECT * from Employee where Family_Name REGEXP ':fname'";
$params= array (":fname" => $_GET['search']);
$result3 = $dbConn->executeWithReturn($command, $params);
foreach ($result3 as $res3) {
}
