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
foreach ($result as $res) {
 
}
$command= "SELECT Name, Family_Name, User_Name from Employee";
$params= array ();
$result2 = $dbConn->executeWithReturn($command, $params);
foreach ($result2 as $res2) {

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
      //setUp(document.getElementById('hi'));
    });
    
  };

 // function setUp() {

 
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

  //}



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
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-8 col-sm-offset-10 col-md-offset-10 col-lg-offset-10 "><button  class="btn btn-primary" onclick="signOut()";>Sign out</button></div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><h1>3FS Directory</h1></div>
    <!--contact scroll-->
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 ">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h1><? echo "<br>"; ?></h1>
              <h3><? echo "<br>"; ?></h3>
               <h3>Your Contacts:</h3>
              <div style="position:relative;">
                <!-- Navigation -->
                <!--nav class="navbar navbar-default navbar-static" role="navigation" id="navbar-spy">
                  <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="#scroll-first">First</a></li>
                      <li><a href="#scroll-second">Second</a></li>
                      <li><a href="#scroll-third">Third</a></li>
                    </ul>
                  </div>
                </nav-->
                <!-- Content data-target="#navbar-spy" data-spy="scroll"-->
                <div style="height:400px; overflow-y:scroll; position:relative;">
                  <div id="scroll-first">
                  
                    <? foreach ($result2 as $res2) {
                    echo '<a href="viewProfile.php?userID='.$res2['User_Name']."\">".$res2['Name']." ".$res2['Family_Name']."<br></a>"; 
                    }  ?>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a congue nibh. Ut sodales ipsum sed purus efficitur, dignissim venenatis quam malesuada. Aliquam mattis aliquam erat quis congue. Donec volutpat tincidunt ante ut lacinia. In sit amet mattis libero. Fusce mattis ex nec fermentum scelerisque. Vestibulum mattis nibh pretium scelerisque varius. Duis gravida maximus ex, condimentum condimentum neque mattis sit amet. Cras metus arcu, posuere sed arcu ut, tempus lobortis felis. Nam sodales mauris sit amet leo dapibus consequat. Nam mollis, arcu sed pulvinar imperdiet, orci erat egestas lectus, in porta libero enim quis mi. Nunc quis lectus purus. Praesent quis congue lacus. Integer in scelerisque nisi.
                  </div>
                  <div id="scroll-second">
                    <h2>Second</h2>
                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed quis pretium justo. Nam tristique vestibulum consectetur. Aliquam at porttitor lectus. Curabitur pharetra luctus arcu, ut lacinia neque tempus at. Sed malesuada purus sit amet risus convallis, ac elementum ex venenatis. Cras magna diam, viverra aliquet finibus eget, dapibus eu augue. Suspendisse potenti. Etiam nec sem turpis.
                  </div>
                  <div id="scroll-third">
                    <h2>Third</h2>
                    Donec in tincidunt ipsum. Praesent sed cursus magna. Donec ut tempor augue. Nunc blandit velit purus, in malesuada est tristique ut. Sed lobortis purus eu posuere volutpat. Sed eget massa suscipit libero interdum dapibus. Fusce ac massa non ex porta imperdiet eu ut nibh. Fusce ut sem blandit, mattis neque ut, dignissim massa. Vivamus aliquam non justo vitae scelerisque. Etiam venenatis hendrerit pellentesque.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Profile view-->
        <div  class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xs-push-1 col-sm-push-1 col-md-push-1 col-lg-push-1">
            
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                <h2> Hi <?php echo $res['Name']." !"; ?></h2>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-push-2 col-sm-push-2 col-md-push-2 col-lg-push-2">
                <img class="img-responsive" src=<?php echo $res['Photo']?> width='120px' height='120px' alt="Your Photo"></img>
              </div>
            </div>
            
            <dl>
            <div class="row">
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
               <a href='edit.php?userID=<?php echo $res['User_Name'];?>'><i class="glyphicon glyphicon-pencil"></i>
                Edit </a><h3>Your profile info:</h3>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              
              </div>
            </div >
            <div style="height:400px; overflow-y:scroll">
              <dt class="bg-info">First Name:</dt>
            <dd> <? echo $res['Name']; ?> </dd>
            <dt class="bg-success">Family Name:</dt>
            <dd> <? echo $res['Family_Name']; ?> </dd>
            <dt class="bg-warning">Private Email:</dt>
            <dd> <? echo $res['Private_Email']; ?> </dd>
            <dt class="bg-danger">Username:</dt>
            <dd> <? echo $res['User_Name']; ?> </dd>
            <dt class="bg-info">Password:</dt>
            <dd> <? echo "******"; ?> </dd>
            <dt class="bg-success">Phone Number:</dt>
            <dd> <? echo $res['Phone_Number']; ?> </dd>
            <dt class="bg-warning">Website:</dt>
            <dd> <? echo $res['Website']; ?> </dd>
            <dt class="bg-danger">Social Networks:</dt>
            </div>
            

   </dl>
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