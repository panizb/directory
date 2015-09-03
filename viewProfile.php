<?php

namespace directory;

include 'DBHandler.php';
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

?>

<!DOCTYPE html>
<html>

<head>
	<meta name="google-signin-client_id" 
	content="548175158538-cth6bq97urq2r54alp2rn4dr2qk1fbee.apps.googleusercontent.com">
	<meta charset=”utf-8”>
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
</head>

<body>
  <div class="jumbotron">
    <div class="container">
    <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><h2 class="bg-info">3FS Directory</h2></div>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-8 col-sm-offset-10 col-md-offset-10 col-lg-offset-10 "><button  class="btn btn-primary" onclick="signOut()";>Sign out</button></div>
      
    </div>
      
            
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                <h2 class="bg-primary"> <?php echo $res['Name']."'s profile"; ?></h2>
              </div>
              
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                <img class="img-responsive" src=<?php echo $res['Photo']?> width='120px' height='120px' alt="<?php echo $res['Name']."'s Photo"?>"></img>
              </div>
            <dl>
            <div class="row">
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
               <h3 >Profile info:</h3>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              
              </div>
            </div >
            <div style="height:400px; overflow-y:scroll; width:700px">
              <dt class="bg-info">First Name:</dt>
            <dd> <? echo $res['Name']; ?> </dd>
            <dt class="bg-success">Family Name:</dt>
            <dd> <? echo $res['Family_Name']; ?> </dd>
            <dt class="bg-warning">Private Email:</dt>
            <dd> <? echo $res['Private_Email']; ?> </dd>
            <dt class="bg-danger">Username:</dt>
            <dd> <? echo $res['User_Name']; ?> </dd>
            <dt class="bg-success">Phone Number:</dt>
            <dd> <? echo $res['Phone_Number']; ?> </dd>
            <dt class="bg-warning">Website:</dt>
            <dd> <? echo $res['Website']; ?> </dd>
            <dt class="bg-danger">Social Networks:</dt>
            <dd><? foreach ($result3 as $res4){
             echo "<span class=\"text-info\"><strong>".$res4['Name'].": "."</span></strong>";
              echo '<a href='.$res4['Link'].'\'>'.$res4['Link'].'<br></a>';
              } ?></dd>
            </div>
            </div>
            

   </dl>

























    </div>
  </div>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="js/bootstrap.js"></script>
  </body>
</html>