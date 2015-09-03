<?php

namespace directory;

include 'DBHandler.php';
session_start();
//check the session (if needed!)
if ($_SESSION['id']!=$_GET['userID']) {
    echo "Session timed out!";
    session_destroy();
    header('Location: index.php');
}
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
$command= "SELECT * from Social_Network where userID LIKE :username";
$params= array (":username" => $_GET['userID']);
$result2 = $dbConn->executeWithReturn($command, $params);
 $new=array();
 $i=0;
foreach ($result2 as $val) {
    $new[$i] = $val;
    $i=$i+1;
}
foreach ($result2 as $res2) {
}
$command= "SELECT * from Membership where Username LIKE :userID";
$params= array (":userID" => $_GET['userID']);
$teams = $dbConn->executeWithReturn($command, $params);
foreach ($teams as $team) {
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
    </script>
</head>

<body>
	<div class="jumbotron">
  		<div class="container">

<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->





      <div class="form-group" >
      <div class="col-md-3">
        <div class="col-xs-4 col-sm-5 col-md-6 col-lg-6 ">
          <img src=<?php echo $res['Photo']; ?> class="img-responsive" width='150px' height='150px' alt="Profile Photo">


          <form action="upload.php" method="post" enctype="multipart/form-data">
			<h6>Change profile photo</h6>
    		<input type="file" name="fileToUpload" id="fileToUpload">
   			<input type="submit" value="Upload Image" name="submit">
		  </form>
          
          
          <!--input type="file" class="form-control" enctype="multipart/form-data" name="upload"-->



        </div>
      </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 col-sm-7 col-xs-7 personal-info">
      <!--   <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div> -->
        <h3 class="text-muted">Profile info:</h3>
        
        <form class="form-horizontal" role="form" 
        action="manipulate.php?userID=<?php echo $res['User_Name'];?>" novalidate>
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input name="name" class="form-control" type="text" value=<?php echo $res['Name']; ?> >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Family name:</label>
            <div class="col-lg-8">
              <input name="family" class="form-control" type="text" value=<?php echo $res['Family_Name']; ?> >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Private Email:</label>
            <div class="col-lg-8">
              <input name="email" class="form-control" type="email" value=<?php echo $res['Private_Email']; ?> >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone Number:</label>
            <div class="col-lg-8">
              <input name="phone" class="form-control" type="text" value=<?php echo $res['Phone_Number']; ?> >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Website:</label>
            <div class="col-md-8">
              <input name="web" class="form-control" type="url" value=<?php echo $res['Website']; ?> >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input name="username" class="form-control" type="text" value=<?php echo $res['User_Name']; ?> >
            </div>
          </div>




          <!--div class="form-group">
            <label class="col-lg-3 control-label">Time Zone:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="user_time_zone" class="form-control">
                  <option value="Hawaii">(GMT-10:00) Hawaii</option>
                  <option value="Alaska">(GMT-09:00) Alaska</option>
                  <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                  <option value="Arizona">(GMT-07:00) Arizona</option>
                  <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                  <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                  <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                  <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                </select>
              </div>
            </div>
          </div-->
     
          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input name="pass" class="form-control" type="password" value=<?php echo $res['Password']; ?> >
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Social Networks:</label>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <!-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                <span><br></span>
              </div> -->
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6
              col-xs-offset-8 col-sm-offset-8 col-md-offset-8 col-lg-offset-8">
                
              </div>
            </div>
            
            
            <div class="col-lg-8">
              <button type="button" class="btn btn-info btn-mini" name="addHere" data-toggle="modal" data-target="#addModal">
                    <span class="glyphicon glyphicon-plus"></span>
                  </button>  
                  <div id="addModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                   <div class="modal-content">
                        <div class="modal-header" style="padding:35px 50px;">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                          <form role="form" action="manipulate.php?userID=<?php echo $_GET['userID'];?>" >
                            <div class="form-group">
                              <label for="usrname"><span class="glyphicon glyphicon-thumbs-up"></span> Social Network Name</label>
                              <input type="text" class="form-control" name="newSName" placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                              <label for="psw"><span class="glyphicon glyphicon-globe"></span> Link</label>
                              <input type="text" class="form-control" name="newSLink" placeholder="Enter link" required>
                            </div>
                              <button name="add" type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Add</button>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                      </div>

                  </div>
                </div>





            <? $count=0;
             foreach ($result2 as $res2) {
              echo "<br><label class=\"col-lg-1 control-label\">".
              "<div class=\"input-group \"><strong><span>".$res2['Name']."  "."</span><button name=\"remove".$count.
              "\" class= \"btn btn-default btn-mini\" type = \"submit\" onclick=\"return confirm".
              "('Are you sure you want to remove this link?')\" >".
              "<span class=\"glyphicon glyphicon-minus\"></span>"."</button></strong></div>".
              "</label>".
              "<input name=\"social".$count."\" class=\"form-control\" type=\"text\" value=".$res2['Link'].">".
              "<input type=\"hidden\" name=table".$count." value=".htmlentities(serialize($res2)).">";
              $count= $count+1;
                    }?>
           
            </div>
            <input type="hidden" name="count" value=<?php echo $count;?>>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label">Teams:</label>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <!-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                <span><br></span>
              </div> -->
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6
              col-xs-offset-8 col-sm-offset-8 col-md-offset-8 col-lg-offset-8">
                
              </div>
            </div>
            
            
            <div class="col-lg-8">
              <button type="button" class="btn btn-info btn-mini" name="addThere" data-toggle="modal" data-target="#addTeamModal">
                    <span class="glyphicon glyphicon-plus"></span>
                  </button>  
                  <div id="addTeamModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                   <div class="modal-content">
                        <div class="modal-header" style="padding:35px 50px;">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                          <form role="form" action="manipulate.php?userID=<?php echo $_GET['userID'];?>" >
                            <div class="form-group">
                              <label for="usrname"><span class="glyphicon glyphicon-thumbs-up"></span> Team Name</label>
                              <input type="text" class="form-control" name="newTName" placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                              <label for="psw"><span class="glyphicon glyphicon-globe"></span> Description</label>
                              <input type="text" class="form-control" name="newTDesc" placeholder="Enter description" >
                            </div>
                              <button name="addTeam" type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Add</button>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                      </div>

                  </div>
                </div>





            <? $countT=0;
             foreach ($teams as $team) {
              echo "<br><label class=\"col-lg-1 control-label\">".
              "<div class=\"input-group \"><strong><button type = \"submit\" name=\"removeT".$countT.
              "\" class= \"btn btn-default btn-mini\" onclick=\"return confirm".
              "('Are you sure you want to remove this team?')\" >".
              "<span class=\"glyphicon glyphicon-minus\"></span>"."</button></strong></div>".
              "</label>".
              "<input name=\"team".$countT."\" class=\"form-control\" type=\"text\" value=".$team['Team_Name'].">".
              "<input type=\"hidden\" name=tableT".$countT." value=".htmlentities(serialize($team)).">";
              $countT= $countT+1;
                    }?>
           
            </div>
            <input type="hidden" name="countT" value=<?php echo $countT;?>>
          </div>


          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="save" class="btn btn-primary" value="Save Changes" onclick="">
              <span></span>
              <input type="submit" name="cancel" class="btn btn-default" value="Cancel" onclick="">
            </div>
          </div>

        </form>
      </div>
  </div>
</div>
<hr>



  		</div>
  	</div>
 <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
 <script src="js/bootstrap.js"></script>
 </body>



 </html>