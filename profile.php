<?php
namespace directory;

require 'DBHandler.php';
require 'vendor/autoload.php';
//if (session_status() === PHP_SESSION_ACTIVE) ? TRUE : FALSE;
session_start();
$_SESSION['id']=$_GET['userID'];
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
$command= "SELECT Name, Family_Name, User_Name, Photo from Employee";
$params= array ();
$result2 = $dbConn->executeWithReturn($command, $params);
foreach ($result2 as $res2) {
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
      window.location = 'index.php';
      //document.getElementById('name').innerText = "Signed out";
   //  } else {
   //    document.getElementById('name').innerText = "You have not signed in!";
   // }
    });
   
    
  }
  </script>
  <style type="text/css">
  @media (max-width: 768px) {
  .btn-responsive {
    padding:7px 4px;
    font-size:75%;
    line-height: 1;
  }
}


@media (min-width: 769px) and (max-width: 992px) {
  .btn-responsive {
    padding:7px 9px;
    font-size:80%;
    line-height: 1.2;
  }
}
  @media (min-width: 993px) {
  .btn-responsive {
    padding:7px 9px;
    font-size:90%;
    line-height: 1;
  }
}
    body {
    background-image: url(./img/378d4d7.png);
    background-repeat: no-repeat;
    background-color: #F0F0F0; 

    }
    .sortable tr {
    cursor: pointer;
}
  </style>
</head>

<body>

  	<div class="container">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 
    col-xs-offset-8 col-sm-offset-10 col-md-offset-10 col-lg-offset-10 " style="margin-top:20px;">
      <button  class="btn btn-primary" onclick="signOut()";>Sign out</button></div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="color:#E0E0E0 ;"><h1 >3FS Directory</h1></div>
    <!--contact scroll-->












        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 ">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h1><?php echo "<br>"; ?></h1>
              <h3><?php echo "<br>"; ?></h3>
               <h3 class="muted">Your Contacts:</h3>
               <form class="form-search" action="searchResult.php?userID=<?php echo $_GET['userID'];?>">
               <div class="input-group">
                 <input name="search" type="text" class="form-control input-medium search-query"
                  placeholder="Enter Name or UserID">
                 <span class="input-group-btn">
                   <button type="submit" class="btn btn-info ">
                <span class="glyphicon glyphicon-search">Search</span></button>
                 </span>
               </div>
                
                
              </form>
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
                  
                    <?php echo "<table class=\"table-responsive table-hover sortable\" >
                        <thead>
                          <tr>
                            <th class=\"col-xs-1\"></th> 
                            <th class=\"col-xs-2\"></th> 
                          </tr>
                        </thead>
                        <tbody>" ;
                    foreach ($result2 as $res2) {
                        if ($res2['User_Name']!=$_SESSION['id']) {
                            echo "
                            <tr onclick=\" document.location = 'viewProfile.php?userID=".
                            $res2['User_Name']."';\" ng-repeat-start=\"u in users\" ng-class-odd=\"'alt'\">
                              <td class=\"col-xs-1\"><img height='50px' width='50px' title=\"Photo\" src=\"".
                              $res2["Photo"]."\"class=\"img-circle\"></td> 
                              <td class=\"col-xs-2 >"."<a href=\"viewProfile.php?userID=".$res2['User_Name']."\">".
                              $res2['Name']
                              ." ".$res2['Family_Name']."<br></a>"."</td> 
                            </tr>";
                        }
                        
                        //echo '<a href="viewProfile.php?userID='.$res2['User_Name']."\">".$res2['Name']." ".$res2['Family_Name']."<br></a>";
                    }
                    echo "</tbody>
                        </table>";
?>
                
                  </div>
                  <!-- <div id="scroll-second">
                    <h2>Second</h2>
                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed quis pretium justo. Nam tristique vestibulum consectetur. Aliquam at porttitor lectus. Curabitur pharetra luctus arcu, ut lacinia neque tempus at. Sed malesuada purus sit amet risus convallis, ac elementum ex venenatis. Cras magna diam, viverra aliquet finibus eget, dapibus eu augue. Suspendisse potenti. Etiam nec sem turpis.
                  </div>
                  <div id="scroll-third">
                    <h2>Third</h2>
                    Donec in tincidunt ipsum. Praesent sed cursus magna. Donec ut tempor augue. Nunc blandit velit purus, in malesuada est tristique ut. Sed lobortis purus eu posuere volutpat. Sed eget massa suscipit libero interdum dapibus. Fusce ac massa non ex porta imperdiet eu ut nibh. Fusce ut sem blandit, mattis neque ut, dignissim massa. Vivamus aliquam non justo vitae scelerisque. Etiam venenatis hendrerit pellentesque.
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Profile view-->
        <div  class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xs-push-1 col-sm-push-1 col-md-push-1 col-lg-push-1">
            
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                <h2 class="text-warning"> Hi <?php echo $res['Name']." !"; ?></h2>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-push-2 col-sm-push-2 col-md-push-2 col-lg-push-2">
                <img class="img-responsive img-circle" src="<?php echo $res['Photo']?>"
                width='140px' height='140px' alt="Your Photo"></img>
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
                ?></dd>
                <dt class="bg-danger">Projects:</dt>
              <dd>
                <?php
                foreach ($projects as $project2) {
                    echo "<span style=\"color:#CC6666\"><strong>".$project2['Project_Name']."</span></strong><br>";
                } ?></dd>
            </div>
            

   </dl>
        </div>






    </div> 
	   <!--button class="btn btn-success" href="#"><i class="icon-pencil"></i></button--> 

    <!--script src="js/jquery-2.1.4.min.js"></script-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
	<script>startApp();</script>
  

</body>

</html>