<?php
namespace directory;

require 'Authentication.php';
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html>

<head>
<meta name="google-signin-client_id" 
content="548175158538-cth6bq97urq2r54alp2rn4dr2qk1fbee.apps.googleusercontent.com">
<meta charset="utf-8">
<title>Welcome to directory!</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
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
      
      attachSignin(document.getElementById('customBtn'));
    });
     
    
  };

  function signInCallback(authResult) {
    //alert("in call back1");
    var code = authResult['code'];
    // var googleUser = auth2.then();
    // var email = googleUser.getBasicProfile().getEmail(); 
  if (authResult['code']) {
    //alert('auth code');
    // Send the code to the server
    $.ajax({
      type: 'POST',
      url: 'storeauthcode.php',
      // contentType: 'application/octet-stream; charset=utf-8',
    data: { code : code },
    //success: function(response) { //alert(response);
      success: function(result) {
        //alert ("on success call back2");
        //alert(result);
      },
      // processData: false,
      // data: authResult['code']
    });
  } else {
    alert("error in call back");
    // There was an error.
  }
  //alert("before attach3");
}

  function attachSignin(element) {
    //alert("attach Sign in4");
  	console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
            var userID=googleUser.getBasicProfile().getEmail();
            var id_token = googleUser.getAuthResponse().id_token;
            //alert(userID);
            $.ajax({
              url: 'authenticate.php',
              type: 'post',
              data: { userID : userID , id_token : id_token},
              success: function(response) { //alert(response);
               if(response!=1)
                {
                  //document.getElementById('name').innerText ="You have not registered yet.";
                  alert("You have not registered yet.");
                } else {
                        document.getElementById('name').innerText = "Signed in: " +
                        googleUser.getBasicProfile().getName();
                        window.location.replace('profile.php?userID=' + googleUser.getBasicProfile().getEmail());
                        //localstorage.setItem('userID', userID);
                        
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

  <!--style type="text/css">
    #customBtn {
      display: inline-block;
      background: #4285f4;
      color: white;
      width: 190px;
      border-radius: 5px;
      margin:50px auto;
      white-space: nowrap;
    }-->
    <style type="text/css">
    #customBtn:hover {
      cursor: pointer;
    }
    body {
      background-image: url(./img/3fs_boljard.jpg);
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
    .centerfy img{
                margin: 0 auto;

            }
            .centerfy{
                text-align: center;
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


<div class="container">
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
    
  </div>
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-lg-pull-60 col-md-pull-60" style="margin-top:150px;">
    

  <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 ">
        <img class="img-responsive" src="img/3fs.png" width='200px' height='100px' alt="3FS_Logo" align="center" ></img>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xs-push-1 col-sm-push-1 col-md-push-1 col-lg-push-1">
          
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-pull-13 col-sm-pull-1 col-md-pull-1 col-lg-pul-1"
               style="margin-top:50px;">
                  <button id="customBtn" class="btn btn-primary :focus"> Sign in with Google account</button>
              </div>      
      </div>

      

  </div>
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
    
  </div>
  
    
<!--     <div id="customBtn" class="customGPlusSignIn" >
      <span class="icon"></span>
      <span class="buttonText"> Google</span>
    </div> -->
</div>

  <!--button href="#" onclick="signOut();" class="btn">Sign out</button-->
  <div id="name"></div>
  <script>startApp();</script>
  <!--script >
  $('#customBtn').click(function() {
    // signInCallback defined in step 6.
    auth2.grantOfflineAccess({'redirect_uri': 'postmessage'}).then(signInCallback);
  });
  </script-->

  


<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>