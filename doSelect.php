<?php

namespace directory;

require 'DBHandler.php';
session_start();
$servername='localhost';
$dbname='directory';
$dBUsername='root';
$dBPassword='';
$dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
$dbConn->connect();
    //Check if select any new team
if (isset($_GET['valueT']) && !empty($_GET['valueT'])) {
    $selectedTeam = $_GET['valueT'];
    $command= "INSERT INTO Membership (Username, Team_Name) VALUES (:userID, :tname)";
    $params= array (":tname" => $selectedTeam, ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
}
//Check if select any new project
if (isset($_GET['valueP']) && !empty($_GET['valueP'])) {
    $selectedProject = $_GET['valueP'];
    $command= "INSERT INTO Develop (Username, Project_Name) VALUES (:userID, :pname)";
    $params= array (":pname" => $selectedProject, ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
}
$command= "SELECT Team_Name from Membership where Username != :userID";
$params= array (":userID" => $_SESSION['id']);
$otherTeams = $dbConn->executeWithReturn($command, $params);
$otherTeams=array_unique($otherTeams, SORT_REGULAR);
foreach ($otherTeams as $otherTeam) {
    print_r($otherTeam);
}
