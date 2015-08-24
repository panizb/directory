<?php
//if (session_status() === PHP_SESSION_ACTIVE) ? TRUE : FALSE;
if (isset($_POST['userID']))
    echo "yes";
 ?>
<!DOCTYPE html>
<html>

<head>
	<meta name="google-signin-client_id" 
	content="548175158538-cth6bq97urq2r54alp2rn4dr2qk1fbee.apps.googleusercontent.com">
	<meta charset=”utf-8”>
	<title>Home Page</title>
	<!--link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"-->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<script src="https://apis.google.com/js/api:client.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>



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

  function setUp(element) {

 
  	    console.log(element.id);
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
	<div style="float:left; magin-left:20 px;" id="gSignInWrapper" class="container">
	    <div id="hi"></div>
	    <button href="#" class="btn" style="float:right; magin-right:20 px;">Sign out</button>
	    <button calss="btn" href="#"><i class="icon-pencil"></i></button> 
	    <i class="icon-search"></i>
	</div>
    <button href="#" onclick="signOut();" class="btn">Sign out</button>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>startApp();</script>

</body>

</html>