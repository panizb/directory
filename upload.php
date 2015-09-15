<?php
namespace directory;

require 'DBHandler.php';
//if (session_status() === PHP_SESSION_ACTIVE) ? TRUE : FALSE;
session_start();





$target_dir = "./img/profiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["upload"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $servername='localhost';
        $dbname='directory';
        $dBUsername='root';
        $dBPassword='';
        $dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
        $dbConn->connect();
        //deleteing the old photo
        $command= "SELECT * from Employee where User_Name LIKE :username";
        $params= array (":username" => $_SESSION['id']);
        $result = $dbConn->executeWithReturn($command, $params);
        foreach ($result as $res) {
        }
        $filename = $res['Photo'];
        unlink($filename);
        //uploading the new photo
        $command= "UPDATE Employee SET Photo = :photo WHERE User_Name = :username";
        //possible to have seperate folders for each user!
        $params= array (
            ":photo" => "./img/profiles/".basename($_FILES["fileToUpload"]["name"]),
             ":username" => $_SESSION['id']
             );
        $dbConn->executeWithoutReturn($command, $params);
        
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header("Location: edit.php?userID=".$res['User_Name']);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
