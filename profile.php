<?php
namespace directory;

include 'DBHandler.php';
//if (session_status() === PHP_SESSION_ACTIVE) ? TRUE : FALSE;
session_start();
$servername='localhost';
$dbname='directory';
$dBUsername='root';
$dBPassword='';
$dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
$dbConn->connect();
$command= "SELECT * from Employee where User_Name LIKE :username";
$params= array (":username" => $_GET['userID']);
$result = $dbConn->executeWithReturn($command, $params);
echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>";
foreach ($result as $res) {
    echo'<tr>';
    echo'<td>'. $res['Name']."</td>";
    echo'<td>'. $res['Family Name'].'</td>';
    echo'<td>'. $res['Private Email'].'</td>';
    echo'<td>'. $res['Website'].'</td>';
    echo'<tr>';
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta name="google-signin-client_id" 
	content="548175158538-cth6bq97urq2r54alp2rn4dr2qk1fbee.apps.googleusercontent.com">
	<meta charset=”utf-8”>
	<title>Home Page</title>
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
      setUp(document.getElementById('hi'));
    });
    
  };

  function setUp() {

 
  	    //console.log(element.id);
    //auth2.attachClickHandler(element, {},
      //  function(googleUser) {
//       	if (auth2.isSignedIn.get()) {
//       		alert("gooz");
//   var profile = auth2.currentUser.get().getBasicProfile();
//   console.log('ID: ' + profile.getId());
//   console.log('Name: ' + profile.getName());
//   console.log('Image URL: ' + profile.getImageUrl());
//   console.log('Email: ' + profile.getEmail());
// }

            //alert(userID);
//  $.ajax({
//     url: 'authenticate.php',
//     type: 'post',
//     data: { userID : userID },
//     success: function(response) { alert(response);
//      if(response!=1)
//       {
//         document.getElementById('name').innerText ="You have not registered yet.";
//       } else {
//               document.getElementById('name').innerText = "Signed in: " +
//               googleUser.getBasicProfile().getName();
//               localstorage.setItem('userID', userID);
//               window.location = 'profile.php';
//       }
//     }
// });
// }, function(error) {
//           alert(JSON.stringify(error, undefined, 2));
//         });	

  }



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
          <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><h2>3FS Directory</h2></div>
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <button  class="btn btn-primary" onclick="signOut()";>Sign out</button>
          </div>   
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h2>Contacts</h2>
          </div>
    </div> 
	   <!--button class="btn btn-success" href="#"><i class="icon-pencil"></i></button--> 
</div>
  
    <!--script src="js/jquery-2.1.4.min.js"></script-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
	<script>startApp();</script>
  

</body>

</html>