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
if (isset($_GET['save'])) {
    echo "string";
    $servername='localhost';
    $dbname='directory';
    $dBUsername='root';
    $dBPassword='';
    $dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
    $dbConn->connect();
    $command= "UPDATE Employee SET Name =".$_GET['name'].
    ", Family_Name=".$_GET['family'].
    ", Private Email=".$_GET['email'].
    ", Phone_Number=".$_GET['phone'].
    ", User_Name=".$_GET['username'].
    ", Password=".$_GET['pass'].
    ", Website=".$_GET['web'].
    "WHERE User_Name=:userID" ;
    $params= array (":username" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
    echo "Changes saved!";
}
header('Location: profile.php');
