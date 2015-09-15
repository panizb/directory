<?php

namespace directory;

require 'Authentication.php';

if (isset($_POST['userID'])) {
    $Email = $_POST['userID'];
}
if (isset($_POST['id_token'])) {
    $token = $_POST['id_token'];
}
$auth = new Authentication();
try {
    $result = $auth->isAMember($Email, $token);
} catch (Exception $e) {
    echo $e->getMessage();
}
if ($result) {
    session_start();
    $_SESSION['id'] = $Email;
}
//     $servername='localhost';
//     $dbname='directory';
//     $dBUsername='root';
//     $dBPassword='';
//     $dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
//     $dbConn->connect();
    echo $result;
