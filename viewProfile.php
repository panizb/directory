<?php

namespace directory;

require 'DBHandler.php';
require 'vendor/autoload.php';
session_start();
//check the session (if needed!)
$servername='localhost';
$dbname='directory';
$dBUsername='root';
$dBPassword='';
$dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
$dbConn->connect();
$command= "SELECT * from Employee where User_Name LIKE :username";
$params= array (":username" => $_GET['userID']);
$result = $dbConn->executeWithReturn($command, $params);
foreach ($result as $res) {
}
$command= "SELECT * from Social_Network where UserID LIKE :userID";
$params= array (":userID" => $_GET['userID']);
$result3 = $dbConn->executeWithReturn($command, $params);
foreach ($result3 as $res3) {
}

$command= "SELECT * from Membership where Username LIKE :userID";
$params= array (":userID" => $_GET['userID']);
$teams = $dbConn->executeWithReturn($command, $params);
foreach ($teams as $team) {
}

$command= "SELECT * from Develop where Username LIKE :userID";
$params= array (":userID" => $_GET['userID']);
$projects = $dbConn->executeWithReturn($command, $params);
foreach ($projects as $project) {
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta name="google-signin-client_id" 
	content="548175158538-cth6bq97urq2r54alp2rn4dr2qk1fbee.apps.googleusercontent.com">
	<meta charset="utf-8">
	<title>Edit Profile</title>
	<!--link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"-->
<link rel="stylesheet" href="./css/bootstrap.min.css"/>
	<script src="https://apis.google.com/js/api:client.js"></script>
	<!--script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script-->



	<script>

  var googleUser = {};
  var startApp = function() {
      gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '548175158538-cth6bq97urq2r54alp2rn4dr2qk1fbee.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // fetch_basic_profile: false,
        // scope: 'profile'
      });
    });
    
  };
  function signOut() {
    // var profile = googleUser.getBasicProfile();
    // if (document.getElementById('name').innerText === "Signed in: " +
    //       profile.getName())    
    // {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
    //     var profile = auth2.currentUser.get().getBasicProfile();
    // if (document.getElementById('name').innerText === "Signed in: " +
    //       profile.getName())
    // {
      console.log('User signed out.');
      window.location = 'index.php'
      //document.getElementById('name').innerText = "Signed out";
   //  } else {
   //    document.getElementById('name').innerText = "You have not signed in!";
   // }
    });
   
    
  }
  </script>
  <style type="text/css">
      body {
    background-image: url(./img/IMAG2256.jpg);
    background-position: center center;
      background-repeat: no-repeat;
  
  /* Background image is fixed in the viewport so that it doesn't move when 
     the content's height is greater than the image's height */
  background-attachment: fixed;
  
  /* This is what makes the background image rescale based
     on the container's size */
  background-size: cover;
  
  /* Set a background color that will be displayed
     while the background image is loading */
  background-color: #464646;

    }
  </style>
</head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="color:#E0E0E0 ; margin-top:44px;" >
          <h1>3FS Directory</h1>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 
        col-xs-offset-8 col-sm-offset-10 col-md-offset-10 col-lg-offset-10 ">
          <button  class="btn btn-primary" onclick="signOut()";>Sign out</button>
        </div>
      </div>
      
            
      <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
          <!-- <h2 class="bg-primary"> <?php echo $res['Name']."'s profile"; ?></h2> -->
        </div>
        
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
        <img class="img-responsive img-circle" 
        src=<?php echo $res['Photo']?> width='150px' height='150px' alt="<?php echo $res['Name']."'s Photo"?>">
        </img>
      </div>
      <dl>
        <div class="row">
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
           <h3 >Profile info:</h3>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          
          </div>
        </div>
        <div style="height:400px; overflow-y:scroll; width:700px">
          <dt class="bg-info">First Name:</dt>
          <dd style="color:#6699FF"> <strong><?php echo $res['Name']; ?></strong> </dd>
          <dt class="bg-success">Family Name:</dt>
          <dd style="color:#009966"> <strong><?php echo $res['Family_Name']; ?></strong> </dd>
          <dt class="bg-warning">Private Email:</dt>
          <dd style="color:#FFCC00" > <strong><?php echo $res['Private_Email']; ?></strong> </dd>
          <dt class="bg-danger">Username:</dt>
          <dd style="color:#CC6666" > <strong><?php echo $res['User_Name']; ?></strong> </dd>
          <dt class="bg-info">Password:</dt>
          <dd style="color:#6699FF"> <strong> <?php echo "******"; ?></strong> </dd>
          <dt class="bg-success">Phone Number:</dt>
          <dd style="color:#009966"> <strong> <?php echo $res['Phone_Number']; ?></strong> </dd>
          <dt class="bg-warning">Website:</dt>
          <dd style="color:#CC9933" > 
            <a href="<?php echo $res['Website']; ?>"><?php echo $res['Website']; ?></a>
          </dd>
          <dt class="bg-danger">Social Networks:</dt>
          <dd>
            <?php
            foreach ($result3 as $res4) {
                    echo "<span class=\"text-info\"><strong>".$res4['Name'].": "."</span></strong>";
                    echo '<a href='.$res4['Link'].'\'>'.$res4['Link'].'<br></a>';
            }
            ?>
          </dd>
          <dt class="bg-danger">Teams:</dt>
          <dd>
            <?php
            foreach ($teams as $team2) {
                echo "<span style=\"color:#CC6666\"><strong>".$team2['Team_Name']."</span></strong><br>";
            }
            ?>
          </dd>
          <dt class="bg-danger">Projects:</dt>
          <dd>
            <?php
            foreach ($projects as $project2) {
                echo "<span style=\"color:#CC6666\"><strong>".$project2['Project_Name']."</span></strong><br>";
            } ?>
          </dd>
        </div>
      </dl>
    </div>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>startApp();</script>
  </body>
</html>