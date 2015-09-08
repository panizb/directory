<!DOCTYPE html>
<html>
  <head>
    <meta name="google-signin-client_id" 
    content="548175158538-cth6bq97urq2r54alp2rn4dr2qk1fbee.apps.googleusercontent.com">
    <meta charset="utf-8">
    <title>Add Link</title>
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
        <div id="addModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">

            <!-- Modal content-->
           <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                  <h4><span class="glyphicon glyphicon-globe"></span> Add a new link </h4>
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
                  <form role="form" action="manipulate.php?userID=<?php echo $_GET['userID'];?>" >
                    <button name="cancelAdd" type="submit" class="btn btn-danger btn-default pull-left"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                  </form>
                </div>
              </div>

          </div>
        </div>
      </div>
    </div>


    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
        <script type="text/javascript">
        $(window).load(function(){
          $('#addModal').modal('show');
        });
      </script>
  </body>
</html>












                






                
