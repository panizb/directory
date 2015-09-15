<?php

namespace directory;

require 'DBHandler.php';
session_start();
//check the session (if needed!)
// if ($_SESSION['id']!=$_GET['userID']) {
//     echo "Session timed out!";
    // session_destroy();
    // header('Location: index.php');
//}
$servername='localhost';
    $dbname='directory';
    $dBUsername='root';
    $dBPassword='';
    $dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
    $dbConn->connect();
for ($i=0; $i < $_GET['count']; $i++) {
    $butName="remove".$i;
    $rowName = "table".$i;
    $inputName = "social".$i;
    $row = unserialize($_GET[$rowName]);
    if (isset($_GET[$butName])) {
        echo "found remove";
        $command = "DELETE FROM Social_Network WHERE UserID = :userID AND Link = :link AND Name = :name";
        $params= array (":name" => $row['Name'], ":link" => $row['Link'], ":userID" => $row['UserID']);
        $dbConn->executeWithoutReturn($command, $params);
        header('Location: edit.php?userID='.$_SESSION['id']);
    }
}
for ($i=0; $i < $_GET['countT']; $i++) {
    $butName="removeT".$i;
    $rowName = "tableT".$i;
    $inputName = "team".$i;
    $row = unserialize($_GET[$rowName]);
    if (isset($_GET[$butName])) {
        echo "found remove";
        $command = "DELETE FROM Membership WHERE Username = :userID AND Team_Name = :tname";
        $params= array (":tname" => $row['Team_Name'], ":userID" => $_SESSION['id']);
        $dbConn->executeWithoutReturn($command, $params);
        header('Location: edit.php?userID='.$_SESSION['id']);
    }
}
for ($i=0; $i < $_GET['countP']; $i++) {
    $butName="removeP".$i;
    $rowName = "tableP".$i;
    $inputName = "project".$i;
    $row = unserialize($_GET[$rowName]);
    if (isset($_GET[$butName])) {
        echo "found remove";
        $command = "DELETE FROM Develop WHERE Username = :userID AND Project_Name = :pname";
        $params= array (":pname" => $row['Project_Name'], ":userID" => $_SESSION['id']);
        $dbConn->executeWithoutReturn($command, $params);
        header('Location: edit.php?userID='.$_SESSION['id']);
    }
}
if (isset($_GET['addHere'])) {
    header('Location: addLink.php?userID='.$_SESSION['id']);
}
if (isset($_GET['addTHere'])) {
    header('Location: addTeam.php?userID='.$_SESSION['id']);
}
if (isset($_GET['addPHere'])) {
    header('Location: addProject.php?userID='.$_SESSION['id']);
}
if (isset($_GET['add'])) {
    //echo "UserID: ".$_GET['userID'];
    //First search to check it's a new link
    $command= "SELECT * FROM Social_Network WHERE Link = :link";
    $params= array (":link" => $_GET['newSLink']);
    $results=$dbConn->executeWithReturn($command, $params);
    if (count($results)!=0) {
        $msg="This link is already taken.";
        header('Location: errorManipulate.php?userID='.$_SESSION['id'].'&msg='.$msg);
    }

    $command= "INSERT INTO Social_Network (Name, Link, UserID) VALUES (:sname, :link, :userID)";
    $params= array (":sname" => $_GET['newSName'], ":link" => $_GET['newSLink'], ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
    header('Location: edit.php?userID='.$_SESSION['id']);
}
if (isset($_GET['addTeam'])) {
    //First search to check it's a new team
    $command= "SELECT * FROM Membership WHERE Team_Name = :tname AND Username = :uname";
    $params= array (":tname" => $_GET['newTName'], ":uname" => $_SESSION['id']);
    $results=$dbConn->executeWithReturn($command, $params);
    if (count($results)!=0) {
        $msg="This team was added before.";
        header('Location: errorManipulate.php?userID='.$_SESSION['id'].'&msg='.$msg);
    }

    $command= "INSERT INTO Membership (Username, Team_Name) VALUES (:userID, :tname)";
    $params= array (":tname" => $_GET['newTName'], ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
    header('Location: edit.php?userID='.$_SESSION['id']);
}
if (isset($_GET['addProject'])) {
    //First search to check it's a new project
    $command= "SELECT * FROM Develop WHERE Project_Name = :pname AND Username = :uname";
    $params= array (":pname" => $_GET['newPName'], ":uname" => $_SESSION['id']);
    $results=$dbConn->executeWithReturn($command, $params);
    if (count($results)!=0) {
        $msg="This project was added before.";
        header('Location: errorManipulate.php?userID='.$_SESSION['id'].'&msg='.$msg);
    }

    $command= "INSERT INTO Develop (Username, Project_Name) VALUES (:userID, :pname)";
    $params= array (":pname" => $_GET['newPName'], ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
    header('Location: edit.php?userID='.$_SESSION['id']);
}
if (isset($_GET['cancelAdd'])) {
    header('Location: edit.php?userID='.$_SESSION['id']);
}
if (isset($_GET['cancelAddT'])) {
    header('Location: edit.php?userID='.$_SESSION['id']);
}
if (isset($_GET['cancelAddP'])) {
    header('Location: edit.php?userID='.$_SESSION['id']);
}
    //Check if select any new team
if (isset($_GET['valueT']) && !empty($_GET['valueT'])) {
    $selectedTeam = $_GET['valueT'];
    echo "<br>".$selectedTeam;
    $command= "INSERT INTO Membership (Username, Team_Name) VALUES (:userID, :tname)";
    $params= array (":tname" => $selectedTeam, ":userID" => $_SESSION['id']);
    var_dump($params);
    $dbConn->executeWithoutReturn($command, $params);
}
//Check if select any new project
if (isset($_GET['valueP']) && !empty($_GET['valueP'])) {
    echo "ridi";
    $selectedProject = $_GET['valueP'];
    echo $selectedProject."<br>";
    $command= "INSERT INTO Develop (Username, Project_Name) VALUES (:userID, :pname)";
    $params= array (":pname" => $selectedProject, ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
}

if (isset($_GET['save'])) {
    //First search to check it's a new username
    // $command= "SELECT * FROM Employee WHERE User_Name = :uname AND User_Name != :preUname";
    // $params= array (":uname" => $_GET['username'], ":preUname" => $_SESSION['id']);
    // $results=$dbConn->executeWithReturn($command, $params);
    // if (count($results)!=0) {
    //     $msg="This username was taken before.";
    //     header('Location: errorManipulate.php?userID='.$_SESSION['id'].'&msg='.$msg);
    // }
    
    $command= "UPDATE Employee SET Name = :name
    , Family_Name = :family
    , Private_Email = :email
    , Phone_Number = :phone
    , Password = :pass
    , Website = :web
    WHERE User_Name = :userID" ;
    $params= array (":name" => $_GET['name'], ":family" => $_GET['family'], ":email" => $_GET['email']
    , ":phone" => $_GET['phone'], ":pass" => $_GET['pass']
    , ":web" => $_GET['web'], ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);
    //if the count hasn't changed rewrite all the social networks' links of the user with the updated userID
    // $command = "DELETE FROM Social_Network WHERE UserID = :userID";
    // $params= array (":userID" => $_SESSION['id']);
    // $dbConn->executeWithoutReturn($command, $params);
    // for ($i=0; $i < $_GET['count']; $i++) {
    //     $rowName = "table".$i;
    //     $inputName = "social".$i;
    //     $row = unserialize($_GET[$rowName]);
    //     $input = $_GET[$inputName];
    //     $command= "INSERT INTO Social_Network (Name, Link, UserID) VALUES (:sname, :link, :userID)";
    //     $params= array (":sname" => $row['Name'], ":link" => $input, ":userID" => $_GET['username']);
    //     $dbConn->executeWithoutReturn($command, $params);

    // }

    // $command = "UPDATE Membership SET Username = :uname WHERE Username = :userID";
    // $params= array ("uname" => $_GET['username'], ":userID" => $_SESSION['id']);
    // $dbConn->executeWithoutReturn($command, $params);
    // //if the count hasn't changed rewrite all the projects' names of the user with the updated userID
    // $command = "UPDATE Develop SET Username = :uname WHERE Username = :userID";
    // $params= array ("uname" => $_GET['username'], ":userID" => $_SESSION['id']);
    $dbConn->executeWithoutReturn($command, $params);

    //$_SESSION['id']=$_GET['username'];

    echo "Changes saved!";
    header('Location: profile.php?userID='.$_SESSION['id']);

}
if (isset($_GET['cancel'])) {
    header('Location: profile.php?userID='.$_SESSION['id']);
}
