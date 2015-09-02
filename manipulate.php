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
    $params= array (":name" => $_GET['name'], ":family" => $_GET['family'], ":email" => $_GET['email']
    , ":phone" => $_GET['phone'], ":userID2" => $_GET['username'], ":pass" => $_GET['pass']
    , ":web" => $_GET['web'], ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
    //if the count hasn't changed rewrite all the social networks' links of the user with the updated userID
    $command = "DELETE FROM Social_Network WHERE UserID = :userID";
    $params= array (":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
    for ($i=0; $i < $_GET['count']; $i++) {
        $rowName = "table".$i;
        $inputName = "social".$i;
        $row = unserialize($_GET[$rowName]);
        $input = $_GET[$inputName];
        $command= "INSERT INTO Social_Network (Name, Link, UserID) VALUES (:sname, :link, :userID)";
        $params= array (":sname" => $row['Name'], ":link" => $input, ":userID" => $_GET['username']);
        $dbConn->executeWithoutReturn($command, $params);

    }
    $_SESSION['id']=$_GET['username'];
    // if ($_GET['username']!=$_SESSION['id']) {
    //     $command= "UPDATE Social_Network SET UserID = :userID_new WHERE UserID = :userID_prev" ;
    //     $params= array (":userID_new" => $_GET['username'], ":userID_prev" => $_SESSION['id']);
    //     $dbConn->executeWithoutReturn($command, $params);
    //     $_SESSION['id']=$_GET['username'];
    // }
    // $command= "UPDATE Social_Network SET  = :userID2 WHERE UserID = :userID1" ;
    //     $params= array (":userID2" => $_GET['username'], ":userID1" => $_SESSION['id']);
    echo "Changes saved!";
}
header('Location: profile.php?userID='.$_GET['username']);
