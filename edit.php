<?php

namespace directory;

include 'DBHandler.php';
session_start();
//check the session (if needed!)
// if ($_SESSION['id']!=$_GET['userID']) {
//     echo "Session timed out!";
//     session_destroy();
//     header('Location: index.php');
// }
// if (isset($_GET['selected'])) {
//     if (isset($_GET['index']) && $_GET['index']=='selectTeam') {
//         $selectedTeam = $_GET['selected'];
//     } elseif (isset($_GET['index']) && $_GET['index']=='selectProject') {
//         $selectedroject = $_GET['selected'];
//     }
    
// }
$servername='localhost';
$dbname='directory';
$dBUsername='root';
$dBPassword='';
$dbConn = new DBHandler("mysql:host=$servername;dbname=$dbname", $dBUsername, $dBPassword);
$dbConn->connect();
$command= "SELECT * from Employee where User_Name LIKE :username";
$params= array (":username" => $_SESSION['id']);
$result = $dbConn->executeWithReturn($command, $params);
foreach ($result as $res) {
}
$command= "SELECT * from Social_Network where userID LIKE :username";
$params= array (":username" => $_SESSION['id']);
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
$params= array (":userID" => $_SESSION['id']);
$teams = $dbConn->executeWithReturn($command, $params);
foreach ($teams as $team) {
}
$command= "SELECT Team_Name from Membership where Username != :userID";
$params= array (":userID" => $_SESSION['id']);
$otherTeams = $dbConn->executeWithReturn($command, $params);
$otherTeams=array_unique($otherTeams, SORT_REGULAR);
foreach ($otherTeams as $otherTeam) {
}
$command= "SELECT * from Develop where Username LIKE :userID";
$params= array (":userID" => $_SESSION['id']);
$projects = $dbConn->executeWithReturn($command, $params);
foreach ($projects as $project) {
}
$command= "SELECT Project_Name from Develop where Username != :userID";
$params= array (":userID" => $_SESSION['id']);
$otherProjects = $dbConn->executeWithReturn($command, $params);
$otherProjects=array_unique($otherProjects, SORT_REGULAR);
foreach ($otherProjects as $otherProject) {
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
    // function getval(sel) {
    //    //window.location = 'select.php?selected='+sel.value+'&index=selectTeam';
    // }
    // $(document).ready(function() {
    //       $("#save").click(function(){
    //         alert ("selectExamin");
    //       });
    //     });
    function selectExamin() {
        var valueT=$('#T').val();
        var valueP=$('#P').val();
        $.ajax({
                  type: 'get',
                   url: 'doSelect.php',
                  data: {valueT: valueT, valueP: valueP},
                 // contentType: 'application/json; charset=utf-8',
                  //async : false,
                 error: function(jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                     alert('Internal error: ' + jqXHR.responseText);
                  } else {
                     alert('Unexpected error.');
                    }
                 },
                  success: function(data){
                //     $('#select').empty();
                //     $('#select').append("<option value='0'>--date--</option>");
                // //       $('#select').append('<option'+data[0].date+'></option>');
                        
                //        $.each(data,function(i,item) { 
                //       $('#select').append('<option>'+data[i].date+'</option>');
                 }
                   //
                //        $('#select').empty();
                //        $('#select').append("<option value='0'>--date--</option>");
                // //       $('#select').append('<option'+data[0].date+'></option>');
                        
                //        $.each(data,function(i,item) { 
                //       $('#select').append('<option>'+data[i].date+'</option>');
                      })
                    
    }
</script>
    <style type="text/css">
    .selectWidth {
    width: 250px;
    height: auto;
    margin:0px;
  }
  .bootstrap-select > .btn {
    height: 45px;
} 
    </style>
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
          <img src=<?php echo $res['Photo']; ?> class="img-responsive" width='170px' height='170px' alt="Profile Photo">


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
         action="manipulate.php" novalidate>
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
            <div class="col-lg-8">
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
            
            
            
            <div class="col-lg-8">
              <button type="submit" class="btn btn-info btn-sm" name="addHere" >
                    <span class="glyphicon glyphicon-plus">Add New Link</span>
                  </button> 

            <?php $count=0;
            foreach ($result2 as $res2) {
                echo "<br>"."<label class=\" control-label\">".$res2['Name']."</label>".
                "<div class=\"input-group \">".

                "<input name=\"social".$count."\" class=\"form-control\" type=\"text\" value=".$res2['Link'].">".
                "<input type=\"hidden\" name=table".$count." value=".htmlentities(serialize($res2)).">".
                "<span class=\"input-group-btn \">".
                "<button name=\"remove".$count.
                "\" class= \"btn btn-default btn-mini\" type = \"submit\" onclick=\"return confirm".
                "('Are you sure you want to remove this link?')\" >".
                "<span class=\"glyphicon glyphicon-minus\"></span>"."</button></span>".
                "</div>";
                $count= $count+1;
            }
                ?>
           
            </div>
            <input type="hidden" name="count" value=<?php echo $count;?>>
          </div>
          
          <div class="form-group">
              <!-- <h3 class="visible-lg">large</h3>
              <h3 class="visible-md">mediume</h3>
              <h3 class="visible-sm">samll</h3>
              <h3 class="visible-xs">extra</h3> -->
            <label class="col-lg-3 control-label">Teams:</label>
            <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-2">
                <button type="submit" class="btn btn-info btn-sm" name="addTHere">
                  <span class="glyphicon glyphicon-plus">Add New Team</span>
                </button>
              </div>
              <div class="col-xs-offset-6 col-sm-offset-6 col-md-offset-4 col-lg-offset-4">

                <select class="form-control selectWidth input-sm  col-lg-3" 
                name="selectTeam" id="T">
                  <option selected disabled>Select from existing teams</option>
                    <?php
                    foreach ($otherTeams as $otherTeam) {
                        echo "<option value=\"".$otherTeam['Team_Name'].
                        "\">".$otherTeam['Team_Name']."</option>";
                    }
                    ?>
                </select>
                <!-- <input type="hidden" name="selectedTeam" value="<?php echo $selectedTeam;?>"> -->
              </div>
                
            </div>

              

            <?php $countT=0;
            foreach ($teams as $team) {
                echo "<br><br>".
                "<button type = \"submit\" name=\"removeT".$countT.
                "\" class= \"btn btn-danger btn-sm\" onclick=\"return confirm".
                "('Are you sure you want to remove this team?')\" >".
                "<span class=\"glyphicon glyphicon-minus\"></span>"."</button>".
                "<span style=\"ont-size: 100pt\">"."    ".$team['Team_Name']."</span>".
                "<input type=\"hidden\" name=tableT".$countT." value=".htmlentities(serialize($team)).">";
                $countT= $countT+1;
            }
                    ?>
           
            </div>
            <input type="hidden" name="countT" value=<?php echo $countT;?>>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Projects:</label>
            <div class="col-lg-8">
              <div class="row">
              <div class="col-lg-2">
                <button type="submit" class="btn btn-info btn-sm" name="addPHere">
                  <span class="glyphicon glyphicon-plus">Add New Project</span>
                </button>
              </div >
              <div class="col-xs-offset-6 col-sm-offset-6 col-md-offset-4 col-lg-offset-4">
                <select class=" form-control selectWidth input-sm col-lg-3" 
                name="selectProject" id="P">
                  <option selected disabled>Select from existing projects</option>
                    <?php
                    foreach ($otherProjects as $otherProject) {
                        echo "<option value=\"".$otherProject['Project_Name'].
                        "\">".$otherProject['Project_Name']."</option>";
                    }
                    ?>
                </select>
               <!--  <input type="hidden" name="selectedProject" value="<?php echo $selectedProject;?>"> -->
                </div>

            </div>

            <?php $countP=0;
            foreach ($projects as $project) {
                echo "<br><br>".
                "<button type = \"submit\" name=\"removeP".$countP.
                "\" class= \"btn btn-danger btn-sm\" onclick=\"return confirm".
                "('Are you sure you want to remove this project?')\" >".
                "<span class=\"glyphicon glyphicon-minus\"></span>"."</button>".
                "<span class=\" control-label\">"."  ".$project['Project_Name']."</span>".
                "<input type=\"hidden\" name=tableP".$countP." value=".htmlentities(serialize($project)).">";
                $countP= $countP+1;
            }
                    ?>
           
            </div>
            <input type="hidden" name="countP" value=<?php echo $countP;?>>
          </div>


          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="save" class="btn btn-primary" value="Save Changes"  id="save" onclick="selectExamin()">
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