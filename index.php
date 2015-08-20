<?php
namespace directory;

include 'Authentication.php'
?>
<!DOCTYPE html>
<html>

<head>
<meta name="google-signin-client_id" 
content="548175158538-cth6bq97urq2r54alp2rn4dr2qk1fbee.apps.googleusercontent.com">
<title>Welcome to directory!</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
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
      attachSignin(document.getElementById('customBtn'));
    });
    
  };

  function attachSignin(element) {

 
  	    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
            var userID=googleUser.getBasicProfile().getEmail();
            //alert(userID);
 $.ajax({
    url: 'authenticate.php',
    type: 'post',
    data: { userID : userID },
    success: function(response) { alert(response);
     if(response!=1)
      {
        document.getElementById('name').innerText ="You have not registered yet.";
      } else {
              document.getElementById('name').innerText = "Signed in: " +
              googleUser.getBasicProfile().getName();
              window.location = 'profile.php';
      }
    }
});
}, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });	

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
      document.getElementById('name').innerText = "Signed out";
   //  } else {
   //    document.getElementById('name').innerText = "You have not signed in!";
   // }
    });
   
    
  }
  </script>

  <style type="text/css">
    #customBtn {
      display: inline-block;
      background: #4285f4;
      color: white;
      width: 190px;
      border-radius: 5px;
      margin:50px auto;
      white-space: nowrap;
    }
    #customBtn:hover {
      cursor: pointer;
    }
    span.label {
      font-weight: bold;
    }
    span.icon {
      background: url('/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 42px;
      height: 42px;
      border-right: #2265d4 1px solid;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 42px;
      padding-right: 42px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>

<body>

<!--div id="google" class="g-signin2" data-onsuccess="onSignIn"></div>
<script >
function onSignIn(googleUser) {
	window.alert("onSignIn");
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
}
</script-->
<a href="#" onclick="signOut();">Sign out</a>
<div id="gSignInWrapper">
    <span class="label">Sign in with:</span>
    <div id="customBtn" class="customGPlusSignIn" >
      <span class="icon"></span>
      <span class="buttonText"> Google</span>
    </div>
  </div>
  <div id="name"></div>
  <script>startApp();</script>



</body>

</html>