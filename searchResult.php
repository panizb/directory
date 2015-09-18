<?php
namespace directory;

require 'DBHandler.php';
session_start();
//check the session (if needed!)
// if ($_SESSION['id']!=$_GET['userID']) {
//     echo "Session timed out!";
//     session_destroy();
//     header('Location: index.php');
// }
$servername='localhost';
$dbname='directory';
$dBUsername='root';
$dBPassword='';
$results=[];
if (!$_GET['search']) {
    $msg = "Search field can't be empty!";
    header('Location: noResult.php?userID='.$_SESSION['id'].'&msg='.$msg);
}
$dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
$dbConn->connect();
$command= "SELECT User_Name, Name, Family_Name, Photo from Employee where User_Name REGEXP :username";
$params= array (":username" => $_GET['search']);
$result = $dbConn->executeWithReturn($command, $params);
foreach ($result as $res) {
    //echo "userID ".$res['User_Name']."<br>";
    $results[]=$res;
}
$command= "SELECT User_Name, Name, Family_Name, Photo from Employee where Name REGEXP :name";
$params= array (":name" => $_GET['search']);
$result2 = $dbConn->executeWithReturn($command, $params);
foreach ($result2 as $res2) {
    //echo "name ".$res2['User_Name']."<br>";
    $results[]=$res2;
}
$command= "SELECT User_Name, Name, Family_Name, Photo from Employee where Family_Name REGEXP :fname";
$params= array (":fname" => $_GET['search']);
$result3 = $dbConn->executeWithReturn($command, $params);
foreach ($result3 as $res3) {
    //echo "family ".$res3['User_Name']."<br>";
    $results[]=$res3;
}
$results=array_unique($results, SORT_REGULAR);
foreach ($results as $key) {
    //print_r($key."<br>");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="google-signin-client_id" 
	content="548175158538-cth6bq97urq2r54alp2rn4dr2qk1fbee.apps.googleusercontent.com">
	<meta charset="utf-8">
	<title>Search Results</title>
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
    </script>
    <style type="text/css">
        .sortable tr {
    cursor: pointer;
}
tr.spaceUnder > td
{
  padding-bottom: 1em;
}
    body {
      background-image: url(./img/people2.jpg);
    background-position: center center;
      background-repeat: no-repeat;
  
  /* Background image is fixed in the viewport so that it doesn't move when 
     the content's height is greater than the image's height */
  background-attachment: fixed;
  
  /* This is what makes the background image rescale based
     on the container's size */
  background-size: ;
  
  /* Set a background color that will be displayed
     while the background image is loading */
  background-color: #FFFFFF;
    }
    </style>
</head>
<body>
	
  	<div class="container">
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 
      col-xs-offset-8 col-sm-offset-10 col-md-offset-10 col-lg-offset-10 ">
        <button  class="btn btn-primary" onclick="signOut();" style="margin-top:20px">Sign out</button>
      </div>
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"><h1 >3FS Directory</h1></div>
      <!--contact scroll-->

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h1><?php echo "<br>"; ?></h1>
              <h3><?php echo "<br>"; ?></h3>
              <span style="color:#0099FF"><h3 >Search Result:</h3></span>
              <div style="position:relative;">
                <div style="height:400px; overflow-y:scroll; position:relative;">

                  <table class="table-responsive table-hover sortable" >
                        <thead>
                          <tr>
                            <th class=\"col-xs-1\"></th> 
                            <th class=\"col-xs-2\"></th> 
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($results)==0) {
                            echo "<h4 style=\"color:#0099FF\">No results found.</h4>";
                        } else {
                            foreach ($results as $res2) {
                                echo "
                                  <tr onclick=\" document.location = 'viewProfile.php?userID=".
                                  $res2['User_Name']."';\" ng-repeat-start=\"u in users\" ng-class-odd=\"'alt'\" class=\"spaceUnder\">
                                    <td class=\"col-xs-1\"><img height='50px' width='50px' title=\"Photo\" src=\"".
                                    $res2["Photo"]."\"class=\"img-circle\"></td> 
                                    <td class=\"col-xs-2 >"."<a href=\"viewProfile.php?userID=".
                                    $res2['User_Name']."\">"."<span style=\"color:#0099FF\">".
                                    $res2['Name'].
                                    " ".$res2['Family_Name']."<br>"."</span>"."</a>"."</td> 
                                  </tr>";
                            }
                        }
                        echo "</tbody>
                            </table>";
                        ?>


                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>