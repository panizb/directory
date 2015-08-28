<?php

namespace directory;

include 'DBHandler.php';
session_start();
//check the session (if needed!)
// if ($_SESSION['id']!=$_GET['userID']) {
//     echo "Session timed out!";
    // session_destroy();
    // header('Location: index.php');
//}
if (isset($_GET['save'])) {
    echo "string";
    $servername='localhost';
    $dbname='directory';
    $dBUsername='root';
    $dBPassword='';
    $dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
    $dbConn->connect();
    $command= "UPDATE Employee SET Name = :name
    , Family_Name = :family
    , Private_Email = :email
    , Phone_Number = :phone
    , User_Name = :userID2
    , Password = :pass
    , Website = :web
    WHERE User_Name = :userID" ;
    echo $command;
    $params= array (":name" => $_GET['name'], ":family" => $_GET['family'], ":email" => $_GET['email']
    , ":phone" => $_GET['phone'], ":userID2" => $_GET['username'], ":pass" => $_GET['pass']
    , ":web" => $_GET['web'], ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
    echo "Changes saved!";
}
header('Location: profile.php?userID='.$_GET['username']);
